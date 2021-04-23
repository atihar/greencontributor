@extends('adminlte::page')
@section('title', 'Dashboard | Create Video')

@section('content_header')
<h1>Create Video</h1>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/video/store" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="video_category">Video Category</label>
        <select name="video_category_id" id="video_category" class="form-control">
            @foreach($video_categories as $video_category)
                <option value="{{$video_category->id}}">{{$video_category->title}}</option>
            @endforeach
        </select>
    </div>
{{--    <div class="form-group">--}}
{{--        <label for="video">Video</label>--}}
{{--        <input type="file" class="form-control" id="video" name="link">--}}
{{--    </div>--}}
    <div class="form-group">
        <label for="youtube_link">YouTube Link</label>
        <input type="text" class="form-control" id="youtube_link" name="link">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Create</button>
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

@section('adminlte_js')

@endsection
