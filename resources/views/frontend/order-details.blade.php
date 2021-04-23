@extends('frontend.layout')
@section('body')
    <section>
         <div class="container mt-5">
                 <div class="row mt-5">
                     <h1 class="text-center">Order Details #{{$order->id}}</h1>
                     <p class="order-status"><strong>{{$order->status}}</strong></p>
                     <div id="customer-details">
                         <table class="table">
                             <tr>
                                 <th>Delivery Address:</th>
                                 <td>{{$order->delivery_address}}</td>
                             </tr>
                             <tr>
                                 <th>City:</th>
                                 <td>{{$order->city}}</td>
                             </tr>
                             <tr>
                                 <th>State:</th>
                                 <td>{{$order->state}}</td>
                             </tr>
                             <tr>
                                 <th>ZIP:</th>
                                 <td>{{$order->zip}}</td>
                             </tr>
                             <tr>
                                 <th>Country:</th>
                                 <td>{{$order->country}}</td>
                             </tr>
                             <tr>
                                 <th>Referer:</th>
                                 <td>{{$order->student ? $order->student->name . ' - '. $order->student->code : 'None'}}</td>
                             </tr>
                         </table>
                     </div>
                     <table class="table mt-5">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->order_lines as $key => $order_line)
                                <tr>
                                    <td>{{$order_line->product->title}}</td>
                                    <td>{{$order_line->product->price}}</td>
                                    <td>{{$order_line->quantity}}</td>
                                    <td>{{$order_line->total}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" rowspan="3"></td>
                                <th>Sub Total</th>
                                <td>{{$order->sub_total}}</td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td>{{$order->discount}}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{$order->total}}</td>
                            </tr>
                        </tfoot>
                     </table>
                     @if($order->status == 'pending')
                        <div class="text-center">
                            <a href="/orders/pay/{{$order->id}}" id="pay">PAY NOW</a>
                        </div>
                     @endif

                     <div class="row mt-5">
                         <h4 class="text-center"><a href="/orders"><< GO BACK</a></h4>
                     </div>
                 </div>
             </div>
    </section>
    @include('frontend.components.footer')
@endsection
