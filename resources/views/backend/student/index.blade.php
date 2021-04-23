@extends('adminlte::page')
@section('title', 'Dashboard | Students')

@section('content_header')
<h1>Students</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $student)
                <div class="col-4">
                    <h3>{{$student->name}}</h3>
                    <p><strong>Student Code:</strong> {{$student->code}}</p>
                    <p><strong>School:</strong> {{$student->school->name}}</p>
                    <p><strong>City:</strong> {{$student->school->city->name}}</p>
                    <div class="text-right pt-3">
                        <a href="/dashboard/student/edit/{{$student->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/student/delete/{{$student->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
