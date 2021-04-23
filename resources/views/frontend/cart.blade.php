@extends('frontend.layout')
@section('body')
    <section class="mt-5">
        <div class="container mt-5">
            <div class="row mt-5">
                <h1 class="text-center p-5">Cart</h1>
                @if(!$cart)
                    <p class="text-center">No products added to cart!</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $cart_product)
                            <tr>
                                <td>{{$cart_product->product->title}}</td>
                                <td>{{$cart_product->product->price}}</td>
                                <td>{{$cart_product->quantity}}</td>
                                <td>{{$cart_product->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4">TOTAL = ${{$total}}</td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="flex justify-center align-center p-3">
                        <a href="/checkout" class="btn buy-btn" style="background: #009970; color: white; border-radius: 20px; padding: 8px 25px; margin-right:20px; font-size: 13px;">Place Order</a>
                    </div>
                    <div class="flex justify-center align-center p-3">
                        <a href="/clear-cart" class="btn buy-btn" style="background: #b21d1d; color: white; border-radius: 20px; padding: 8px 25px; margin-right:20px; font-size: 13px;">Clear Cart</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('frontend.components.footer')
@endsection
