<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function StudentFeeView(){
        $data['allData']=AccountStudentFee::all();
        return view('backend.account.student_fee.student_fee_view',$data);
    }
    public function StudentFeeAdd(){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['fee_categories']=FeeCategory::all();
        return view('backend.account.student_fee.student_fee_add',$data);
    }
    public function StudentFeeGetStudent(){
        
    }
    public function StudentFeeStore(){

    }
}
