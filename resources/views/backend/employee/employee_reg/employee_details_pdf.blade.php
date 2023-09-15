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
    <td><h2><?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100"></h2></td>
    <td>Employ Details</td>
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
    <td>{{ $details->name }}</td>
  </tr>

  <tr>
  <tr>
    <td>2</td>
    <td>Employee Id</td>
    <td>{{ $details->id_no }}</td>
  </tr>
    
  
  
  <tr>
    <td>3</td>
    <td>Fathers Name</td>
    <td>{{ $details->fname }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Mothers Name</td>
    <td>{{ $details->mname }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Birth Date</td>
    <td>{{ date('Y-m-d',strtotime($details->dob)) }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Designation</td>
    <td>{{ $details['designation']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Join Date</td>
    <td> {{ date('Y-m-d',strtotime($details->dob)) }} </td>
  </tr>
  <tr>
    <td>8</td>
    <td>Salary</td>
    <td>{{ $details->salary  }}</td>
  </tr>
 
  
</table>
<br>
<i style="font-size: 10px; float:right;">print date : {{ date("d M Y") }}</i>


<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">


</body>
</html>


