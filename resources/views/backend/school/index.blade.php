@extends('adminlte::page')
@section('title', 'Dashboard | Schools')

@section('content_header')
<h1>Schools</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $school)
                <div class="col-4">
                    <h3>{{$school->name}}</h3>
                    <p><strong>Short Name:</strong> {{$school->short_name}}</p>
                    <p><strong>Address:</strong> {{$school->address}}</p>
                    <p><strong>City:</strong> {{$school->city->name}}</p>
                    <div class="text-right pt-3">
                        <a href="/dashboard/school/edit/{{$school->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/school/delete/{{$school->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
