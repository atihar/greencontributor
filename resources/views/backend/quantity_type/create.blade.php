@extends('adminlte::page')
@section('title', 'Dashboard | Create Quantity Type')

@section('content_header')
<h1>Create Quantity Type</h1>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/quantity_type/store" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" name="title" placeholder="Enter the title for Quantity Type..." value="">
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="default" id="default">
            <label class="form-check-label" for="default">
                Is it the default quantity type?
            </label>
        </div>
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
