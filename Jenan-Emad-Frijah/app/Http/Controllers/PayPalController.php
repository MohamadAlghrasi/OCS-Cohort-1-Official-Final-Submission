<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as BookingRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayPalController extends Controller
{
    private function getAccessToken()
    {
        $clientId = config('paypal.sandbox.client_id');
        $clientSecret = config('paypal.sandbox.client_secret');

        if (!$clientId || !$clientSecret) {
            Log::error('PayPal credentials missing');
            return null;
        }

        try {
            $response = Http::withBasicAuth($clientId, $clientSecret)
                ->asForm()
                ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
                    'grant_type' => 'client_credentials'
                ]);
            return $response->successful() ? $response->json()['access_token'] : null;
        } catch (\Exception $e) {
            Log::error('PayPal Token Error', ['message' => $e->getMessage()]);
            return null;
        }
    }

    public function createPayment(Request $request)
    {
        $request->validate([
            'request_id' => 'required|exists:requests,id',
            'amount'     => 'nullable|numeric|min:0.01',
        ]);

        $bookingRequest = BookingRequest::findOrFail($request->request_id);
        $amount = $request->amount ?? 25.00;

        $payment = Payment::create([
            'student_id'     => $bookingRequest->student_id,
            'tutor_id'       => $bookingRequest->tutor_id,
            'amount'         => $amount,
            'payment_method' => 'paypal',
            'status'         => 'pending',
        ]);

        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            $payment->delete();
            return back()->with('error', 'PayPal connection failed.');
        }

        $response = Http::withToken($accessToken)
            ->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'reference_id' => (string) $payment->id,
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format($amount, 2, '.', '')
                    ]
                ]],
                'application_context' => [
                    'return_url' => route('paypal.success'),
                    'cancel_url' => route('paypal.cancel'),
                ]
            ]);

        if (!$response->successful()) {
            $payment->delete();
            return back()->with('error', 'Payment creation failed.');
        }

        $order = $response->json();
        $payment->update(['paypal_order_id' => $order['id']]);

        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return back()->with('error', 'PayPal approval link not found.');
    }

   public function paymentSuccess(Request $request)
{
    $token = $request->input('token');

    if (!$token) {
        return redirect()->route('user.student_requests')
            ->with('error', 'Invalid payment.');
    }

    $payment = Payment::where('paypal_order_id', $token)->first();
    if (!$payment) {
        return redirect()->route('user.student_requests')
            ->with('error', 'Payment record not found.');
    }

    if ($payment->status === 'completed') {
        return redirect()->route('user.student_requests')
            ->with('success', 'Payment already completed.');
    }

    $accessToken = $this->getAccessToken();
    if (!$accessToken) {
        return redirect()->route('user.student_requests')
            ->with('error', 'PayPal verification failed.');
    }


    $orderResponse = Http::withToken($accessToken)
        ->get("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$token}");

    if (!$orderResponse->successful()) {
        return redirect()->route('user.student_requests')
            ->with('error', 'Unable to verify PayPal order.');
    }

    $order = $orderResponse->json();
    $orderStatus = $order['status'] ?? null;

  
    if ($orderStatus === 'APPROVED' || $orderStatus === 'COMPLETED') {

        $payment->update([
            'status' => 'completed',
            'transaction_id' => $token 
        ]);

        $bookingRequest = BookingRequest::where('student_id', $payment->student_id)
            ->where('tutor_id', $payment->tutor_id)
            ->whereIn('status', ['pending', 'accepted'])
            ->latest()
            ->first();

        if ($bookingRequest) {
            $bookingRequest->update(['status' => 'paid']);
        }

        return redirect()->route('user.student_requests')
            ->with('success', 'Payment successful! Your tutoring request is confirmed.');
    }

    return redirect()->route('user.student_requests')
        ->with('error', 'Payment was not approved.');
}


    public function paymentCancel()
    {
        $token = request()->input('token');
        if ($token) {
            $payment = Payment::where('paypal_order_id', $token)->first();
            if ($payment) $payment->update(['status' => 'failed']);
        }
        return redirect()->route('user.student_requests')->with('error', 'Payment cancelled.');
    }
}
