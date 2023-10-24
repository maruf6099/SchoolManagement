@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others/jq.js') }}"></script>

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

				<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Manage <strong>Employee Attendance Report</strong></h4>
				  </div>

				  <div class="box-body">
					
					<form action="{{ route('attendance.report.get') }}" method="GET" target="_blank">
						@csrf
						<div class="row">
							<div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Employee Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <select name="employee_id" id="employee_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Employee</option>
                                                @foreach($employees as $emp)
                                                <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                                @endforeach
										
									        </select>
                                    
                                    </div>
							        </div>						
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="date" class="form-control" required="" >                                  
                                    </div>
							        </div>						
                                </div>
								<div class="col-md-4" style="padding-top: 25px">
                                    <input type="submit" class="btn btn-rounded btn-primary" value="Search">
                                    						
                                </div>
						</div> <!-- End row -->




					</form>
				  </div>
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