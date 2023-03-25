<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }

     public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\ProductAttribute');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductsImage');
    }

    public static function getDiscountPrice($product_id)
    {
        $proDetials = Product::select('product_price','product_discount','category_id')->where('id',$product_id)->first();
        $proDetials = json_decode(json_encode($proDetials),true);
        $catDetails = Category::select('category_discount')->where('id',$proDetials['category_id'])->first();
        $catDetails = json_decode(json_encode($catDetails),true);

        if($proDetials['product_discount']>0){

            $discounted_price = $proDetials['product_price'] - ($proDetials['product_price'] * $proDetials['product_discount']/100);
        }elseif($catDetails['category_discount']>0){

            $discounted_price = $proDetials['product_price'] - ($proDetials['product_price'] * $catDetails['category_discount']/100);
        }else {
            $discounted_price = 0;
        }
        return $discounted_price;
    }
    
}
