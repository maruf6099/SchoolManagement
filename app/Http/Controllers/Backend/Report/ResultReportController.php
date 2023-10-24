<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMark;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class ResultReportController extends Controller
{
    public function ResultView(){
        $data['years']=StudentYear::orderBy('id','desc')->get();
        $data['classes']=StudentClass::all();
        $data['exam_type']=ExamType::all();

        return view('backend.report.student_result.student_result_view',$data);
    }
    public function ResultGet(Request $request){
        $year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;

    	$singleResult = StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();

    if ($singleResult == true) {
    	$data['allData'] = StudentMark::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
    	//dd($data['allData']->toArray());

    $pdf = PDF::loadView('backend.report.student_result.student_result_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }else{
    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
      }
    }

    public function IdCardView(){
        $data['years']=StudentYear::orderBy('id','desc')->get();
        $data['classes']=StudentClass::all();

        return view('backend.report.id_card.id_card_view',$data);
    }
    public function IdCardGet(Request $request){
        $year_id = $request->year_id;
    	$class_id = $request->class_id;

        $check_data=AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();
        if($check_data == true){
            $data['allData']=AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get(); 
            //dd($data['allData']->toArray()); 
            $pdf = PDF::loadView('backend.report.id_card.id_card_pdf', $data);
	        $pdf->SetProtection(['copy', 'print'], '', 'pass');
	        return $pdf->stream('document.pdf');  
        }else{
    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
      }
    }
}
