@extends('frontend.layout')
@section('body')
<section style="margin-top:10vh;" id="explore" class="explore ">
    <div class="container">

        <div class="section-title" data-aos="fade-left">
            <h2>Video Gallery</h2>
            <p>Watch our all videos from different categories</p>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a href="#all-tab" class="nav-link active" id="all" data-toggle="pill" role="tab" aria-controls="all-tab" aria-selected="true">All</a>
                    </li>
                    @foreach($video_categories as $video_category)
                        <li class="nav-item">
                            <a class="nav-link" id="{{strtolower(str_replace(' ', '_', $video_category->title))}}" data-toggle="pill" href="#{{strtolower(str_replace(' ', '_', $video_category->title))}}-tab" role="tab" aria-controls="{{strtolower(str_replace(' ', '_', $video_category->title))}}-tab">{{$video_category->title}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="all-tab" role="tabpanel" aria-labelledby="all">
                        <div class="row">
                            @if(isset($videos) && count($videos)>0)
                                @foreach($videos as $video)
                                    <div class="col-lg-4 col-md-6 portfolio-item">
                                        <div class="portfolio-wrap">
                                            <div class="embed-responsive embed-responsive-16by9 my-2">
                                                @if(\Illuminate\Support\Str::contains($video->link, 'embed'))
                                                    <iframe width="560" height="315" src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                @else
                                                    <video muted src="{{ asset($video->link) }}" class="embed-responsive-item" controls="true"></video>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @foreach($video_categories as $video_category)
                        <div class="tab-pane fade show" id="{{strtolower(str_replace(' ', '_', $video_category->title))}}-tab" role="tabpanel" aria-labelledby="{{strtolower(str_replace(' ', '_', $video_category->title))}}-tab">
                            <div class="row">
                                    @foreach($video_category->videos as $video)
                                            <div class="col-lg-4 col-md-6 portfolio-item">
                                                <div class="portfolio-wrap">

                                                        @if(\Illuminate\Support\Str::contains($video->link, 'embed'))
                                                        <div class="embed-responsive embed-responsive-16by9 my-2">
                                                            <iframe width="380" height="300" src="{{asset($video->link)}}" frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                        @else
                                                            <video muted src="{{ asset($video->link) }}" class="embed-responsive-item" controls="true"></video>
                                                        @endif

                                                </div>
                                            </div>
                                    @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section><!-- End Portfolio Section -->
@include('frontend.components.footer')

@endsection
