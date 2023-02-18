<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function sections()
    {
        Session::put('page','sections');
        $sections = Section::get()->toArray();
        // dd($sections);
        return view('admin.sections.sections')->with(compact('sections'));
    }

    public function updateSectionStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=='Active'){
                $status = 0;
            }else {
                $status = 1;
            }
            Section::where('id',$data['module_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'module_id'=>$data['module_id']]);
        }
    }
    public function deleteSection($id)
    {
        Section::where('id',$id)->delete();
        $message = "تم حذف القسم بنجاح";
        return redirect()->back()->with('success_message',$message);
    }

    public function addSection(Request $request)
    {
        $data = $request->all();
        $lid =Section::all()->last()->id;
        $section = new Section;

        $rules = [
            'section-name' => 'required|regex:/^[\pL\s\-]+$/u',
            
        ];

        $costumMessages = [
            'section-name.required' => 'يرجى ادخال الاسم',
            'section-name.regex' => ' الاسم لا يقبل الارقام',
            
        ];
        $this->validate($request,$rules,$costumMessages);
        $section->id =$lid+1;
        $section->name = $data['section-name'];
        $section->status = 0;
        $section->save();

        return redirect()->back()->with('success_message','تم اضافة القسم بنجاح');
    }

    public function editSection($id)
    {
        $section = Section::find($id);
        return response()->json([
            'status'=>200,
            'section'=>$section,
        ]);
    }

    public function updateSection(Request $request)
    {
        $data = $request->all();
        Section::where('id',$data['section_id'])->update(['name'=>$data['section-name']]);
        return redirect()->back()->with('success_message','تم تعديل القسم بنجاح');
    }
}
