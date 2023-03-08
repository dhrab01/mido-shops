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
        $fix_banners = Banner::where('type','fix')->where('status',1)->get()->toArray();
        $footer_banners = Banner::where('type','footer')->where('status',1)->get()->toArray();

        return view('frontend.home')->with(compact('banners','fix_banners','footer_banners'));
    }
}
