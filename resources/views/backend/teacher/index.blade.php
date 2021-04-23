@extends('adminlte::page')
@section('title', 'Dashboard | Teachers')

@section('content_header')
<h1>Teachers</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $teacher)
                <div class="col-4">
                    <h3>{{$teacher->name}}</h3>
                    <p><strong>Teacher Code:</strong> {{$teacher->code}}</p>
                    <p><strong>School:</strong> {{$teacher->school->name}}</p>
                    <p><strong>City:</strong> {{$teacher->school->city->name}}</p>
                    <div class="text-right pt-3">
                        <a href="/dashboard/teacher/edit/{{$teacher->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/teacher/delete/{{$teacher->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
