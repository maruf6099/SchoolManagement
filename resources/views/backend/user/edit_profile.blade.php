@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others//jq.js') }}"></script>

     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Profile</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
								<h5>User Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" value="{{ $editData->name }}" required="" ></div>
								
							        </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required="" ></div>
							    </div>
                                <div class="form-group">
								<h5>User Gender <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="gender" id="gender" required="" class="form-control">
                                            <option value="" selected disabled>Select Role</option>
                                            <option value="Male" {{ $editData->gender=="Male"?"selected":"" }}>Male</option>
                                            <option value="Female" {{ $editData->gender=="Female"?"selected":"" }}>Female</option>
                                            
                                        </select>
                                    
                                    </div> 
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
								<h5>Phone Number <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="number" name="phone" class="form-control" value="{{ $editData->mobile }}" required="" ></div>
								
							        </div>
                                     <div class="form-group">
								<h5>Address <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="address" class="form-control" value="{{ $editData->address }}" required="" ></div>
								
							        </div>
                                    <div class="form-group">
                                        <h5>User Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
									    <input type="file" name="image" id="image" class="form-control" ></div>							
							        </div>
                                    <div class="form-group">
                                        
                                        <div class="controls">
									    <img id="showImage" src="{{ (!empty($editData->image)?url('upload/user_images/'.$editData->image):url('upload/no_img.jpg')) }}" alt="Admin" class="p-1 bg-info" height="100" width="110">							
							        </div>
							
                                </div>
                                
                            </div> <!-- end row -->							
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
     <script type="text/javascript">
        $(document).ready(function () {
          $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
              $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
          });
        });
    </script>
@endsection