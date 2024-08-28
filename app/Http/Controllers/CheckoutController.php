<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log; // Import the Log facade
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{

    public function orderConfirm(Request $request)
    {
        $userId = Auth::user()->id; 
        $carts = Cart::where('user_id', $userId)->get();
        

        foreach($carts as $cart) 
        {
            $order = new Order; 
             
            $order->user_id = $userId;
            $order->course_id = $cart->course_id;
            $order->save();
        }       
        // return to_route('front.payment');
        return to_route('front.cart.index');
        

    }
}
