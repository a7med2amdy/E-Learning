<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function stripe()
    {
        

        $total_pay = Order::where('user_id', Auth::user()->id)
        ->where('status', 'in process')->sum('total');
        return view('front.stripe',get_defined_vars());
    }

    public function stripePost(Request $request)
    {
        $orders = Order::where('user_id',Auth::user()->id)
                 ->where('status','in process')->get();
        $total_pay = Order::where('user_id', Auth::user()->id)
        ->where('status', 'in process')->sum('total');
        
        if(count($orders)>0){
            foreach($orders as $order)
            {
                $order->status = 'payed';
                $order->save();
            }
        }

        foreach( $orders as $order ){
            Purchase::create([
                'user_id' => Auth::user()->id , 
                'course_id' =>  $order->course_id,
            ]);
        }

        
                                       
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total_pay * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
