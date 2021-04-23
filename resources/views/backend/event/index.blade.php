
@extends('adminlte::page')
@section('title', 'Dashboard | Events')

@section('content_header')
    <h1>Events</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset
        <table class="table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $event)
                <tr>
                    <td>{{$event->start_date}}</td>
                    <td>{{$event->city->country}}</td>
                    <td>{{$event->city->name}}</td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->status}}</td>
                    <td>
                        <a href="/dashboard/event/edit/{{$event->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/event/delete/{{$event->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection
