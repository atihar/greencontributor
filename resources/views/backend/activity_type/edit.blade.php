@extends('adminlte::page')
@section('title', 'Dashboard | Create Activity Type')

@section('content_header')
<h1>Edit Activity Type</h1>
@endsection

@section('content')
@foreach($errors as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
@endforeach
<form action="/dashboard/activity_type/update/{{$old->id}}"  method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" name="title" placeholder="Enter the title for Activity Master..." value="{{$old->title}}">
    </div>
    <div class="form-group">
        <label for="points">Points</label>
        <input type="number" id="points" class="form-control" name="points" min="0000" max="9999" value="{{$old->points}}">
    </div><div class="form-group">
        <div class="form-check">
            @if($old->hasVideo)
                <input type="hidden" name="hasVideo" value="0">
                <input class="form-check-input" type="checkbox" name="hasVideo" id="hasVideo" checked>
            @else
                <input type="hidden" name="hasVideo" value="0">
                <input class="form-check-input" type="checkbox" name="hasVideo" id="hasVideo">
            @endif
            <label class="form-check-label" for="hasVideo">
                Does the activity type has video?
            </label>
        </div>
        <div class="form-check">
            @if($old->hasPhoto)
                <input type="hidden" name="hasPhoto" value="0">
                <input class="form-check-input" type="checkbox" name="hasPhoto" id="hasPhoto" checked>
            @else
                <input type="hidden" name="hasPhoto" value="0">
                <input class="form-check-input" type="checkbox" name="hasPhoto" id="hasPhoto">
            @endif
            <label class="form-check-label" for="hasPhoto">
                Does the activity type has photo?
            </label>
        </div>
        <div class="form-check">
            @if($old->hasText)
                <input type="hidden" name="hasText" value="0">
                <input class="form-check-input" type="checkbox" name="hasText" id="hasText" checked>
            @else
                <input type="hidden" name="hasText" value="0">
                <input class="form-check-input" type="checkbox" name="hasText" id="hasText">
            @endif
            <label class="form-check-label" for="hasText">
                Does the activity type has description?
            </label>
        </div>
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
