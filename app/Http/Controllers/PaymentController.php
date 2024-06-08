<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('user.checkout');
    }

    public function payment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = Stripe\PaymentIntent::create([
            'amount' => $request->amount,
            'currency' => 'usd',
        ]);

        return response()->json(['client_secret' => $paymentIntent->client_secret]);
    }

    public function success()
    {
        return view('success');
    }
}
