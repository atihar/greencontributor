@extends('frontend.layout')
@section('body')
    @include('frontend.components.slider', ['sliders' => $sliders])
    <!-- Event Display System -->
    <section id="event-display-seystem">
        <h2 class="text-center text-uppercase"><b>Event display system</b></h2>
        <h3 class="text-center color-primary">Your local time</h3>
        <div id="current-time" class="flex justify-center align-center">
            <div id="day"></div>
            <div>
                <span id="date"></span>
                <span id="month"></span>
                <span id="year"></span>
            </div>
            <div>
                <span id="hour"></span>
                <span>:</span>
                <span id="minutes"></span>
                <span>:</span>
                <span id="seconds"></span>
            </div>
            <div id="timezone"></div>
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
    </section>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="join_form">
                @csrf
                <label for="student_id">Enter Your Student ID</label><br>
                <input type="text" id="student_id" name="student_id">
                <button class="greenBtn">Request Link</button>
            </form>
        </div>

    </div>

    <!-- Time in cities -->
    <section id="time-in-cities">
        <h2 class="text-center text-uppercase"><b>Time in cities</b></h2>
        <div class="container">
            <div class="row time-grid">
                @foreach($cities as $key => $city)
                    <div class="col">
                        <div class="time-box">
                            <p>Current local time</p>
                            <h2>{{$city->name}}, {{$city->country}}</h2>
                            <p data-city="{{$city->name}}, {{$city->country}}" class="current-time"></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Intros -->
    <section id="intros">
        <h2 class="text-center text-uppercase"><b>intros</b></h2>
        <div class="container">
            <div class="row">
                <div class="intro-grid">
                    @foreach ($intros as $intro)
                        <div><video src="{{asset($intro->video)}}" type="" autoplay loop></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- About us -->
    <section id="about-us">
        <h2 class="text-center text-uppercase text-white"><b>About Us</b></h2>
    </section>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <h2 style="color: #009970;">Green Contributor </h2>
                    <h3>GreenContributor Inc. a Canadian-based organization has been involved in environmental and educational initiatives and also offers Global opportunities of entrepreneurship and research based programs for students, from all over the world for Universities and Business schools.</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                    <ul>
                        <li><i class="ri-check-double-line"></i> Since 2010, GreenContributor has worked with over 150 schools from 29 countries</li>
                        <li><i class="ri-check-double-line"></i> one of the highlights was partnering with University of Erlangen Nurnberg for a Climate Change Research Project as part of an initiative for the German educational system for Schools.</li>
                        <li><i class="ri-check-double-line"></i> GreenContributor offers diverse programs in different fields in many countries and besides being environmental and educational,  students also have opportunities for internship and entrepreneurship programs.</li>
                    </ul>
                    <p class="font-italic">
                        GreenContributor  expanded their programs to include students from universities including  GIP credit programs for undergrad students and also providing platforms to implement & convert their ideas into reality.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- Video gallery -->
    <section id="video-gallery">
        <h2 class="text-center text-uppercase"><b>video gallery</b></h2>
        <div class="container">
            <div id="video-slider">
                @foreach($videos as $video)
                    <div>
                        <div class="video-slider-element">
                            <iframe width="420" height="315" src="{{asset($video->link)}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Green products -->
    <section id="green-products">
        <h2 class="text-center text-uppercase"><b>green products</b></h2>
        <div class="container">
            <div class="row">
                <div id="product-slider">
                        @foreach($products as $product)
                        <div>
                            <div class="product-slider-element">
                            <img src="{{asset($product->featured_image)}}" alt="">
                            <div class="product-slider-description">
                                <h3>{{$product->title}}</h3>
                                <p>Product Category: {{$product->product_category->title}}</p>
                                <p>{{$product->short_description}}</p>
                            </div>
                            <div class="product-buttons flex justify-between align-center">
                                <span class="price">${{$product->price}}</span>
                                <a href="/add-to-cart/{{$product->id}}" class="btn" style="background: #009970; color: white; border-radius: 20px; padding: 8px 25px; margin-right:20px; font-size: 13px;">Add to cart</a>
                            </div>
                        </div>
                        </div>
                        @endforeach

                </div>
                <a class="cta-btn text-center mt-2" href="/shop">See all products</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials">
        <h2 class="text-center text-uppercase"><b>what people are saying about us?</b></h2>
        <div class="container">
            <div id="testimonails-slider">
                @foreach($testimonials as $testimonial)
                <div>
                    <div class="testimonials-slider-element">
                        <p> {{$testimonial->message}}</p>
                        <div class="testimonials-grid">
                            <img style="width:100px; border-radius: 50%;" src="{{asset($testimonial->profile_image)}}" alt="">
                            <h3>{{$testimonial->name}}</h3>
                            <p class="author-details">{{$testimonial->position}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


@include('frontend.components.footer')
@endsection
