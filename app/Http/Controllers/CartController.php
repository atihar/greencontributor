<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $id){
        try{
            $product = Product::findOrFail($id);
            if($request->session()->exists('cart_products.'.$id)){
                $existing_value = $request->session()->get('cart_products.'.$id);
                $existing_value++;
                $request->session()->put('cart_products.'.$id, $existing_value);
                return back();
            }else{
                $request->session()->put('cart_products.'.$id, 1);
                return back();
            }
        }catch (\Exception $error){
            dd($error->getMessage());
        }
    }

    public function cart(Request $request){
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
        return view('frontend.cart', ['cart' => $cart, 'total' => $total]);
    }
    public function clear_cart(Request $request)
    {
        $request->session()->forget('cart_products');
        return redirect()->back();
    }
}
