@extends('admin.admin_master')
@section('admin')
     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Change Password</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('password.update') }}">
						@csrf
					  <div class="row">
						<div class="col-12">
                            
                            {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="email" name="email" class="form-control" required="" ></div>
							        </div>	
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="password" name="old_password" id="current_password" class="form-control" required="" >
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
							        </div>						
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="password" name="password" id="password" class="form-control" required="" >
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
							        </div>						
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="" >
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
@endsection