<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class AccountSalaryController extends Controller
{
    public function AccountSalaryView(){
        $data['allData']=AccountEmployeeSalary::all();
        return view('backend.account.employee_salary.employee_salary_view',$data);
    }
    public function AccountSalaryAdd(){
        
        return view('backend.account.employee_salary.employee_salary_add');
    }
    public function AccountSalaryGetEmployee(Request $request){
        $date = date('Y-m',strtotime($request->date));
    	 //dd($date);
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }
    	 
    	 $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    	 //dd($data);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>ID No</th>';
    	 $html['thsource'] .= '<th>Employee Name</th>';
    	 $html['thsource'] .= '<th>Basic Salary</th>';
    	 $html['thsource'] .= '<th>Salary This Month</th>';
    	 
    	 $html['thsource'] .= '<th>Select</th>';


    	 foreach ($data as $key => $attend) {

			$account_salary=AccountEmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();

			if($account_salary !=null) {
				$checked = 'checked';
			}else{
				$checked = '';
			}

    	 	$total_attend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absent_count=count($total_attend->where('attend_status','Absent'));
    	 	//$color = 'success';
    	 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'">' .'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
    	 	
    	 	
    	 	$salary = (float)$attend['user']['salary'];
    	 	$salary_per_day=(float)$salary/30;
            $salary_minus=(float)$absent_count*(float)$salary_per_day;
    	 	$total_salary = (float)$salary-(float)$salary_minus;
    	 	

    	 	$html[$key]['tdsource'] .='<td>'.$total_salary.'<input type="hidden" name="amount[]" value="'.$total_salary.'">'.'</td>';

    	 	
    	 	$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" 
									value="'.$attend->employee_id.'">'.'<input type="checkbox" 
									name="checkmanage[]" id="id{{$key}}" 
									value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="id{{$key}}"> </label> '.'</td>'; 
    	 	$html[$key]['tdsource'] .= '</td>';

    	 }  
    	return response()->json(@$html);
    }

	public function AccountSalaryStore(Request $request){
		$date = date('Y-m',strtotime($request->date));

		AccountEmployeeSalary::where('date',$date)->delete();
		
		$check_data=$request->checkmanage;
		
		if ($check_data != null) {
			for ($i=0; $i <count($check_data) ; $i++) { 
				$data=new AccountEmployeeSalary();
				$data->date=$request->date;
				$data->employee_id=$request->employee_id[$check_data[$i]];
				$data->amount=$request->amount[$check_data[$i]];
				$data->save();

			}
		}
		if(!empty(@$data)||empty($check_data)){
			$notification=array(
            'message'=>'Well Dane Data Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('account.salary.view')->with($notification);
		}else{
			$notification=array(
            'message'=>'Ops.. Data Not Updated Successfully',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
		}
	}

}
