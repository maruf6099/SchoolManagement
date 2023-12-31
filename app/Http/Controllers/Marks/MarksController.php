<?php

namespace App\Http\Controllers\Marks;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMark;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function MarksAdd(){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['exam_type']=ExamType::all();

        return view('backend.marks.marks_add',$data);
    }
    public function MarkStore(Request $request){
        $studentCount =$request->student_id;
        if($studentCount){
            for ($i=0; $i < count($request->student_id); $i++) { 
                $data=new StudentMark();
                $data->year_id= $request->year_id;
                $data->class_id= $request->year_id;
                $data->assign_subject_id= $request->assign_subject_id;
                $data->exam_type_id= $request->exam_type_id;
                $data->student_id= $request->student_id[$i];
                $data->id_no= $request->id_no[$i];
                $data->marks= $request->marks[$i];
                $data->save();
            }
        }
        $notification=array(
            'message'=>'Student Marks Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function MarksEdit(){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['exam_type']=ExamType::all();

        return view('backend.marks.marks_edit',$data);
    }
    public function MarksGetStudents(Request $request){
        $year_id=$request->year_id;
        $class_id=$request->class_id;
        $assign_subject_id=$request->assign_subject_id;
        $exam_type_id=$request->exam_type_id;

        $getStudent=StudentMark::with(['student'])->where('year_id',$year_id)
                                ->where('class_id',$class_id)
                                ->where('assign_subject_id',$assign_subject_id)
                                ->where('exam_type_id',$exam_type_id)->get();
         return response()->json($getStudent);                       
    }
    
    public function MarksUpdate(Request $request){
        StudentMark::where('year_id',$request->year_id)
                                ->where('class_id',$request->class_id)
                                ->where('assign_subject_id',$request->assign_subject_id)
                                ->where('exam_type_id',$request->exam_type_id)
                                ->delete();
                                
        $studentCount =$request->student_id;
        if($studentCount){
            for ($i=0; $i < count($request->student_id); $i++) { 
                $data=new StudentMark();
                $data->year_id= $request->year_id;
                $data->class_id= $request->year_id;
                $data->assign_subject_id= $request->assign_subject_id;
                $data->exam_type_id= $request->exam_type_id;
                $data->student_id= $request->student_id[$i];
                $data->id_no= $request->id_no[$i];
                $data->marks= $request->marks[$i];
                $data->save();
            }
        }
        $notification=array(
            'message'=>'Student Marks Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
