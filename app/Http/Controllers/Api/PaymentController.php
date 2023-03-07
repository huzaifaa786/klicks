<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request){
        $stripe = new StripeClient('sk_test_51MbJfzF8ZlDbtPcpqpdGlUToMJnB8TkuBPBxu7HUQrtYkbpaLUEJDzQTW10dYMX5fNhvlpbcfUvJgBHJpc11PqN000O3siPEyW');

        // Use an existing Customer ID if this is a returning customer.
        $customer = $stripe->customers->create();
        $ephemeralKey = $stripe->ephemeralKeys->create([
            'customer' => $customer->id,
        ], [
            'stripe_version' => '2022-08-01',
        ]);
        $intent = $stripe->paymentIntents->create([
            'amount' => $request->price * 100,
            'currency' => 'aed',
            'customer' => $customer->id,
            'automatic_payment_methods' => [
                'enabled' => true,
            ],

        ]);
        $paymentIntent = json_encode(
            [
              'paymentIntent' => $intent->client_secret,
              'ephemeralKey' => $ephemeralKey->secret,
              'customer' => $customer->id,
              'intent' => $intent,
              'publishableKey' => 'pk_test_51MbJfzF8ZlDbtPcpjb2nIwCCQlWgmx71OXCFSg3as9Og4rnEaNPdH3NZtbZlRf6JbJXwQyTmYZBsav7AHyCXimFz00YMBRcimp'
            ]
          );
          return Api::setResponse('intent',$paymentIntent);
    }
}
