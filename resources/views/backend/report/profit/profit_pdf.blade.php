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
 
 $student_fee=App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
    	$other_cost=App\Models\AccountOtherCost::whereBetween('date',[$s_date,$e_date])->sum('amount');
    	$emp_salary=App\Models\AccountEmployeeSalary::whereBetween('date',[$start_date,$start_date])->sum('amount');
		

		$total_cost=$other_cost+$emp_salary;
		$profit=$student_fee-$total_cost;

@endphp 

<table id="customers">
  <tr>
    <td><h2>Yo-Yoo School</h2></td>
    <td>Monthly/Yearly Profit</td>
    <td><p>School Address:Khulna</p>
    <p>Email:yoo@gmail.com</p>
    <p>Phone:01568597558</p></td>
  </tr>
 
</table>
<table id="customers">
  <tr>
    <td colspan="2" style="text-align: center;">
        <h4>Reporting Date: {{ date('Y m', strtotime($start_date)) }}-{{ date('Y m', strtotime($end_date)) }}</h4>
    </td>   
  </tr>
  <tr>
    <td style="width: 50%"><h4>Purpose</h4></td>
    <td style="width: 50%"><h4>Amount</h4></td>
    
  </tr>
  <tr>
    <td>Student Fee</td>
    <td>{{ $student_fee }}</td>
    
  </tr>
    
  
  
  <tr>
    <td>Employee Salary</td>
    <td>{{ $emp_salary }}</td>
    
  </tr>
  <tr>
    <td>Other Cost</td>
    <td>{{ $other_cost }}</td>
    
  </tr>
  <tr>
    <td>Total Cost</td>
    <td>{{ $total_cost }}</td>
    
  </tr>
  <tr>
    <td>Profit</td>
    <td>{{ $profit }}</td>
   
  </tr> 
  
</table>
<br>
<i style="font-size: 10px; float:right;">print date : {{ date("d M Y") }}</i>


<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>


