@extends('adminlte::page')
@section('title', 'Dashboard | Update Event')

@section('content_header')
    <h1>Update Event</h1>
@endsection

@section('content')
    @isset($error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endisset
    <form action="/dashboard/event/update/{{$old->id}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-6">
                <label for="start_date">Event Date</label>
                <input type="date" class="form-control date" id="start_date" name="start_date" value="{{$old->start_date}}">
            </div>
            <div class="form-group col-6">
                <label for="start_time">Event Time</label>
                <input type="time" class="form-control time" id="start_time" name="start_time" value="{{$old->start_time}}">
            </div>
        </div>
        <div class="form-group">
            <label for="city_id">City</label>
            <select name="city_id" id="city_id" class="form-control">
                @foreach($cities as $city)
                    <option value="{{$city->id}}" {{$old->city_id==$city->id?'selected':''}}>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$old->title}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$old->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="join_link">Join Link</label>
            <input type="text" class="form-control" id="join_link" name="join_link" value="{{$old->join_link}}">
        </div>
        <div class="form-group">
            <label for="crowdfund_link">Crowdfund Link</label>
            <input type="text" class="form-control" id="crowdfund_link" name="crowdfund_link" value="{{$old->crowdfund_link}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update</button>
            <a href="/dashboard/event" class="btn btn-danger">Go Back</a>
        </div>
    </form>
@endsection
