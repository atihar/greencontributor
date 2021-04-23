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
            @foreach($all as $key => $video_categories)
                <div class="col-4">
                    <div class="card p-2">
                        <h3>{{$video_categories->title}}</h3>
                        <div class="text-right pt-3">
                            <a href="/dashboard/video_category/edit/{{$video_categories->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="/dashboard/video_category/delete/{{$video_categories->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection