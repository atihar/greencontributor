@extends('frontend.layout')
@section('body')
    <section class="page-fix mt-5 pt-5"></section>

    <section id="green-products">
        <h2 class="text-center text-uppercase"><b>green products</b></h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/shop">All</a>
                        </li>
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/shop/{{$category->slug}}">{{$category->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-10">
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
                </div>
            </div>
        </div>
    </section>

    @include('frontend.components.footer')

@endsection
