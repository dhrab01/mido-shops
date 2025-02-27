<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo('App\Models\Section', 'section_id')->select('id','name');
    }

    public function parent_category(){
        return $this->belongsTo('App\Models\Category', 'parent_id')->select('id','category_name');
    }

    public function subCategory(){
        return $this->hasMany('App\Models\Category', 'parent_id')->where('status',1);
    }

    public static function CategoryDetails($url) {
        $categoryDetails = Category::select('id', 'category_name', 'url')->with('subCategory')->where('url',$url)->first()->toArray();
        // dd($categoryDetails);
        $catIds = array();
        $catIds[] = $categoryDetails['id'];
        foreach($categoryDetails['sub_category'] as $key => $subCat) {
            $catIds[] = $subCat['id'];
        }
        $resp = array('catIds' => $catIds, 'categoryDetails' => $categoryDetails);
        return $resp;
    }
}
