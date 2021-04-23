@extends('adminlte::page')
@section('title', 'Dashboard | Sliders')

@section('content_header')
<h1>Sliders </h1><p>( 1920px X 1000 px)</p>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset

        <div class="row">
            @foreach($all as $key => $slider)
                <div class="col-4">
                    <img src="/{{$slider->link}}" alt="{{$key}}" class="img-fluid">
                    <div class="text-right pt-3">
                        <a href="/dashboard/slider/edit/{{$slider->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="/dashboard/slider/delete/{{$slider->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
