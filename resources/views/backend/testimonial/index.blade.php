@extends('adminlte::page')
@section('title', 'Dashboard | Testimonials')

@section('content_header')
<h1>Testimonials</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $testimonial)
                <div class="col-4">
                    <div class="card p-2">
                        <h3>{{$testimonial->name}}</h3>
                        <h5>{{$testimonial->position}}</h5>
                        <p>{{$testimonial->message}}</p>
                        <div class="text-right pt-3">
                            <a href="/dashboard/testimonial/edit/{{$testimonial->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="/dashboard/testimonial/delete/{{$testimonial->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
