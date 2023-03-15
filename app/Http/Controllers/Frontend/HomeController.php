<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('type','slider')->where('status',1)->get()->toArray();
        $display_1 = Banner::where('type','fix')->where('class','display_1')->where('status',1)->get()->toArray();
        $display_2 = Banner::where('type','fix')->where('class','display_2')->where('status',1)->get()->toArray();
        $display_3 = Banner::where('type','fix')->where('class','display_3')->where('status',1)->get()->toArray();
        $footer_banners = Banner::where('type','footer')->where('status',1)->get()->toArray();
        $newprodects = Product::orderBy('id','Desc')->where('status','1')->limit(4)->get()->toArray();
         //dd($newprodects);
        return view('frontend.home')->with(compact('banners','newprodects','display_2','display_3','footer_banners'));
    }
}
