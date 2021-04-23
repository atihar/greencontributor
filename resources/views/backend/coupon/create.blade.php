@extends('adminlte::page')
@section('title', 'Dashboard | Create Coupon')

@section('content_header')
<h1>Create Coupon</h1>
@endsection

@section('content')
    @foreach($errors as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
    <form action="/dashboard/coupon/store" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="coupon_code">Coupon Code</label>
            <input type="text" class="form-control" id="coupon_code" name="coupon_code">
        </div>
        <div class="form-group">
            <label for="coupon_discount">Discount(Amount)</label>
            <input type="text" class="form-control" id="coupon_discount" name="coupon_discount">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Create</button>
            <button class="btn btn-warning" type="reset">Reset</button>
        </div>
    </form>
@endsection