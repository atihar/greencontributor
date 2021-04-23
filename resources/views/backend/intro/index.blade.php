@extends('adminlte::page')
@section('title', 'Dashboard | Videos')

@section('content_header')
<h1>Intro Videos</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $video)
                <div class="col-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video autoplay loop class="embed-responsive-item" src="{{asset($video->video)}}"></video>
                    </div>
                    <div class="text-right pt-3">
                        <a href="/dashboard/intro/edit/{{$video->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/intro/delete/{{$video->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
