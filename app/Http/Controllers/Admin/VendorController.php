<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinissDetail;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class VendorController extends Controller
{
    public function dashboard(){
        return view('admin.vendors.vendor-dashboard');
    }

    public function updateVendorDetails($slug, Request $request){
        if($slug=="personal"){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;

                
            $rules = [
                'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'phone_number' => 'required|numeric',
                'vendor_email' => ['required', 'string', 'email'],
                'vendor_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024']
            ];

            $costumMessages = [
                'vendor_name.required' => 'يرجى ادخال الاسم',
                'vendor_name.regex' => ' الاسم لا يقبل الارقام',
                'vendor_email.required' => 'يرجى ادخال البريد الالكتروني',
                'phone_number.required' => 'يرجى ادخال رقم الهاتف',
                'phone_number.numric' => 'رقم الهاتف لايقبل حروف او رموز',
            ];
            $this->validate($request,$rules,$costumMessages);

            if($request->hasFile('vendor_image'))
            {
                $img_tmp = $request->file('vendor_image');
                if($img_tmp->isValid()){
                    //get image extention
                    $extension = $img_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 9999) . '.' . $extension;
                    $imagePath = 'images/photos/'.$imageName;
                    
                    //upload the image
                     Image::make($img_tmp)->save($imagePath);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else {
                $imageName = "";
            }
            //update in admins table
             Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['phone_number'],'email'=>$data['vendor_email'],'image'=>$imageName]);
             //update in vendor table
             Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update(['address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode']]);
             return redirect()->back()->with('success_message', 'تم تحديث البيانات الشخصية بنجاح!');
            }
            $vedorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }else if($slug=="business"){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;

                
            $rules = [
                'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'phone_number' => 'required|numeric',
                'shop_email' => ['required', 'string', 'email'],
                'address_proof_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024']
            ];

            $costumMessages = [
                'shop_name.required' => 'يرجى ادخال الاسم',
                'shop_name.regex' => ' الاسم لا يقبل الارقام',
                'shop_email.required' => 'يرجى ادخال البريد الالكتروني',
                'phone_number.required' => 'يرجى ادخال رقم الهاتف',
                'phone_number.numric' => 'رقم الهاتف لايقبل حروف او رموز',
            ];
            $this->validate($request,$rules,$costumMessages);

            if($request->hasFile('address_proof_image'))
            {
                $img_tmp = $request->file('address_proof_image');
                if($img_tmp->isValid()){
                    //get image extention
                    $extension = $img_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 9999) . '.' . $extension;
                    $imagePath = 'images/proofs/'.$imageName;
                    
                    //upload the image
                     Image::make($img_tmp)->save($imagePath);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else {
                $imageName = "";
            }
            DB::table('vendor_business_details')
              ->where('vendor_id', Auth::guard('admin')->user()->vendor_id)
              ->update(['shop_name' => $data['shop_name'],'shop_address'=>$data['shop_address'],'shop_city'=>$data['shop_city'],
                        'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],
                        'shop_mobile'=>$data['phone_number'],'shop_email'=>$data['shop_email'],'address_proof'=>$data['shop_address_proof'],
                        'address_proof_image'=>$imageName,'business_license_number'=>$data['business_license_number'],'gst_number'=>$data['gst_number'],'pan_number'=>$data['pan_number']]);
            
            return redirect()->back()->with('success_message', 'تم تحديث بيانات المتجر بنجاح!');
         }
            
            $vedorDetails = DB::table('vendor_business_details')->where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first();

        }else if($slug=="bank"){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;

                
            $rules = [
                'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'bank_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'account_number' => 'required|numeric',
                'bank_ifsc_code' => 'required|numeric',
            ];

            $costumMessages = [
                'account_holder_name.required' => 'يرجى ادخال اسم مالك الحساب',
                'account_holder_name.regex' => ' الاسم لا يقبل الارقام',
                'bank_name.required' => 'يرجى ادخال اسم البنك',
                'bank_name.regex' => ' الاسم لا يقبل الارقام',
                'account_number.required' => 'يرجى ادخال رقم الحساب',
                'account_number.numric' => 'رقم الحساب لايقبل حروف او رموز',
                'bank_ifsc_code.required' => 'يرجى ادخال الرقم الثانوي',
                'bank_ifsc_code.numric' => 'الرقم الثانوي لايقبل حروف او رموز',
            ];
            $this->validate($request,$rules,$costumMessages);

           
            DB::table('vendors_bank_detials')
              ->where('vendor_id', Auth::guard('admin')->user()->vendor_id)
              ->update(['account_holder_name' => $data['account_holder_name'],'bank_name'=>$data['bank_name'],'account_number'=>$data['account_number'],
                        'bank_ifsc_code'=>$data['bank_ifsc_code']]);
            
            return redirect()->back()->with('success_message', 'تم تحديث بيانات البنك بنجاح!');
        }
            $vedorDetails = DB::table('vendors_bank_detials')->where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first();

        }
        return view('admin.vendors.settings.update-vendor-details')->with(compact('slug', 'vedorDetails'));
    }
}
