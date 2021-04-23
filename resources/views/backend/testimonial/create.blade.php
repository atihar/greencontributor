@extends('adminlte::page')
@section('title', 'Dashboard | Create Testimonial')

@section('content_header')
<h1>Create Testimonial</h1>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/testimonial/store" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" class="form-control" name="message"></textarea>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="profile_image">Profile Image</label>
        <input type="file" id="profile_image" class="form-control" name="profile_image">
    </div>
    <div class="form-group">
        <label for="position">Position/Designation</label>
        <input type="text" class="form-control" id="position" name="position">
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
