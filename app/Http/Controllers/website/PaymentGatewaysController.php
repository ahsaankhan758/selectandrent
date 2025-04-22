<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;


class PaymentGatewaysController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        $decoded_checkoutData = base64_decode($request->checkoutData);
        $unserialize_checkoutData = unserialize($decoded_checkoutData);
        echo "<pre>";
        print_r($request->all());die;
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount =5 * 100; // Stripe uses cents

        $intent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        return response()->json([
            'clientSecret' => $intent->client_secret
        ]);
    }

    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->server('HTTP_STRIPE_SIGNATURE');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );

            if ($event->type === 'payment_intent.succeeded') {
                $paymentIntent = $event->data->object;
                // Save payment record to database or update order
            }

            return response('Webhook handled', 200);
        } catch (\Exception $e) {
            return response('Webhook Error: ' . $e->getMessage(), 400);
        }
    }

}
