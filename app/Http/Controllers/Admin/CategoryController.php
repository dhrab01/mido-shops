<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


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

    public function addEditCategory(Request $request,$id=null)
    {
        Session::put('page','categories');
        if ($id=="") {
            //add category
            $title = "add category";
            $category = new Category;
            $getGategory = array();
            $message = "تمت الاضافة بنجاح";
        }else {
            //edit category
            $title = "edit category";
            $category = Category::find($id);
            $getGategory = Category::with('subCategory')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
            $message = "تم التحديث بنجاح";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            //upload category image
            if($request->hasFile('category_image'))
            {
                $img_tmp = $request->file('category_image');
                if($img_tmp->isValid()){
                    //get image extention
                    $extension = $img_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 9999) . '.' . $extension;
                    $imagePath = 'images/front/categories/'.$imageName;
                    
                    //upload the image
                     Image::make($img_tmp)->save($imagePath);
                     $category->catigory_1st_image = "";
                }
            }else {
                $category->catigory_1st_image = "";
            }
            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_dicount'];
            $category->description = $data['decription'];
            $category->url = $data['category_url'];
            $category->meta_title = $data['metatitle'];
            $category->meta_description = $data['metadescription'];
            $category->meta_keywords = $data['metakeywords'];
            $category->status = 1;
            $category->save();

            return redirect('admin/categories')->with('success_message',$message);
        }
        $sections = Section::get()->toArray();

        return view('admin.categories.add_edit_category')->with(compact('title','category','sections','getGategory'));

    }

    public function appendCatLevel(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $getGategory = Category::with('subCategory')->where(['section_id'=>$data['section_id']])->get()->toArray();
            return view('admin.categories.append_cat_level')->with(compact('getGategory'));   
        }
    }
}
