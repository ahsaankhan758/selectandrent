<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;


class PaymentGatewaysController extends Controller
{
    public function redirectToBookingCheckout(Request $request)
    {
        $decoded_checkoutData = base64_decode($request->checkoutData);
        $unserialize_checkoutData = unserialize($decoded_checkoutData);
        // echo "<pre>";
        // print_r($request->paymentMethod);die;

        if($request->paymentMethod == 'stripe'){
            Stripe::setApiKey(config('services.stripe.secret'));
            $checkoutSession = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Your Product Name',
                        ],
                        'unit_amount' => 199, 
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.checkout') . '?success=true',
                'cancel_url' => route('stripe.checkout') . '?canceled=true',
            ]);

            return redirect($checkoutSession->url);
        }else{
            return "in working..";
        }
        
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
