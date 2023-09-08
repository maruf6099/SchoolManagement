<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
     public function SchoolSubjectView(){
        $data['allData']=SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',$data);
    }
    public function SchoolSubjectAdd(){
        return view('backend.setup.school_subject.add_school_subject');
    }
    public function StoreSchoolSubject(Request $request){
         $validateData=$request->validate([
            'name'=>'required|unique:school_subjects,name',
            
        ]);
        $data=new SchoolSubject();
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'exam type save Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function EditSchoolSubject($id){
        $editData=SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('editData'));
    }

    public function UpdateSchoolSubject(Request $request, $id){
        $data=SchoolSubject::find($id);
       $validateData=$request->validate([
            'name'=>'required|unique:school_subjects,name,'.$data->id
            
        ]);
        
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'Subject Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function DeleteSchoolSubject($id){
        $user=SchoolSubject::find($id);
        $user->delete();

        $notification=array(
            'message'=>'Subject Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
}
