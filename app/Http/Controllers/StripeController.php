<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
//use Stripe;
use Stripe;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('Stripe');
    }

    public function stripePost(Request $request)
    {
       Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                //"amount" => 200*100,
                "amount" => $request->Amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
