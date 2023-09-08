<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ExamTypeView(){
        $data['allData']=ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    }
    public function AddExamType(){
        return view('backend.setup.exam_type.add_exam_type');
    }
    public function StoreExamType(Request $request){
         $validateData=$request->validate([
            'name'=>'required|unique:exam_types,name',
            
        ]);
        $data=new ExamType();
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'exam type save Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function EditExamType($id){
        $editData=ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('editData'));
    }

    public function UpdateExamType(Request $request, $id){
        $data=ExamType::find($id);
       $validateData=$request->validate([
            'name'=>'required|unique:exam_types,name,'.$data->id
            
        ]);
        
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'Student Shift Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function DeleteExamType($id){
        $user=ExamType::find($id);
        $user->delete();

        $notification=array(
            'message'=>'Exam Type Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
}
