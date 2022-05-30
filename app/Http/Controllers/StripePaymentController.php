<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Stripe;

class StripePaymentController extends Controller
{

    function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(st()->stipe_sk);
        try {

            $payment = json_encode(Stripe\Charge::create([
                "amount" => round($request->amount * 100),
                "currency" => "eur",
                "source" => $request->stripeToken
            ]));

            return $this->complete($request, $payment);
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            return response()->json([
                'success' => false,
                'message' => $e->getError()->message,
            ]);
        }
    }


    function complete($data, $payment)
    {
        $ev = Events::find($data->event_id);
        $event = new EventUser();
        $event->event_id = $data->event_id;
        $event->name = $data->first_name . " " . $data->last_name;
        $event->email = $data->email;
        $event->paid_amount = $data->amount;
        $event->paid_for = json_decode($ev->price_type)[$data->key];
        $event->stripe_id = json_decode($payment)->id;
        $event->receipt_url = json_decode($payment)->receipt_url;
        $event->receipt_url = json_decode($payment)->receipt_url;
        $event->save();
        return response()->json([
            'success' => true,
            'message' => 'Events Booking Successfully',
            'redirect' => route('home.viewEvent', $ev->id),

        ]);
    }
}
