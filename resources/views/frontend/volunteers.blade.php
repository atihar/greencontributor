@extends('frontend.layout')

@section('page-css-tag')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('body')
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-6 md-12 mt-5">
                    <h2 class="text-center"><b>Want to join as a volunteers?</b></h2>
                    <p class="text-center">We are trying to make the world plastic free. If you want to join the greencontributor force write what you want to do with us!</p>
                </div>

                <div class="col-6 md-12">
                    @csrf
                    <form class="w-75 m-auto" action="/send-message" method="get">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">How you are going to help us?</label>
                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div>
                            <button type="submit" style="background:#009970" class="btn btn-info">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-1">
                    <h2 class="text-center"><b>Our Volunteers</b></h2>
                    <p class="text-center">Here are some volunteers who are helping us from different part of the world</p>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.components.footer')
@endsection

