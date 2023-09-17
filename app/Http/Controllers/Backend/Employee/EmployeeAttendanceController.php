<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
     public function EmpAttendanceView(){
        $data['allData']=EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
        //$data['allData']=EmployeeAttendance::orderBy('id','desc')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view',$data);
    }
     public function EmpAttendanceAdd(){
        $data['employees']=User::where('usertype','Employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_add',$data);
    }

    public function EmpAttendanceStore(Request $request){
        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $count_employee=count($request->employee_id);
        //dd($count_employee);
        for ($i=0; $i < $count_employee; $i++) { 
            $attend_status='attend_status'.$i;

            $attend=new EmployeeAttendance();
            $attend->date=date("Y-m-d",strtotime($request->date));
            $attend->employee_id=$request->employee_id[$i];
            $attend->attend_status=$request->$attend_status;
            $attend->save();
        }
            $notification=array(
            'message'=>'Attendance Data Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('employee.attendance.view')->with($notification);
        
    }
    public function EmpAttendanceEdit($date){
        //$re=$date;dd($re);
        $data['editData']=EmployeeAttendance::where('date',$date)->get();
        $data['employees']=User::where('usertype','Employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_edit',$data);
    }
    public function EmpAttendanceDetails($date){
        $data['allData']=EmployeeAttendance::where('date',$date)->get();
        return view('backend.employee.employee_attendance.employee_attendance_details',$data);
    }
}

