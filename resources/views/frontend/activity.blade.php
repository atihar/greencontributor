@extends('frontend.layout')

@section('page-css-tag')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('body')
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col m-5">
                    <h2 class="text-center"><b>Submit a Green Contributor Activity</b></h2>
                    <p class="text-center">Send activity using proper student code, teachers code and email so that it's an official activity.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @csrf
                    <form class="w-75 m-auto" action="#" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Teachers Code</label>
                                <input type="text" class="form-control" name="first_name" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Student Code</label>
                                <input type="text" class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Your Name</label>
                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Official Activity</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Drive Link/ Onedrive Link (Public Link)</label>
                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                I am ensuring that the parents have given permission to upload this content to greencontributor.
                            </label>
                        </div>

                        <div>
                            <button type="submit" style="background:#009970" class="btn btn-info">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-4 p-5">
                    <h3><b>Our Address</b></h3>
                    169, Manley Lane<br>
                    Milton, Ontario – L9T5P1<br>
                    Canada
                </div>
                <div class="col-4 p-5">
                    <h3><b>Tel</b></h3>
                    +1.905.267.0730 <br>
                    +1.416.720.4834<br>
                    Toll Free. 1.866.686.5087
                </div>
                <div class="col-4 p-5">
                    <h3><b>Email</b></h3>
                    info@greencontributor.org<br>
                    For program details - <br>
                    gkoshy@greencontributor.com
                </div>
            </div>
        </div>
    </section>
    @include('frontend.components.footer')
@endsection

