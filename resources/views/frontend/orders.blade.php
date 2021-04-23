@extends('frontend.layout')
@section('body')
    <section style="min-height: 70vh;">
        <div class="container my-5">
            <div class="row mt-5"></div>
            <h1 class="text-center">My Orders</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->created_at}}</td>
                            <td><a href="/orders/{{$order->id}}">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @include('frontend.components.footer')
@endsection
