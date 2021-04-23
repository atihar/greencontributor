<section id="slider" class="d-flex align-items-center p-0" style="max-height: 80vh;">
    @foreach($sliders as $key => $slider)
    <div class="slider-element">
        <img src="{{ asset($slider->link) }}" alt="Slider {{$key}}">
    </div>
    @endforeach
</section>
