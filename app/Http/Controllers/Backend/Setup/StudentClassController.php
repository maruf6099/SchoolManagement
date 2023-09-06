<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewStudent(){
        $data['allData']=StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }
    public function StudentClassAdd(){
        return view('backend.setup.student_class.add_class');
    }
    public function StoreStudentClass(Request $request){
         $validateData=$request->validate([
            'name'=>'required|unique:student_classes,name',
            
        ]);
        $data=new StudentClass();
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'Class Saved Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function EditStudentClass($id){
        $editData=StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('editData'));
    }

    public function UpdateStudentClass(Request $request, $id){
        $data=StudentClass::find($id);
       $validateData=$request->validate([
            'name'=>'required|unique:student_classes,name,'.$data->id
            
        ]);
        
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'Class Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function DeleteStudentClass($id){
        $user=StudentClass::find($id);
        $user->delete();

        $notification=array(
            'message'=>'Class Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
}
