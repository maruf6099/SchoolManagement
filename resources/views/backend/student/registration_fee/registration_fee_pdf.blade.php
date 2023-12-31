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
$registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();
$originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;

@endphp 

<table id="customers">
  <tr>
    <td><h2>Yo-Yoo School</h2></td>
    <td>Student Details</td>
    <td><p>School Address:Khulna</p>
    <p>Email:yoo@gmail.com</p>
    <p>Phone:01568597558</p></td>
  </tr>
 
</table>
<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Student Name</td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

  <tr>
  <tr>
    <td>2</td>
    <td>Student Roll</td>
    <td>{{ $details->roll }}</td>
  </tr>
    
  
  
  <tr>
    <td>3</td>
    <td>Year</td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Class</td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Group</td>
    <td>{{ $details['group']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Shift</td>
    <td>{{ $details['shift']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Discount fee</td>
    <td>{{ $details['discount']['discount'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Registration Fee</td>
    <td>{{ $originalfee }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>For this student Fee</td>
    <td>{{ $finalfee }}</td>
  </tr>
  
</table>
<br>
<i style="font-size: 10px; float:right;">print date : {{ date("d M Y") }}</i>


<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $details->roll }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class </b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Registration Fee</b></td>
    <td>{{ $originalfee }} $</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Fee </b></td>
    <td>{{ $discount  }} %</td>
  </tr>

    <tr>
    <td>9</td>
    <td><b>Fee For this Student </b></td>
    <td>{{ $finalfee }} $</td>
  </tr>
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>


