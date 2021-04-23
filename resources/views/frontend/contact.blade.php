@extends('frontend.layout')

@section('page-css-tag')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('body')
    <section>
         <div class="container mt-5">
             <div class="row">
                 <div class="col m-5">
                     <h2 class="text-center"><b>Write your message</b></h2>
                     <p class="text-center">We will be glad to hear anything that might help us to grow our organization for a greener world. If you have any question reguarding our operations you can also write a query message here</p>
                 </div>
             </div>
            <div class="row">
                <div class="col">
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
                          <label for="exampleFormControlTextarea1">Message</label>
                          <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div>
                            <button type="submit" style="background:#009970" class="btn btn-info">Send Message</button>
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

