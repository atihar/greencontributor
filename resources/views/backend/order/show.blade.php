@extends('adminlte::page')
@section('title', 'Dashboard | Order Details')

@section('content_header')
    <h1>Order #{{$order->id}}</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset
        <div class="row">
            <div class="col-6">
                <p><strong>Delivery Address: </strong> {{$order->delivery_address}}</p>
                <p><strong>City: </strong> {{$order->city}}</p>
                <p><strong>State: </strong> {{$order->state}}</p>
                <p><strong>ZIP: </strong> {{$order->zip}}</p>
                <p><strong>Country: </strong> {{$order->country}}</p>
                <p><strong>Referer: </strong> {{$order->student ? $order->student->name . ' - '. $order->student->code : 'None'}}</p>
                <p><strong>Discounted Amount: </strong> {{$order->discount}}</p>
            </div>
            <div class="col-6">
                <h4 class="text-capitalize">Current Status: {{$order->status}}</h4>
                <hr>
                <p>Change Status</p>
                <form action="/dashboard/order/changeStatus/{{$order->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{$order->status=='pending' ? 'selected' : ''}}>Pending</option>
                            <option value="accepted" {{$order->status=='accepted' ? 'selected' : ''}}>Accepted</option>
                            <option value="paid" {{$order->status=='paid' ? 'selected' : ''}}>Paid</option>
                            <option value="delivered" {{$order->status=='delivered' ? 'selected' : ''}}>Delivered</option>
                            <option value="cancelled" {{$order->status=='cancelled' ? 'selected' : ''}}>Cancelled</option>
                            <option value="declined" {{$order->status=='declined' ? 'selected' : ''}}>Declined</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <h4>Products</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
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
                </table>
            </div>
        </div>
        <div class="text-center"><a href="/dashboard/order"><< GO BACK</a></div>
    </div>
@endsection
