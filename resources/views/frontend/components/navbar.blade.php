<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a class="text-white" {{config('app.url')}}"><img src="{{ asset('img/logo.png') }}" alt="greencontributor" class="img-fluid">GreenContributor</a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{config('app.url')}}">Home</a></li>
                    <li><a href="{{route('explore')}}">Explore</a></li>
                    <li><a href="{{route('events')}}">Events</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                    <li>
                        <a href="{{route('cart')}}">cart <i class="fas fa-shopping-cart"></i>
                            @if(\Illuminate\Support\Facades\Session::exists('cart_products'))
                                ({{count(\Illuminate\Support\Facades\Session::get('cart_products'))}})
                            @endif
                        </a>
                    </li>
                        @guest
                        <li class="get-started"><a href="/login" class="call-to-action">get started</a></li>
                        @else
                            <li><a href="/orders">Orders</a><li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                        <li class="get-started"><button class="btn" style="background: #009970; color: white; border-radius: 20px; padding: 8px 25px; margin-right:20px; font-size: 13px;" type="submit">Logout</button></li>
                            </form>
                        @endguest
                </ul>
            </nav><!-- .nav-menu -->
        </div><!-- End Header Container -->
    </div>
</header><!-- End Header -->
