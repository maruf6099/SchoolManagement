@extends('admin.admin_master')
@section('admin')
     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Attendance</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('employee.attendance.store') }}">
						@csrf
					  <div class="row">
						<div class="col-12">                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Attendance Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="date" class="form-control" required="" >                                   
                                    </div>
							        </div>						
                                </div>                                                 							
						</div>
					  </div>
					  <div class="row">
						<div class="col-12">                           
                                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                    <th colspan="3" class="text-center" style="vertical-align: middle; width:30%;">Attendance Status</th>
                                    <tr>
                                        <th class="text-center btn present_all" style="display: table-cell;background-color: #571616;">Present</th>
                                        <th class="text-center btn leave_all" style="display: table-cell;background-color: #571616;">Leave</th>
                                        <th class="text-center btn absent_all" style="display: table-cell;background-color: #571616;">Absent</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $key=>$employee)
                                            
                                        
                                        <tr id="div{{ $employee->id }}" class="text-center">
                                            <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td colspan="3">
                                                <div class="switch-toggle swtch-3 swtch-canty">
                                                    <input type="radio" name="attend_status{{ $key }}" value="Present" id="present{{ $key }}" checked>
                                                    <label for="present{{ $key }}">Present</label>

                                                    <input type="radio" name="attend_status{{ $key }}" value="Leave" id="leave{{ $key }}" >
                                                    <label for="leave{{ $key }}">Leave</label>

                                                    <input type="radio" name="attend_status{{ $key }}" value="Absent" id="absent{{ $key }}" >
                                                    <label for="absent{{ $key }}">Absent</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                                                							
						</div>
					  </div>
						
						
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-info mb-5" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	  
	  </div>
  </div>
@endsection
 