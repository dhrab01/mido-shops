<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('type','slider')->where('status',1)->get()->toArray();
        $display_1 = Banner::where('type','fix')->where('class','display_1')->where('status',1)->get()->toArray();
        $display_2 = Banner::where('type','fix')->where('class','display_2')->where('status',1)->get()->toArray();
        $display_3 = Banner::where('type','fix')->where('class','display_3')->where('status',1)->get()->toArray();
        $footer_banners = Banner::where('type','footer')->where('status',1)->get()->toArray();
        // dd($display_1);
        return view('frontend.home')->with(compact('banners','display_1','display_2','display_3','footer_banners'));
    }
}
