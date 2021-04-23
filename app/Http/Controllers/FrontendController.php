<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ProductCategory;
use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\City;
use App\Models\Intro;
use App\Models\About;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    // Home
    public function home()
    {
        $sliders = Slider::all();
        $cities = City::all();
        $intros = Intro::all();
        $all_events = Event::all();
        $events = [];
        foreach ($all_events as $event){
            if($event->status != 'Past'){
                array_push($events, $event);
            }
        }
        $testimonials = Testimonial::take(5)->get();
        $products = Product::take(8)->get();
        $videos = Video::take(8)->get();
        return view("frontend.home", [
            'sliders' => $sliders,
            'cities' => $cities,
            'events' => $events,
            'intros' => $intros,
            'videos' => $videos,
            'products' => $products,
            'testimonials' => $testimonials,
        ]);
    }
    // Explore
    public function explore()
    {
        $video_categories =  VideoCategory::all();
        $videos = Video::all();
        return view("frontend.explore", [
            "video_categories" => $video_categories,
            "videos" => $videos
        ]);
    }
    // Events
    public function events()
    {
        $events = Event::all();
        return view("frontend.events", ['events' => $events]);
    }
    // Shop
    public function shop($category_slug = false)
    {
        $products = Product::all();
        $categories = ProductCategory::all();

        if($category_slug){
            $category = ProductCategory::where('slug', $category_slug)->first();
            $products = $category->products;
        }
        return view("frontend.shop", ['products' => $products, 'categories' => $categories]);
    }
    // About
    public function about()
    {
        return view("frontend.about");
    }
    // Contact
    public function contact()
    {
        return view("frontend.contact");
    }
    // Cart
    public function cart()
    {
        return view("frontend.cart");
    }
    // Dashboard
    public function dashboard()
    {
        return view('backend.dashboard');
    }
    // Policy Page
    public function policy()
    {
        return view('frontend.policy');
    }
    // volunteers
    public function volunteers()
    {
        return view('frontend.volunteers');
    }
    public function terms()
    {
        return view('frontend.terms');
    }
    public function activity()
    {
        return view('frontend.activity');
    }
}
