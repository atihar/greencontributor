@extends('adminlte::page')
@section('title', 'Dashboard | Edit Slider')

@section('content_header')
<h1>Edit Slider</h1>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/slider/update/{{$old->id}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="slider">Slider</label>
        <input type="file" class="form-control" id="slider" name="link">
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

