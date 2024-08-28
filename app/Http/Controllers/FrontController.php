<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Event;
use App\Models\Order;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Contact;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Purchase;
use Illuminate\Notifications\DatabaseNotification;

class FrontController extends Controller
{
    public function index(){

        return view('front.index',get_defined_vars());
    }

    public function about(){

        return view('front.about',get_defined_vars());
    }

    public function courses(){
        $courses = Course::paginate('3');
        return view('front.courses',get_defined_vars());
    }

    public function courseDetail(Course $course)
    {

        $lessons = Lesson::where('course_id', $course->id)->paginate(10);

        $purchase = Purchase::where('course_id',$course->id)
        ->where('user_id', Auth::user()->id)->get();
 
        return view('front.courseDetails' , get_defined_vars());
    }

    public function test(Course $course)
    {
        $lessons = Lesson::where('course_id', $course->id)->paginate(10);
        return view('front.test1',get_defined_vars());
    }

    
    

    public function contact(){

        return view('front.contact',get_defined_vars());
    }

    public function trainers(){
        $trainers = Trainer::all();
        return view('front.trainers',get_defined_vars());
    }

    public function premium(){

        return view('front.premium',get_defined_vars());
    }

    public function event(){
        $events = Event::all();
        return view('front.event',get_defined_vars());
    }
    public function markNotificationAsRead($id)
    {
        $notification = DatabaseNotification::find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        $route = isset($notification->data['route']) ? route('front.' . $notification->data['route']) : '#';

        return redirect($route);
    }

    public function getNotifications()
    {
        $notifications = Auth::user()->notifications->take(6);
        return response()->json([
            'notifications' => $notifications->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'message' => $notification->data['message'] ?? 'No message',
                    'created_at' => $notification->created_at->diffForHumans(),
                    'unread' => $notification->unread(),
                    'route' => route('front.notification.read', $notification->id),
                ];
            }),
        ]);
    }

    public function getUnreadCount()
    {
        $count = Auth::user()->unreadNotifications->count();
        return response()->json(['count' => $count]);
    }

    public function storeMessage(StoreMessageRequest $request ){
        
        $data = $request->validated();
        
        Contact::create($data);
        return to_route('front.index');

        
    }

    public function myCart(){
        $cartItems = Cart::where('user_id', Auth::id())->with('course')->get();
        $cartTotal = $cartItems->sum(function($cartItem) {
            // Check if the fee is numeric, otherwise treat it as 0
            $price = is_numeric($cartItem->course->fee) ? $cartItem->course->fee : 0;
            return $price * $cartItem->quantity;
        });
        return view('front.myCart',get_defined_vars());
    }



    public function add_to_cart($id)
    {
        $course_id = $id ; 
        
        $user_id = Auth::user()->id ; 
        $data = new Cart;
        $data->user_id = $user_id ; 
        $data->course_id = $course_id ; 
        $data->save();
        return redirect()->back()->with('success', 'Course added to cart successfully!');
        
    }

    public function removeCartElement($id)
    {
        // Find the cart item for the authenticated user
        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();

        if ($cartItem) {
            $cartItem->delete(); // Remove the item from the cart
        }

        // Redirect back to the cart page with a success message
        return redirect()->route('front.cart.index')->with('success', 'Item removed from cart.');
    }

    public function orderConfirm(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('course')->get();
        $cartTotal = $cartItems->sum(function($cartItem) {
            // Check if the fee is numeric, otherwise treat it as 0
            $price = is_numeric($cartItem->course->fee) ? $cartItem->course->fee : 0;
            return $price * $cartItem->quantity;
        });
        $userId = Auth::user()->id; 
        $carts = Cart::where('user_id', $userId)->get();
        

        foreach($carts as $cart) 
        {
            $order = new Order; 
             
            $order->user_id = $userId;
            $order->course_id = $cart->course_id;
            $order->total = $cartTotal ; 
            $order->status = 'in process' ; 
            $order->save();
        }       

        Cart::where('user_id', $userId)->delete();
        return to_route('stripe.index');
        

    }

    public function myLearning (){
        $myCourses = Purchase::where('user_id',Auth::user()->id)->paginate();
        return view('front.mylearning',get_defined_vars());
    }

}
