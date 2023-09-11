@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others/jq.js') }}"></script>

     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Student</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('student.registration.store') }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">

                            
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="name" class="form-control" required="" >
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Father's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="fname" class="form-control" required="" >
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="mname" class="form-control" required="" >                                  
                                    </div>
							        </div>						
                                </div>

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Phone Number <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="phone" class="form-control" required="" >
                                    
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="address" class="form-control" required="" >                                 
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="gender" required="" class="form-control">
                                                <option value="" selected disabled>Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
										
									        </select>
                                    </div>
							        </div>						
                                </div>

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <select name="religion" id="religion" required="" class="form-control">
                                                <option value="" selected disabled>Select religion</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Chirstan">Chirstan</option>
										
									        </select>
                                    
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="dob" class="form-control" required="" >                                 
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Discount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" class="form-control" required="" > 
                                        </div>
							        </div>						
                                </div>

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <select name="year_id" id="year" required="" class="form-control">
                                                <option value="" selected disabled>Select Year</option>
                                                @foreach($years as $year)
                                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
										
									        </select>
                                    
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Class<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="class" required="" class="form-control">
                                                <option value="" selected disabled>Select Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
									        </select>                                 
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Group <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="group_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Group</option>
                                                @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
									        </select> 
                                        </div>
							        </div>						
                                </div>

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Shift <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <select name="shift_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Year</option>
                                                @foreach($shifts as $shift)
                                                <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                                @endforeach
										
									        </select>
                                    
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>User Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
									    <input type="file" name="image" id="image" class="form-control" ></div>							
							        </div>
                                    						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        
                                        <div class="controls">
									    <img id="showImage" src="{{ (!empty($editData->image)?url('upload/user_images/'.$editData->image):url('upload/no_img.jpg')) }}" alt="Admin" class="p-1 bg-info" height="100" width="110">							
							        </div>
							
                                </div>					
                                </div>

                            </div> <!-- End Row -->    

                               

                   
							
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