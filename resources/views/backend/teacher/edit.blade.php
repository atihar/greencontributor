@extends('adminlte::page')
@section('title', 'Dashboard | Edit Teacher')

@section('content_header')
    <h1>Edit Teacher</h1>
@endsection

@section('content')
    @foreach($errors as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
    <form action="/dashboard/teacher/update/{{$old->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$old->name}}">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender">
                <option value="male" {{$old->gender == 'male' ? 'selected' : ''}}>Male</option>
                <option value="female" {{$old->gender == 'female' ? 'selected' : ''}}>Female</option>
                <option value="other" {{$old->gender == 'other' ? 'selected' : ''}}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$old->user->email}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="school">School</label>
            <select name="school_id" id="school" class="form-control">
                @foreach($schools as $school)
                    <option value="{{$school->id}}" {{$school->id == $old->school_id ? 'selected' : ''}}>{{$school->name}}</option>
                @endforeach
            </select>
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

