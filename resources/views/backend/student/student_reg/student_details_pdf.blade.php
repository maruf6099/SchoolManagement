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
    <td>2</td>
    <td>Student Id</td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
  <tr>
    <td>3</td>
    <td>Student Roll</td>
    <td>{{ $details->roll }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Student Father's Name</td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Student Mother's Name</td>
    <td>{{ $details['student']['mname'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Date of birth</td>
    <td>{{ $details['student']['dob'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Phone Number</td>
    <td>{{ $details['student']['mobile'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Student Address</td>
    <td>{{ $details['student']['address'] }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Gender</td>
    <td>{{ $details['student']['gender'] }}</td>
  </tr>
  <tr>
    <td>10</td>
    <td>Year</td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>11</td>
    <td>Class</td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>12</td>
    <td>Group</td>
    <td>{{ $details['group']['name'] }}</td>
  </tr>
  <tr>
    <td>13</td>
    <td>Shift</td>
    <td>{{ $details['shift']['name'] }}</td>
  </tr>
  <tr>
    <td>14</td>
    <td>Discount</td>
    <td>{{ $details['discount']['discount'] }}</td>
  </tr>
  
</table>
<br>
<i style="font-size: 10px; float:right;">print date : {{ date("d M Y") }}</i>

</body>
</html>


