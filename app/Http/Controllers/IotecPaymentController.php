<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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
        $request->validate([
            'payer' => 'required|string', 
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $accessToken = $this->getIotecAccessToken();

            $payload = [
                "category" => "MobileMoney",
                "currency" => "ITX",
                "walletId" => env('IOTEC_WALLET_ID'),
                "externalId" => uniqid(),
                "payer" => $request->payer, // Payer's mobile number
                "amount" => $request->amount,
                "payerNote" => "Checkout Payment",
                "payeeNote" => "Order Payment"
            ];

            $response = Http::withToken($accessToken)
                ->post(env('IOTEC_API_URL') . '/collections/collect', $payload);

            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkPaymentStatus($transactionId)
    {
        try {
            $accessToken = $this->getIotecAccessToken();

            $response = Http::withToken($accessToken)
                ->get(env('IOTEC_API_URL') . "/collections/status/{$transactionId}");

            return response()->json($response->json(), $response->status());
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
}
