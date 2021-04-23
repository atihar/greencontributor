@extends('adminlte::page')
@section('title', 'Dashboard | Create Product')

@section('content_header')
<h1>Create Product</h1><p>Image size 500px X 500px</p>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/product/store" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="product_category">Product Category</label>
        <select name="product_category_id" id="product_category" class="form-control">
            @foreach($product_categories as $product_category)
                <option value="{{$product_category->id}}">{{$product_category->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="featured_image">Featured Image</label>
        <input type="file" id="featured_image" class="form-control" name="featured_image">
    </div>
    <div class="form-group">
        <label for="short_description">Short Description</label>
        <input type="text" id="short_description" class="form-control" name="short_description">
    </div>
    <div class="form-group">
        <label for="long_description">Long Description</label>
        <textarea id="long_description" class="form-control" name="long_description"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="any" class="form-control" id="price" name="price" placeholder="">
    </div>
    <div class="form-group">
        <label for="commission">Commission</label>
        <input type="number" step="any" class="form-control" id="commission" name="commission" placeholder="">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Create</button>
        <button class="btn btn-warning" type="reset">Reset</button>
    </div>
</form>
@endsection

@section('css')
    <style>
        input[type=file] {
            height: 44px;
        }
    </style>
@stop
