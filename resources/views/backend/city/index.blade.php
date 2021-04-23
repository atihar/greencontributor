@extends('adminlte::page')
@section('title', 'Dashboard | Cities')

@section('content_header')
<h1>Cities</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $city)
                <div class="col-4">
                    <img src="/{{$city->landscape_photo}}" alt="{{$key}}" class="img-fluid">
                    <div class="text-right pt-3">
                        <a href="/dashboard/city/edit/{{$city->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/city/delete/{{$city->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
