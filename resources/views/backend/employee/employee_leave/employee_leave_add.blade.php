@extends('admin.admin_master')
@section('admin')
<script src="{{ asset('backend/others/jq.js') }}"></script>

     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Employee Leave</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('employee.leave.store') }}">
						@csrf
					  <div class="row">
						<div class="col-12">                   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Employee Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="employee_id" id="" required="" class="form-control">
                                                <option value="" selected disabled>Select Employee Name</option>
                                                @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                @endforeach
									        </select>
                                    </div>
							        </div>							
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Start Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="start_date" class="form-control" required="" >                                   
                                    </div>
							        </div>						
                                </div>           							
						</div>																	
					  </div>
					  <div class="row">
						<div class="col-12">                   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Leave Purpose <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="leave_purpose_id" id="leave_purpose_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Employee Name</option>
                                                @foreach($leave_purpose as $purpose)
                                                <option value="{{ $purpose->id }}">{{ $purpose->name }}</option>
                                                @endforeach
                                                <option value="0">New Purpose</option>
									        </select>
                                            <input type="text" name="name" id="add_another" class="form-control" placeholder="Write Purpose" style="display: none;">
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>End Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="end_date" class="form-control" required="" >                                   
                                    </div>
							        </div>						
                                </div>           							
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
  <script>
    $(document).ready(function(){
        $(document).on('change','#leave_purpose_id',function(){
            var leave_purpose_id=$(this).val();
            if(leave_purpose_id=='0'){
                $('#add_another').show();
            }else{
                $('#add_another').hide();
            }
        });
    });
  </script>
@endsection