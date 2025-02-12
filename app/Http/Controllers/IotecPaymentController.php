<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentTransaction;
use App\Models\UserFcmToken;
use App\Models\UserPurchasedPackage;
use App\Services\NotificationService;
use App\Services\ResponseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class IotecPaymentController extends Controller
{
    private function getIotecAccessToken()
    {
        $response = Http::asForm()->post(env('IOTEC_AUTH_URL'), [
            'client_id' => env('IOTEC_CLIENT_ID'),
            'client_secret' => env('IOTEC_CLIENT_SECRET'),
            'grant_type' => 'client_credentials',
        ]);

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        throw new \Exception('Failed to retrieve Iotec access token');
    }
    public function initiateCheckout(Request $request)
    {
        $user = Auth::user();

        $request->validate([
        'payer' => 'required|string', 
        'amount' => 'required|numeric|min:1',
        'package_id' => 'required|integer',
        ]);

    try {

        $paymentTransaction = PaymentTransaction::create([
            'user_id' => $user->id,
            'package_id' => $request->package_id,
            'amount' => $request->amount,
            'payment_status' => 'pending',
            'transaction_id' => null, // Will be updated later
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $accessToken = $this->getIotecAccessToken();

        $payload = [
            "category" => "MobileMoney",
            "currency" => "ITX",
            "walletId" => env('IOTEC_WALLET_ID'),
            "externalId" => uniqid(),
            "payer" => $request->payer,
            "amount" => $request->amount,
            "payerNote" => "Checkout Payment",
            "payeeNote" => "Order Payment"
        ];

        $response = Http::withToken($accessToken)
            ->post(env('IOTEC_API_URL') . '/collections/collect', $payload);

        if ($response->successful()) {
            $responseData = $response->json();

            // Update the PaymentTransaction record with the transaction ID from Iotec
            $paymentTransaction->update([
                'order_id' => $responseData['id'],
            ]);

            return response()->json([
                'message' => 'Payment initiated successfully.',
                'transaction_id' => $responseData['id'],
                'payment_transaction_id' => $paymentTransaction->id,
            ], 200);
        } else {
            // If the payment initiation fails, update the status to 'failed'
            $paymentTransaction->update([
                'payment_status' => 'failed',
            ]);

            return response()->json([
                'error' => 'Failed to initiate payment.',
                'data' => $response->json(),
            ], 400);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function checkPaymentStatus($transactionId, $package_id)
{
    $user = Auth::user();
    try {
        $accessToken = $this->getIotecAccessToken();

        $response = Http::withToken($accessToken)
            ->get(env('IOTEC_API_URL') . "/collections/status/{$transactionId}");

        $responseData = $response->json();

        // Check if the payment was successful
        if ($response->successful() && $responseData['statusCode'] === 'success') {
            // Assign the package to the user
            $assignPackageResponse = $this->assignPackage($transactionId, $user->id, $package_id);

            if ($assignPackageResponse['error']) {
                return response()->json(['error' => $assignPackageResponse['message']], 500);
            }

            return response()->json([
                'message' => 'Payment successful and package assigned.',
                'data' => $responseData
            ], 200);
        } else {
            // Handle failed payment
            $failedTransactionResponse = $this->failedTransaction($transactionId, $user->id); // Corrected here

            return response()->json([
                'error' => 'Payment failed.',
                'data' => $responseData
            ], 400);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function disburseFunds(Request $request)
    {
        $request->validate([
            'payee' => 'required|string', // Mobile number to receive money
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $accessToken = $this->getIotecAccessToken();

            $payload = [
                "category" => "MobileMoney",
                "currency" => "ITX",
                "walletId" => env('IOTEC_WALLET_ID'),
                "externalId" => uniqid(),
                "payee" => $request->payee, // Payee's mobile number
                "amount" => $request->amount,
                "payerNote" => "Business Payment",
                "payeeNote" => "Received from Business"
            ];

            $response = Http::withToken($accessToken)
                ->post(env('IOTEC_API_URL') . '/disbursements/disburse', $payload);

            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function phonePeSuccessCallback(){
        ResponseService::successResponse("Payment done successfully.");
    }

    /**
     * Success Business Login
     * @param $payment_transaction_id
     * @param $user_id
     * @param $package_id
     * @return array
     */
    private function assignPackage($payment_transaction_id, $user_id, $package_id) {
        try {
            $paymentTransactionData = PaymentTransaction::where('id', $payment_transaction_id)->first();
            if ($paymentTransactionData == null) {
                Log::error("Payment Transaction id not found");
                return [
                    'error'   => true,
                    'message' => 'Payment Transaction id not found'
                ];
            }

            if ($paymentTransactionData->status == "succeed") {
                Log::info("Transaction Already Succeed");
                return [
                    'error'   => true,
                    'message' => 'Transaction Already Succeed'
                ];
            }

            DB::beginTransaction();
            $paymentTransactionData->update(['payment_status' => "succeed"]);


            $package = Package::find($package_id);

            if (!empty($package)) {
                UserPurchasedPackage::create([
                    'package_id'  => $package_id,
                    'user_id'     => $user_id,
                    'start_date'  => Carbon::now(),
                    'end_date'    => $package->duration == "unlimited" ? null : Carbon::now()->addDays($package->duration),
                    'total_limit' => $package->item_limit == "unlimited" ? null : $package->item_limit,
                ]);
            }

            $title = "Package Purchased";
            $body = 'Amount :- ' . $paymentTransactionData->amount;
            $userTokens = UserFcmToken::where('user_id', $user_id)->pluck('fcm_token')->toArray();
            if (!empty($userTokens)) {
                NotificationService::sendFcmNotification($userTokens, $title, $body, 'payment');
            }
            DB::commit();

            return [
                'error'   => false,
                'message' => 'Transaction Verified Successfully'
            ];

        } catch (Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage() . "WebhookController -> assignPackage");
            return [
                'error'   => true,
                'message' => 'Error Occurred'
            ];
        }
    }

    /**
     * Failed Business Logic
     * @param $payment_transaction_id
     * @param $user_id
     * @return array
     */
    private function failedTransaction($payment_transaction_id, $user_id) {
        try {
            $paymentTransactionData = PaymentTransaction::find($payment_transaction_id);
            if (!$paymentTransactionData) {
                return [
                    'error'   => true,
                    'message' => 'Payment Transaction id not found'
                ];
            }

            $paymentTransactionData->update(['payment_status' => "failed"]);

            $body = 'Amount :- ' . $paymentTransactionData->amount;
            $userTokens = UserFcmToken::where('user_id', $user_id)->pluck('fcm_token')->toArray();
            NotificationService::sendFcmNotification($userTokens, 'Package Payment Failed', $body, 'payment');
            return [
                'error'   => false,
                'message' => 'Transaction Verified Successfully'
            ];
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage() . "WebhookController -> failedTransaction");
            return [
                'error'   => true,
                'message' => 'Error Occurred'
            ];
        }
    }
}
