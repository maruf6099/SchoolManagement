@extends('admin.admin_master')
@section('admin')
     <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee Salary Details</h3>

                  <h5><strong>Employee Name </strong>{{ $details->name }}</h5>
                  <h5><strong>Employee Id No </strong>{{ $details->id_no }}</h5>
            
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>previous Salary</th>
								<th>Increment Salary</th>
								<th>Present Salary</th>
								<th>Effected date</th>
								
                               
								
							
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($salary_log as $key=>$value)    
                            
							<tr>
								<td>{{ $key+1 }}</td>
								
								<td>{{ $value->previous_salary }}</td>
								<td>{{ $value->increment_salary }}</td>
								<td>{{ $value->present_salary }}</td>
								<td>{{ $value->effected_salary }}</td>
								{{-- <td>{{ date('d-m-Y',strtotime($value->join_date)) }}</td>
								<td>{{ $value->salary }}</td> --}}
								
								
							</tr> 
                            @endforeach
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
@endsection