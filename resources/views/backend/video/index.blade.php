@extends('adminlte::page')
@section('title', 'Dashboard | Video Categories')

@section('content_header')
<h1>Video Categories</h1>
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
                        <iframe width="560" height="315" src="{{asset($video->link)}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="text-right pt-3">
{{--                        <a href="/dashboard/video/edit/{{$video->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>--}}
                        <a href="/dashboard/video/delete/{{$video->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
