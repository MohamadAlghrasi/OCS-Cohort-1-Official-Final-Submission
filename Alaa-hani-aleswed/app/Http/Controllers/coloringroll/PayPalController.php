<?php

namespace App\Http\Controllers\coloringroll;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function pay(Order $order)
    {
        if ($order->status !== 'pending') {
            abort(403);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($order->total_price, 2, '.', '')
                    ]
                ]
            ]
        ]);

        if (isset($response['links'])) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('cart')
            ->with('error', 'Unable to initiate PayPal payment.');
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (!isset($response['status']) || $response['status'] !== 'COMPLETED') {
            return redirect()->route('cart')->with('error', 'Payment not completed.');
        }

        $order = Order::where('status', 'pending')
            ->latest()
            ->firstOrFail();

        $order->update(['status' => 'paid']);

        Payment::create([
            'order_id' => $order->id,
            'provider' => 'paypal',
            'transaction_id' => $response['id'],
            'status' => 'success',
            'amount' => $order->total_price,
        ]);

        return redirect()->route('home')
            ->with('success', 'Payment successful! Thank you for your order.');
    }

    public function cancel()
    {
        $order = Order::where('status', 'pending')
            ->latest()
            ->first();

        if ($order) {
            $order->update(['status' => 'failed']);

            Payment::create([
                'order_id' => $order->id,
                'provider' => 'paypal',
                'status' => 'failed',
                'amount' => $order->total_price,
            ]);
        }

        return redirect()->route('cart')
            ->with('error', 'Payment cancelled.');
    }
}
