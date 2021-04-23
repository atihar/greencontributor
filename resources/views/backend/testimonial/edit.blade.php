@extends('adminlte::page')
@section('title', 'Dashboard | Edit Student')

@section('content_header')
    <h1>Edit Student</h1>
@endsection

@section('content')
    @foreach($errors as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
    <form action={{"/dashboard/testimonial/update/".$old->id}} enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" class="form-control"  name="message" rows="5">{{$old->message}}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{$old->name}}">
        </div>
        <div class="form-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" id="profile_image" class="form-control" name="profile_image">
        </div>
        <div class="form-group">
            <label for="position">Position/Designation</label>
            <input type="text" class="form-control" id="position" name="position" value="{{$old->position}}">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Update</button>
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
