@extends('adminlte::page')
@section('title', 'Dashboard | Create Product Category')

@section('content_header')
<h1>Edit Product Category</h1>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/product_category/update/{{$old->id}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" name="title" value="{{$old->title}}">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Update</button>
        <button class="btn btn-warning" type="reset">Reset</button>
    </div>
</form>
@endsection
