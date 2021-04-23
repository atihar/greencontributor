<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                    <div class="logo">
                        <a class="text-white" {{config('app.url')}}"><img src="{{ asset('img/logo.png') }}" alt="greencontributor" class="img-fluid">GreenContributor</a>
                    </div>

                <p>
                    GreenContributor seeks to create a platform that provides an opportunity for students and the general community to
                    participate in environmental initiatives, besides providing environment education, learn about green initiatives,
                    volunteer in environmental community projects and a rewards and recognition program.
                </p>
                <form action="https://www.paypal.com/donate" method="post" target="_top">
                    <input type="hidden" name="hosted_button_id" value="DC64B3T6RWT6U" />
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/en_CA/i/scr/pixel.gif" width="1" height="1" />
                </form>
            </div>
            <div class="link-group-1">
                <p><b>Important Links</b></p>
                <p><a href="{{route('explore')}}">Explore</a></p>
                <p><a href="{{route('shop')}}">Shop</a></p>
                <p><a href="{{route('policy')}}">Privacy Policy</a></p>
                <p><a href="{{route('shop')}}">Products</a></p>

            </div>
            <div class="link-group-2">
                <p><b>About us</b></p>
                <p><a href="{{route('about')}}">Feed</a></p>
                <p><a href="{{route('contact')}}">Contact Us</a></p>
                <p><a href="{{route('terms')}}">Usage Terms</a></p>
                <p><a href="{{route('volunteers')}}">Volunteers</a></p>
            </div>
        </div>
    </div>

</footer>
<!-- Copyright -->
<div id="footer">


<div class="container d-md-flex py-4">
    <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
            &copy; Copyright <strong><span>Green Contributor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://weabers.com/">Weabers</a>
        </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
</div>
</div>
