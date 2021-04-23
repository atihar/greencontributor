<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BlendxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
    Frontend Routes
*/

// Homepage
Route::get('/', [FrontendController::class, 'home'])->name('home');
// Explore
Route::get('/explore', [FrontendController::class, 'explore'])->name('explore');
// Events
Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::post('/join', [EventsController::class, 'join']);
// Shop
Route::get('/shop/{category_slug?}', [FrontendController::class, 'shop'])->name('shop');
// About
Route::get('/about', [FrontendController::class, 'about'])->name('about');
// Policy
Route::get('/privacy-policy', [FrontendController::class, 'policy'])->name('policy');
// terms
Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
// Volunteers
Route::get('/volunteers', [FrontendController::class, 'volunteers'])->name('volunteers');
// Activity Submit
Route::get('/activity', [FrontendController::class, 'activity'])->name('activity');
// Contact
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/send-message', [ContactController::class, 'send_message']);
// Cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
// Add to Cart
Route::get('/add-to-cart/{id}', [CartController::class, 'add_to_cart'])->name('add-to-cart');
// Clear Cart
Route::get('/clear-cart', [CartController::class, 'clear_cart'])->name('clear-cart');
// Place Order
Route::get('/place-order', [OrdersController::class, 'order']);
//checkout
Route::get('/checkout', [OrdersController::class, 'checkout'])->middleware('auth');
Route::post('/checkout', [OrdersController::class, 'order'])->middleware('auth');
Route::get('/orders', [OrdersController::class, 'orders'])->middleware('auth');
Route::get('/orders/{id}', [OrdersController::class, 'order_details'])->middleware('auth');
Route::get('/orders/pay/{id}', [PaypalController::class, 'pay_order'])->middleware('auth');

// Paypal Routes
Route::get('/paywithpaypal', [PaypalController::class, 'payWithPaypal'])->name('paywithpaypal');
Route::post('/paypal', [PaypalController::class, 'postPaymentWithpaypal'])->name('paypal');
Route::get('/paypal', [PaypalController::class, 'getPaymentStatus'])->name('status');

/*
    Backend Routes
*/
Auth::routes();
Route::prefix('/dashboard')->middleware(['web','auth'])->group(function(){
    Route::get('/', [FrontendController::class, 'dashboard']);
    Route::any('/{model}/{action?}/{id?}', [BlendxController::class, 'serve']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
