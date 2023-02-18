<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
class BrandController extends Controller
{
    public function brands()
    {
        Session::put('page','brands');
        $brands = Brand::get()->toArray();
        // dd($sections);
        return view('admin.brands.brands')->with(compact('brands'));
    }

    public function updateBrandStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=='Active'){
                $status = 0;
            }else {
                $status = 1;
            }
            Brand::where('id',$data['module_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'module_id'=>$data['module_id']]);
        }
    }
    public function deleteBrand($id)
    {
        Brand::where('id',$id)->delete();
        $message = "تم الحذف بنجاح";
        return redirect()->back()->with('success_message',$message);
    }

    public function addBrand(Request $request)
    {
        $data = $request->all();
        $lid =Brand::all()->last()->id;
        $brand = new Brand;

        $rules = [
            'brand-name' => 'required|regex:/^[\pL\s\-]+$/u',
            
        ];

        $costumMessages = [
            'brand-name.required' => 'يرجى ادخال الاسم',
            'brand-name.regex' => ' الاسم لا يقبل الارقام',
            
        ];
        $this->validate($request,$rules,$costumMessages);
        if($request->hasFile('brand_image'))
        {
            $img_tmp = $request->file('brand_image');
            if($img_tmp->isValid()){
                //get image extention
                $extension = $img_tmp->getClientOriginalExtension();
                //generate new image name
                $imageName = rand(111, 9999) . '.' . $extension;
                $imagePath = 'images/front/brands/'.$imageName;
                
                //upload the image
                 Image::make($img_tmp)->save($imagePath);
                 $brand->brand_image =$imageName ;
            }
        }else {
            $brand->brand_image = "";
        }
       
        $brand->id =$lid+1;
        $brand->brand_name = $data['brand-name'];
        $brand->status = 0;
        $brand->save();

        return redirect()->back()->with('success_message','تم الاضافة بنجاح');
    }

    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return response()->json([
            'status'=>200,
            'brand'=>$brand,
        ]);
    }

    public function updateBrand(Request $request)
    {
        $data = $request->all();
        $current_image = Brand::where('id',$data['brand_id'])->select()->first();
        if($request->hasFile('brand_image'))
        {
            $img_tmp = $request->file('brand_image');
            if($img_tmp->isValid()){
                //get image extention
                $extension = $img_tmp->getClientOriginalExtension();
                //generate new image name
                $imageName = rand(111, 9999) . '.' . $extension;
                $imagePath = 'images/front/brands/'.$imageName;
                
                //upload the image
                 Image::make($img_tmp)->save($imagePath);
            }
        }else {
            $imageName = $current_image->brand_image;
        }
        Brand::where('id',$data['brand_id'])->update(['brand_name'=>$data['brand-name'],'brand_image'=>$imageName]);
        return redirect()->back()->with('success_message','تم التعديل بنجاح');
    }
}
