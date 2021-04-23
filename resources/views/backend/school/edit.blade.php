@extends('adminlte::page')
@section('title', 'Dashboard | Edit School')

@section('content_header')
<h1>Edit School</h1>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/school/update/{{$old->id}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$old->name}}">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{$old->address}}">
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <select name="city_id" id="city" class="form-control">
            @foreach($cities as $city)
                <option value="{{$city->id}}" {{$old->city_id==$city->id?'selected':''}}>{{$city->name}}</option>
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

