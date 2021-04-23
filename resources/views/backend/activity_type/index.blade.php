@extends('adminlte::page')
@section('title', 'Dashboard | Activity Types')

@section('content_header')
<h1>Activity Types</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $activity_type)
                <div class="col-4">
                    <h3>{{$activity_type->title}}</h3>
                    <p><strong>Points:</strong> {{$activity_type->points}}</p>
                    <p><strong>Video:</strong> {{$activity_type->hasVideo ? 'Required' : 'Not Required'}}</p>
                    <p><strong>Photo:</strong> {{$activity_type->hasPhoto ? 'Required' : 'Not Required'}}</p>
                    <p><strong>Description:</strong> {{$activity_type->hasText ? 'Required' : 'Not Required'}}</p>
                    <div class="text-right pt-3">
                        <a href="/dashboard/activity_type/edit/{{$activity_type->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/activity_type/delete/{{$activity_type->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
