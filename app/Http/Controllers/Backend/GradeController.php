<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function GradeView(){
        $data['allData']=MarksGrade::all();
        return view('backend.marks.grade_marks_view',$data);
    }
    public function GradeAdd(){
        
        return view('backend.marks.grade_marks_add');
    }
    public function GradeStore(Request $request){
        $data=new MarksGrade();
        $data->grade_name=$request->grade_name;
        $data->grade_point=$request->grade_point;
        $data->start_marks=$request->start_marks;
        $data->end_marks=$request->end_marks;
        $data->start_point=$request->start_point;
        $data->end_point=$request->end_point;
        $data->remarks=$request->remarks;
        $data->save();

        $notification=array(
            'message'=>'Grade Marks Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('marks.grade.view')->with($notification);
    }
    public function GradeEdit($id){
        $data['editData']=MarksGrade::find($id);
        return view('backend.marks.grade_marks_edit',$data);
    }
    public function GradeUpdate(Request $request,$id){
        $data=MarksGrade::find($id);
        $data->grade_name=$request->grade_name;
        $data->grade_point=$request->grade_point;
        $data->start_marks=$request->start_marks;
        $data->end_marks=$request->end_marks;
        $data->start_point=$request->start_point;
        $data->end_point=$request->end_point;
        $data->remarks=$request->remarks;
        $data->save();

        $notification=array(
            'message'=>'Grade Marks Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('marks.grade.view')->with($notification);
    }
    public function GradeDelete($id){
        $data=MarksGrade::find($id);
        $data->delete();
        $notification=array(
            'message'=>'Grade Marks Delete Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('marks.grade.view')->with($notification);
    }
}
