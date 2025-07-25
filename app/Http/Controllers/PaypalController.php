<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function createPayment(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->input('amount') * $request->input('quantity'),
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => route('paypal.success'),
                'cancelUrl' => route('paypal.error'),
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect(); // Redirect to PayPal
            } else {
                return response()->json(['error' => $response->getMessage()], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        $transaction = $this->gateway->completePurchase([
            'payer_id' => $request->query('PayerID'),
            'transactionReference' => $request->query('paymentId'),
        ]);

        $response = $transaction->send();

        if ($response->isSuccessful()) {
            $arr = $response->getData();

            $payment = new \App\Models\Payment();
            $payment->payment_id = $arr['id'];
            $payment->payer_id = $arr['payer']['payer_info']['payer_id'] ?? null;
            $payment->payer_email = $arr['payer']['payer_info']['email'] ?? null;
            $payment->amount = $arr['transactions'][0]['amount']['total'];
            $payment->currency = $arr['transactions'][0]['amount']['currency'];
            $payment->status = $arr['state'];
            $payment->payment_method = 'paypal';
            $payment->save();

            return redirect()->route('product.index')->with('success', 'Payment successful! Transaction ID: ' . $arr['id']);
        } else {
            return redirect()->route('product.index')->with('error', 'Payment failed during verification.');
        }
    }


    public function error()
    {
        return redirect()->route('product.index')->with('error', 'Payment was cancelled or failed.');
    }
}
