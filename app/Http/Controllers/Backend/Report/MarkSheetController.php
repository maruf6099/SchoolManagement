<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\MarksGrade;
use App\Models\StudentClass;
use App\Models\StudentMark;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarkSheetController extends Controller
{
    // public function MarkSheetView(){
    //     $data['years']=StudentYear::orderBy('id','desc')->get();
    //     $data['classes']=StudentClass::all();
    //     $data['exam_type']=ExamType::all();

    //     return view('backend.report.marksheet.marksheet_view',$data);
    // }
    // public function MarkSheetGet(Request $request){
    //     $year_id=$request->year_id;
    //     $class_id=$request->class_id;
    //     $exam_type_id=$request->exam_type_id;
    //     $id_no=$request->id_no;

    //     $count_fail=StudentMark::where('year_id',$year_id)
    //                             ->where('class_id',$class_id)
    //                             ->where('exam_type_id',$exam_type_id)
    //                             ->where('id_no',$id_no)
    //                             ->where('marks','<','33')->get()->count();

    //     //dd($count_fail); 
    //     $single_student =StudentMark::where('year_id',$year_id)
    //                             ->where('class_id',$class_id)
    //                             ->where('exam_type_id',$exam_type_id)
    //                             ->where('id_no',$id_no)->first();
                                
    //     if($single_student==true){
    //         $allMarks=StudentMark::with(['assign_subject','year'])->where('year_id',$year_id)
    //                             ->where('class_id',$class_id)
    //                             ->where('exam_type_id',$exam_type_id)
    //                             ->where('id_no',$id_no)->get();

    //     //dd($allMarks->toArray());
    //     $allGrades=MarksGrade::all();
    //     return view('backend.report.marksheet.marksheet_pdf',compact('allMarks','allGrades','count_fail'));

    //     }else{
    //         $notification=array(
    //         'message'=>'Sorry these criteria Does not Match',
    //         'alert-type'=>'error'
    //     );
    //     return redirect()->back()->with($notification);
    //     }
    // }

     public function MarkSheetView(){

    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::all();
    	$data['exam_type'] = ExamType::all();
    	return view('backend.report.marksheet.marksheet_view',$data);

    }


    public function MarkSheetGet(Request $request){

    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;
    	$id_no = $request->id_no;

    $count_fail = StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
    	// dd($count_fail);
    $singleStudent = StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();
    if ($singleStudent == true) {
    
    $allMarks = StudentMark::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
    	// dd($allMarks->toArray());
    $allGrades = MarksGrade::all();
    return view('backend.report.marksheet.marksheet_pdf',compact('allMarks','allGrades','count_fail'));

    }else{

    	$notification = array(
    		'message' => 'Sorry These Criteria Donse not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
       }


    } // end Method 

}
