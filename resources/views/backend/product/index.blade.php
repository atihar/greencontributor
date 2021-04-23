@extends('adminlte::page')
@section('title', 'Dashboard | Products')

@section('content_header')
<h1>Products</h1><p>Image size 500px X 500px</p>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $product)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{$product->title}}</h1>
                        </div>
                        <div class="card-body">
                            <img src="{{asset($product->featured_image)}}" alt="{{$product->title}}" class="card-img-top">
                            <p class="card-text">
                                <strong>Category: </strong>{{$product->product_category->title}}<br>
                                <strong>Short Description: </strong>{{$product->short_description}}<br>
                                <strong>Long Description: </strong>{{$product->long_description}}<br>
                                <strong>Price: </strong>{{$product->price}}<br>
                                <strong>Commission: </strong>{{$product->commission}}<br>
                            </p>
                        </div>
                    </div>
                    <div class="text-right pt-3">
                        <a href="/dashboard/product/edit/{{$product->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/product/delete/{{$product->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
