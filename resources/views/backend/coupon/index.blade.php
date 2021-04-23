@extends('adminlte::page')
@section('title', 'Dashboard | Create Coupon')

@section('content_header')
<h1>Coupons</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $coupon)
                <div class="col-4">
                    <h3>{{$coupon->coupon_code}}</h3>
                    <p><strong>Discount:</strong> {{$coupon->coupon_discount}}</p>
                    <div class="text-right pt-3">
                        <a href={{"/dashboard/coupon/edit/".$coupon->id}} class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href={{"/dashboard/coupon/delete/".$coupon->id}} class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection