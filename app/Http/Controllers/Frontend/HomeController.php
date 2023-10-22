<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Section;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('type','slider')->where('status',1)->get()->toArray();
        $display_1 = Banner::where('type','fix')->where('class','display_1')->where('status',1)->get()->toArray();
        $display_2 = Banner::where('type','fix')->where('class','display_2')->where('status',1)->get()->toArray();
        $display_3 = Banner::where('type','fix')->where('class','display_3')->where('status',1)->get()->toArray();
        $footer_banners = Banner::where('type','footer')->where('status',1)->get()->toArray();
        $newprodects = Product::orderBy('id','Desc')->where('status','1')->limit(8)->get()->toArray();
        $featured_products = Product::where('is_featured','Yes')->where('status',1)->limit(8)->inRandomOrder()->get()->toArray();
        $best_sellers = Product::where('is_bestSeller','Yes')->where('status',1)->inRandomOrder()->get()->toArray(); 
        $dicounted_products = Product::where('product_discount','>',0)->where('status',1)->limit(8)->inRandomOrder()->get()->toArray();
        $trend_products = Product::where('status',1)->inRandomOrder()->get()->toArray();
        $sections = Section::with('categories')->where('status',1)->get()->toArray();
        return view('frontend.home')->with(compact('banners','newprodects','display_2','display_3','footer_banners','best_sellers',
        'dicounted_products','featured_products','trend_products','sections'));
    }
}
