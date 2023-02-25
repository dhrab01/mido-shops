<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Auth;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::with(['section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
             $query->select('id','category_name');
        },'admin'=>function($query){
            $query->select('id','name');
        }])->get()->toArray();
         // dd($products);
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=='Active'){
                $status = 0;
            }else {
                $status = 1;
            }
            Product::where('id',$data['module_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'module_id'=>$data['module_id']]);
        }

    }

    public function updateProductFeatured(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=='Yes'){
                $status = "No";
            }else {
                $status = "Yes";
            }
            Product::where('id',$data['product_id'])->update(['is_featured'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }

    }

    public function showDetail($id)
    {
        $details = Admin::with('vendorPersonal', 'vendorBusiness')->where('id',$id)->first();
        return response()->json([
            'status'=>200,
            'details'=>$details,
        ]);
    }

    public function addEditProduct(Request $request, $id=null)
    {
        if ($id=="") {
            $title = "اضافة منتج";
            $message = "تمت الاضافة بنجاح";
            $products = new Product;
        }else{
            $title = "تعديل منتج";
            $message = "تم التعديل بنجاح";
            $products = Product::find($id);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);

            $rules = [
                'category_id' => 'required',
                'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'product_code' => 'required',
                'product_price' => 'required|numeric',
                'product_color' => 'required|regex:/^[\pL\s\-]+$/u',
                'product_unit' => 'required',
                
            ];

            $costumMessages = [
                'product_name.required' => 'يرجى ادخال الاسم',
                'product_name.regex' => ' الاسم لا يقبل الارقام',
                'product_code.required' => 'يرجى ادخال الرمز',
                'category_id.required' => 'يرجى ادخال القسم',
                'product_price.required' => 'يرجى ادخال السعر',
                'product_color.required' => 'يرجى ادخال الون',
                'product_color.regex' => 'تنسيق اللون غير معروف',
                'product_unit.required' => 'يرجى تحديد العدد',
            ];
            $this->validate($request,$rules,$costumMessages);
            //uoload products image after resizing image to big, mediom and small
             if($request->hasFile('product-image'))
            {
                $img_tmp = $request->file('product-image');
                if($img_tmp->isValid()){
                    //get image extention
                    $extension = $img_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 9999) . '.' . $extension;
                    $largeImagePath= 'images/front/products/large/'.$imageName;
                    $midImagePath= 'images/front/products/mediom/'.$imageName;
                    $smallImagePath= 'images/front/products/small/'.$imageName;
                    
                    
                    //upload the images
                     Image::make($img_tmp)->resize(1000,1000)->save($largeImagePath);
                     Image::make($img_tmp)->resize(500,500)->save($midImagePath);
                     Image::make($img_tmp)->resize(250,250)->save($smallImagePath);
                     $products->product_image =$imageName ;
                }
            }else {
                $products->product_image = "";
            } 

            $categoryDetails = Category::find($data['category_id']);
            $products->section_id = $categoryDetails['section_id'];
            $products->category_id = $data['category_id'];
            $products->brand_id = $data['brand_id'];

            $adminType = Auth::guard('admin')->user()->type;
            $vendor_id = Auth::guard('admin')->user()->vendor_id;
            $admin_id = Auth::guard('admin')->user()->id;

            $products->admin_type = $adminType;
            $products->admin_id = $admin_id;

            if ($adminType=="vendor") {
                $products->vendor_id = $vendor_id;
            }else {
                $products->vendor_id = 0;
            }

            $products->product_name = $data['product_name'];
            $products->product_code = $data['product_code'];
            $products->product_color = $data['product_color'];
            $products->product_price = $data['product_price'];
            $products->product_discount = $data['product_discount'];
            $products->product_weight = $data['product_weight'];
            $products->product_unit = $data['product_unit'];
            $products->discription = $data['decription'];
            $products->meta_title = $data['metatitle'];
            $products->meta_keywords = $data['metakeywords'];
            $products->meta_discription = $data['metadescription'];
            $products->product_video = $data['product_video'];
            $products->status =0;
            
            $products->save();
            return redirect('admin/products')->with('success_message',$message);
        }

        //get sections and categories
        $categories = Section::with('categories')->get()->toArray();
        //dd($categories);
        //get brands
        $brands = Brand::where('status',1)->get()->toArray();
        return view('admin.products.add_edit_product')->with(compact('title','categories','brands','products'));
    }

    public function deleteProductImage($id)
    {
        $productImage = Product::select('product_image')->where('id',$id)->first();

        $large_image_path = 'images/front/products/large/';
        $mid_image_path = 'images/front/products/mediom/';
        $small_image_path = 'images/front/products/small/';

        if(file_exists($large_image_path.$productImage->product_image)){
            unlink($large_image_path.$productImage->product_image);
        }
         if(file_exists($mid_image_path.$productImage->product_image)){
            unlink($mid_image_path.$productImage->product_image);
        }
         if(file_exists($small_image_path.$productImage->product_image)){
            unlink($small_image_path.$productImage->product_image);
        }

        Product::where('id',$id)->update(['product_image'=>'']);

        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        Product::where('id',$id)->delete();
        $message = "تم الحذف بنجاح";
        return redirect()->back()->with('success_message',$message);
    }
}
