<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\TrainerController;

################################## admin ##################################

Route::middleware(['auth','admin'])->name('admin.')->prefix('admins')->group(function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::controller(MessageController::class)->group(function(){
        Route::resource('messages',MessageController::class)->only(['index', 'show', 'destroy']);
    });

    Route::controller(EventController::class)->group(function(){
        Route::resource('events',EventController::class);
    });

    Route::controller(TrainerController::class)->group(function() {
        Route::resource('trainers', TrainerController::class)->except([ 'update', 'edit']);
    });

    Route::controller(CourseController::class)->group(function() {
        Route::resource('courses', CourseController::class)->except([ 'update', 'edit']);
    });

    Route::controller(LessonController::class)->group(function(){
        Route::resource('lessons',LessonController::class)->except([ 'update', 'edit']);
    });



});



################################## Front ##################################
Route::controller(FrontController::class)->name('front.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/about','about')->name('about');
    Route::get('/courses','courses')->name('courses'); 
    Route::get('/contact','contact')->name('contact');  
    Route::get('/trainers','trainers')->name('trainers'); 
    Route::get('/premium','premium')->name('premium');
    Route::get('/event','event')->name('event');
    Route::post('/storemessage','storeMessage')->name('message.store');
    Route::get('courses/details/{course}','courseDetail')->name('courses.show');
    ########################### Cart ##############################
    Route::get('/my-cart','myCart')->name('cart.index');    
    Route::post('/add-to-cart/{id}}','add_to_cart')->name('cart.store')->middleware('auth');
    Route::delete('/cart/remove/{id}',  'removeCartElement')->name('cart.remove');
    ########################### Order ###############################
    Route::get('/order','orderConfirm')->name('orderConfirm')->middleware('auth');
    #################################################################
    Route::get('/notifications/count','getUnreadCount')->name('notifications.count');
    Route::get('/notifications/list', 'getNotifications')->name('notifications.list');
    Route::get('/notification/read/{id}','markNotificationAsRead')->name('notification.read');

    Route::get('mylearning','myLearning')->middleware('auth')->name('myleaning');
}); 


####################  chick out  ####################

Route::get('/checkout', [CheckoutController::class, 'index'])->name('front.checkout.index')->middleware('auth');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

######################################################

Route::controller(StripeController::class)->middleware('auth')->group(function(){
    Route::get('stripe', 'stripe')->name('stripe.index');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
