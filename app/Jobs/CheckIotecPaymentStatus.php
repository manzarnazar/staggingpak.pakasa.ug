<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\IotecPaymentController;
use App\Models\PaymentTransaction;
use Illuminate\Support\Facades\Log;

class CheckIotecPaymentStatus implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5; // Retry up to 5 times

    protected $transactionId;
    protected $userId;
    protected $packageId;

    public function __construct($transactionId, $userId, $packageId)
    {
        $this->transactionId = $transactionId;
        $this->userId = $userId;
        $this->packageId = $packageId;
    }

    public function handle()
    {
        $iotecController = new IotecPaymentController();

        // Check the payment status
        $statusResponse = $iotecController->checkPaymentStatus($this->transactionId, $this->packageId);

        if (isset($statusResponse->getData()->status) && $statusResponse->getData()->status === 'success') {
            Log::info("Payment successful for transaction ID: {$this->transactionId}");
        } else {
            // If payment is still pending, throw an exception to trigger a retry
            throw new \Exception("Payment status is still pending.");
        }
    }

    public function failed(\Exception $exception)
    {
        // Mark the transaction as failed if all retries are exhausted
        Log::error("Max retries reached for transaction ID: {$this->transactionId}");
        $paymentTransaction = PaymentTransaction::where('order_id', $this->transactionId)->first();
        if ($paymentTransaction) {
            $paymentTransaction->update(['payment_status' => 'failed']);
        }
    }
}