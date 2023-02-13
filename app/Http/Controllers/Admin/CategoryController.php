<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        Session::put('page','categories');
        $categories = Category::with(['section','parent_category'])->get()->toArray();
        //  dd($categories);
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=='Active'){
                $status = 0;
            }else {
                $status = 1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    public function addEditCategory($id=null)
    {
        if ($id=="") {
            //add category
            $title = "add category";
            $category = new Category;
            $message = "category added successfully";
        }else {
            //edit category
            $title = "add category";
            $category = find($id);
            $message = "category updated successfully";
        }
        $sections = Section::get()->toArray();

        return view('admin.categories.add_edit_category')->with(compact('title','category','sections'));

    }
}
