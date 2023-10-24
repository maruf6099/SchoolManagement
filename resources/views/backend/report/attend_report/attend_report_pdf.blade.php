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
    <td>Employee Attendance Report</td>
    <td><p>School Address:Khulna</p>
    <p>Email:yoo@gmail.com</p>
    <p>Phone:01568597558</p></td>
  </tr>
 
</table>
<br>
<br>
<strong>Employee Name :</strong>{{ $allData['0']['user']['name'] }} 
<strong>ID NO:</strong>{{ $allData['0']['user']['id_no'] }}
<strong>Month: </strong>{{ $month }}

<table id="customers">
  
  <tr>
    <td width="50%">Date</td>
    <td width="50%">Attend Status</td>
  </tr>
  @foreach ($allData as $value)
    <tr>
    <td width="50%">{{ date('d-m-Y',strtotime($value->date)) }}</td>
    <td width="50%">{{ $value->attend_status }}</td>
  </tr>
  @endforeach

  <tr>
    <td colspan="2">
        <strong>Total Present :</strong>{{ $present }}
        <strong>Total Absent :</strong>{{ $absents }}
        <strong>Total Leave :</strong>{{ $leaves }}
    </td>
  </tr>
</table>
<br>
<i style="font-size: 10px; float:right;">print date : {{ date("d M Y") }}</i>


<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">


<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>


