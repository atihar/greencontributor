@extends('adminlte::page')
@section('title', 'Dashboard | Orders')

@section('content_header')
<h1>Orders</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
                <table class="table w-100 text-center">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all as $key => $order)
                            <tr class="{{$order->status == 'accepted' ? 'bg-success' : ($order->status == 'declined' ? 'bg-danger' : '')}}">
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->student ? $order->user->student->name : ($order->user->teacher ? $order->user->teacher->name : ($order->user->customer ? $order->user->customer->name : 'Administrator'))}}</td>
                                <td class="text-capitalize">{{$order->status}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="/dashboard/order/accept/{{$order->id}}" class="mx-1 {{$order->status == 'accepted' ? 'text-white' : ($order->status == 'declined' ? 'text-white' : '')}}"><i class="fas fa-check"></i></a>
                                    <a href="/dashboard/order/decline/{{$order->id}}" class="mx-1 {{$order->status == 'accepted' ? 'text-white' : ($order->status == 'declined' ? 'text-white' : '')}}"><i class="fas fa-times"></i></a>
                                    <a href="/dashboard/order/details/{{$order->id}}" class="mx-1 {{$order->status == 'accepted' ? 'text-white' : ($order->status == 'declined' ? 'text-white' : '')}}"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
