@extends('adminlte::page')
@section('title', 'Dashboard | Quantity Types')

@section('content_header')
<h1>Quantity Types</h1>
@endsection

@section('content')
    <div class="container">
        @isset($success)
            <div class="alert alert-danger" role="alert">
                {{$success}}
            </div>
        @endisset
        <table class="table text-center w-100">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Default</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $key => $quantity_type)
                    <tr>
                        <td>{{$quantity_type->title}}</td>
                        <td><i class="fas {{$quantity_type->default ? 'fa-check' : 'fa-times'}}"></i></td>
                        <td><a href="/dashboard/quantity_type/make_default/{{$quantity_type->id}}">Make Default</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection
