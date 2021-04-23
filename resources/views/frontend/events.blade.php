@extends('frontend.layout')
@section('body')
    <section class="page-fix mt-5 pt-5"></section>
    <div class="page-title">
        <h2 class="text-center text-uppercase"><b>Events</b></h2>
    </div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Country</th>
                <th>City</th>
                <th>Title</th>
                <th>Destination Time</th>
                <th>Status</th>
                <th>Link</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{$event->start_date}}</td>
                    <td>{{$event->city->country}}</td>
                    <td>{{$event->city->name}}</td>
                    <td>{{$event->title}}</td>
                    <td><span class="current-time" data-city="{{$event->city->name}}, {{$event->city->country}}"></span></td>
                    <td>{{$event->status}}</td>
                    <td><button class="btn btn-dark" id="myBtn" href="#" class="">Join</button> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('frontend.components.footer')
@endsection
