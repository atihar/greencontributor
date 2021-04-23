@extends('adminlte::page')
@section('title', 'Dashboard | Product Categories')

@section('content_header')
<h1>Product Categories</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $product_category)
                <div class="col-4">
                    <div class="card p-2">
                        <h3>{{$product_category->title}}</h3>
                        <div class="text-right pt-3">
                            <a href="/dashboard/product_category/edit/{{$product_category->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="/dashboard/product_category/delete/{{$product_category->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
