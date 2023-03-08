<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BannersController extends Controller
{
    public function banners()
    {
        $banners = Banner::get()->toArray();
        // dd($banners); die;

        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Banner::where('id', $data['module_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'module_id' => $data['module_id']]);
        }
    }

    public function deleteBanner($id)
    {
        $banner_image = Banner::where('id', $id)->get()->first();
        $image_path = 'images/front/banners/';
        if (file_exists($image_path . $banner_image->image)) {
            unlink($image_path . $banner_image->image);
        }
        Banner::where('id', $id)->delete();
        $message = "تم حذف العرض بنجاح";
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditBanner(Request $request, $id = null)
    {
        Session::put('page', 'banners');
        $class = [
            ['name' => 'display_1', 'class' => '<div class="flex-shrink-1 text-center py-5">
        <div class="shop-hero-slider-animated shop-hero-slider-delay-1 display-1 font-weight-semibold mb-2">{{$banner["title"]}}</div>
        <div class="shop-hero-slider-animated shop-hero-slider-delay-2 display-4">{{$banner["alt"]}}</div>
        <button type="button" class="shop-hero-slider-animated shop-hero-slider-delay-3 btn btn-info btn-lg text-expanded mt-5">SHOP NOW</button>
       </div>'],
            ['name' => 'display_2', 'class' => ' <div class="flex-shrink-1 col-12 py-5">
        <div class="shop-hero-slider-animated shop-hero-slider-delay-1 display-2 text-info text-expanded">{{$banner["title"]}}</div>
        <div class="shop-hero-slider-animated shop-hero-slider-delay-2 display-2 text-info text-expanded">{{$banner["alt"]}}</div>
        <div class="shop-hero-slider-animated shop-hero-slider-delay-3 display-2 text-info text-expanded">{{$banner["updated_at"]}}</div>
        <button type="button" class="shop-hero-slider-animated shop-hero-slider-delay-4 btn btn-info btn-lg text-expanded mt-5">SHOP NOW</button>
        </div>'],

            ['name' => 'display_3', 'class' => ' <div class="flex-shrink-1 text-center py-5">
        <div class="shop-hero-slider-animated shop-hero-slider-delay-1 display-4 text-white text-expanded mb-4">{{$banner["title"]}}</div>
       <div class="shop-hero-slider-animated shop-hero-slider-delay-2 display-3 bg-white text-center text-body font-weight-bold text-expanded py-1 px-3 mx-auto">{{$banner["alt"]}}</div>
       <button type="button" class="shop-hero-slider-animated shop-hero-slider-delay-3 btn btn-info btn-lg text-expanded mt-5">SHOP NOW</button>
       </div>']
        ];

        if ($id == "") {
            $title = "اضافة عرض";
            $message = "تمت الاضافة بنجاح";
            $banner = new Banner;
            $banner->status = 0;
        } else {
            $title = "تعديل عرض";
            $message = "تم التعديل بنجاح";
            $banner = Banner::find($id);
            $banner->status = $banner->status;
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";print_r($data); die;
            //dd($data);

            $rules = [
                
                'banner_title' => 'required',
                'banner_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
                'banner_alt' => 'required',
                'banner_class' => 'required',

            ];

            $costumMessages = [
                'banner_title.required' => 'يرجى ادخال العنوان',
                
                'banner_alt.required' => 'يرجى ادخال الشرح',
                'banner_class.required' => 'يرجى تحديد الثيم',
            ];
            $this->validate($request, $rules, $costumMessages);

            if ($request->hasFile('banner_image')) {
                $img_tmp = $request->file('banner_image');
                if ($img_tmp->isValid()) {
                    //get image extention
                    $extension = $img_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 9999) . '.' . $extension;
                    $imagePath = 'images/front/banners/' . $imageName;

                    //upload the images
                    Image::make($img_tmp)->save($imagePath);

                    $banner->image = $imageName;
                }
            } else {
                $banner->image = $banner->image;
            }
            $banner->title = $data['banner_title'];
            $banner->alt = $data['banner_alt'];
            $banner->link = $data['banner_link'];
            $banner_img = '';
            foreach($class as $cl){
                if($data['banner_class']=$cl['name']){
                    $banner_img=$cl['class'];
                    break;
                }
            }
            $banner->class = $banner_img;
            

            $banner->save();
            return redirect('admin/banners')->with('success_message', $message);
        }
        




        // $banners = Banner::where('status',1)->get()->toArray();
        return view('admin.banners.add_edit_banner')->with(compact('title', 'banner', 'class'));
    }
}
