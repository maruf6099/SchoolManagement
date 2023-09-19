<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>A Fancy Table</h1>

@php 
$date = date('Y-m',strtotime($details['0']->date));  	 
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }
 $total_attend = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$details['0']->employee_id)->get(); 
 
 $salary = (float)$details['0']['user']['salary'];
    	 	$salary_per_day=(float)$salary/30;
            $absent_count=count($total_attend->where('attend_status','Absent'));
            $salary_minus=(float)$absent_count*(float)$salary_per_day;
    	 	$total_salary = (float)$salary-(float)$salary_minus;

@endphp 

<table id="customers">
  <tr>
    <td><h2>Yo-Yoo School</h2></td>
    <td>Employee Monthly Salary</td>
    <td><p>School Address:Khulna</p>
    <p>Email:yoo@gmail.com</p>
    <p>Phone:01568597558</p></td>
  </tr>
 
</table>
<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Name</td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>

  <tr>
  <tr>
    <td>2</td>
    <td>Id</td>
    <td>{{ $details['0']['user']['id_no'] }}</td>
  </tr>
    
  
  
  <tr>
    <td>3</td>
    <td>Basic Salary</td>
    <td>{{ $details['0']['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Absent This Month</td>
    <td>{{ $absent_count }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Total Salary</td>
    <td>{{ $total_salary }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Month</td>
    <td>{{ date('Y m', strtotime($details['0']->date)) }}</td>
  </tr> 
  
</table>
<br>
<i style="font-size: 10px; float:right;">print date : {{ date("d M Y") }}</i>


<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Employee Name</td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>

  <tr>
  <tr>
    <td>2</td>
    <td>Id</td>
    <td>{{ $details['0']['user']['id_no'] }}</td>
  </tr>
    
  
  
  <tr>
    <td>3</td>
    <td>Basic Salary</td>
    <td>{{ $details['0']['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Absent This Month</td>
    <td>{{ $absent_count }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Month</td>
    <td>{{ date('M Y', strtotime($details['0']->date)) }}</td>
  </tr>   
  <tr>
    <td>5</td>
    <td>Total Salary</td>
    <td>{{ date('M Y', strtotime($details['0']->date)) }}</td>
  </tr>   
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>


