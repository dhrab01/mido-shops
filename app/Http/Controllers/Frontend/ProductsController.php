<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Product;

class ProductsController extends Controller
{
    public function listing()
    {
        // echo "test"; die;
        $url = Route::getFacadeRoot()->current()->uri();
        $CategoryCount = Category::where(['url'=>$url, 'status' =>1])->count();
        if($CategoryCount > 0) {
            $categoryDetails = Category::CategoryDetails($url);
            $catProducts = Product::whereIn('category_id', $categoryDetails['catIds'])->where('status',1)->get()->toArray();
            // dd($catProducts);
            return view('frontend.products.listing')->with(compact('categoryDetails', 'catProducts'));
        }else {
            abort(404);
        }
    }
}
