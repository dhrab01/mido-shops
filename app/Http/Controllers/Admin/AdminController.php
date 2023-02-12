<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use Intervention\Image\Facades\Image;
class AdminController extends Controller
{
    //admin dashboard
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }


    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    //login
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);
            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'status'=>1])){
                if(Auth::guard('admin')->user()->type=="vendor"){
                    return redirect('admin/vendor-dashboard');
                }
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message', 'كلمة السر او البريد الالكتروني خاطئة');
            }
        }
        return view('admin.auth.login');
    }
    //logout
    public function logout(){
        Auth::guard('admin')->logout();
        return view('admin.auth-logout');
    }

    //update admin details
    public function updateProfile($slug ,Request $request)
    {
        if($slug=="profile"){
            if($request->isMethod('post')){
                $data = $request->all();
                //echo "<pre>"; print_r($data); die;
       
              
   
               $rules = [
                   'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                   'phone_number' => 'required|numeric',
                   'admin_email' => ['required', 'string', 'email'],
                   'admin_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024']
               ];
   
               $costumMessages = [
                   'admin_name.required' => 'يرجى ادخال الاسم',
                   'admin_name.regex' => ' الاسم لا يقبل الارقام',
                   'admin_email.required' => 'يرجى ادخال البريد الالكتروني',
                   'phone_number.required' => 'يرجى ادخال رقم الهاتف',
                   'phone_number.numric' => 'رقم الهاتف لايقبل حروف او رموز',
               ];
               $this->validate($request,$rules,$costumMessages);
   
               if($request->hasFile('admin_image'))
               {
                   $img_tmp = $request->file('admin_image');
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
   
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['phone_number'],'email'=>$data['admin_email'],'image'=>$imageName]);
               return redirect()->back()->with('success_message', 'تم تحديث البيانات الشخصية بنجاح!');
               
           }

        }else if($slug=="password"){
            if($request->isMethod('post')){
                $data =$request->all();
                // echo "<pre>"; print_r($data); die;
                if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
    
                    if($data['conform_password']==$data['new_password']){
                        Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                        return redirect()->back()->with('success_message', 'تم تغيير كلمة السر بنجاح');
                    }else {
                        return redirect()->back()->with('error_message', 'كلمة السر الجديدة والتاكيد لم تتطابق!');
                    }
                }else {
                    return redirect()->back()->with('error_message', 'كلمة المرور الحالية ليست صحيحة!');
                }
            }

        }
       $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
       return view('admin.apps-contacts-profile')->with(compact('slug','adminDetails'));

    }
    //check password
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }else {
            return "false";
        }
    }

    //admins managemnt
    public function admins($type=null)
    {
        $admins = Admin::query();
        if(!empty($type)){
            $admins = $admins->where('type',$type);
            $title = ucfirst($type)."s";
        }else {
            $title = "All Admins / Subadmins / Vendors";
        }
        $admins = $admins->get()->toArray();
        // dd($admins);
        return view('admin.admin-managment.admins')->with(compact('admins','title'));
    }

    //show vendor details
    public function viewVendorDetails($id){
        $vendorDetails = Admin::with('vendorPersonal', 'vendorBusiness', 'vendorBank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails), true);
        // dd($vendorDetails);
         return view('admin.admin-managment.view-vendor-details')->with(compact('vendorDetails'));

    }

    //update admin status
    public function updateAdminStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=='Active'){
                $status = 0;
            }else {
                $status = 1;
            }
            Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }
    // public function deleteAdmin($id)
    // {
    //     $type = Admin::where('id',$id)->type;
    //     echo "<pre>"; print_r($type); die;

    //      Admin::where('id',$id)->delete();
    //      $message = "تم حذف القسم بنجاح";
    //     return redirect()->back()->with('success_message',$message);
    // }
}
