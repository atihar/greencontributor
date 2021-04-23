<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\Student;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdersController extends BlendxController
{
    // Checkout
    public function checkout()
    {
        $cart = [];
        if(!Session::exists('cart_products')){
            return view('frontend.cart', ['cart' => false]);
        }
        $session_cart = Session::get('cart_products');
        $total = 0;
        foreach ($session_cart as $product_id => $quantity){
            $cart_product = new \stdClass();
            $product = Product::findOrFail($product_id);
            $cart_product->product = $product;
            $cart_product->quantity = $quantity;
            $cart_product->price = $quantity * $cart_product->product->price;
            $total+=$cart_product->price;
            array_push($cart, $cart_product);
        }
        return view('frontend.order', ['cart' => $cart, 'total' => $total]);
    }
    // Place Order
    public function order(Request $request)
    {
        $cart = [];
        if(!Session::exists('cart_products')){
            return view('frontend.cart', ['cart' => false]);
        }
        $session_cart = Session::get('cart_products');
        $total = 0;
        foreach ($session_cart as $product_id => $quantity){
            $cart_product = new \stdClass();
            $product = Product::findOrFail($product_id);
            $cart_product->product = $product;
            $cart_product->quantity = $quantity;
            $cart_product->price = $quantity * $cart_product->product->price;
            $total+=$cart_product->price;
            array_push($cart, $cart_product);
        }

        // Create Order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->sub_total = $total;
        if($request->has('student_id') && $request->student_id != null){
            $student = Student::where('code', $request->student_id)->first();
            if($student){
                $order->student_id = $student->id;
            }
        }
        //check for coupon code
        $coupon_used = false;
        if($request->coupon_code){
            
            $coupon = Coupon::where('coupon_code',$request->coupon_code)->first();
            if ($coupon && !$coupon_used) {
                $total = $total - $coupon->coupon_discount;
                $order->discount = $coupon->coupon_discount;
                $coupon_used = true;
            }
            else if($coupon && $coupon_used){
                
                $message = 'coupon already applied';
            }
            else{
                $message = 'Invalid coupon code';
            }
            $order->total = $total;
        }
        else{
            $order->total = $total;
        }
        $order->delivery_address = $request->delivery_address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->country = $request->country;
        $order->save();
        foreach ($cart as $key => $product){
            $line = new OrderLine();
            $line->order_id = $order->id;
            $line->product_id = $product->product->id;
            $line->quantity = $product->quantity;
            $line->total = $product->price;
            $line->save();
        }
        Session::pull('cart_products');
        return redirect('/orders/'.$order->id);
    }

    // Load Orders
    public function orders()
    {
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        return view('frontend.orders', ['orders' => $orders]);
    }

    // Load Order Details
    public function order_details(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        return view('frontend.order-details', ['order' => $order]);
    }

    public static function details(Request $request, $model, $id)
    {
        $order = Order::findOrFail($id);
        return view('backend.order.show', ['order' => $order]);
    }

    public static function accept(Request $request, $model, $id)
    {
        
        $request->merge([
            'status' => 'accepted'
        ]);
        self::changeStatus($request, $model, $id);
        return redirect('/dashboard/order');
    }

    public static function decline(Request $request, $model, $id)
    {
        $request->merge([
            'status' => 'declined'
        ]);
        self::changeStatus($request, $model, $id);
        return redirect('/dashboard/order');
    }

    public static function changeStatus(Request $request, $model, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect('/dashboard/order/details/'.$id);
    }
}
