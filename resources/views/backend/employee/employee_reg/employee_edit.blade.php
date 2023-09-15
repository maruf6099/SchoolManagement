@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others/jq.js') }}"></script>

     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Employee</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('employee.registration.update',$editData->id) }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">

                            
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Employee Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}" >                          
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="fname" class="form-control" required="" value="{{ $editData->fname }}">
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="mname" class="form-control" required="" value="{{ $editData->mname }}">                                  
                                    </div>
							        </div>						
                                </div>

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Phone Number <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="phone" class="form-control" required="" value="{{ $editData->mobile }}">
                                    
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="address" class="form-control" required="" value="{{ $editData->address }}">                                 
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="gender" required="" class="form-control">
                                                <option value="" selected disabled>Select gender</option>
                                                <option value="Male" {{ ($editData->gender=='Male')?"selected":"" }}>Male</option>
                                                <option value="Female" {{ ($editData->gender=='Female')?"selected":"" }}>Female</option>
										
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
                                                <option value="Muslim" {{ ($editData->religion=='Muslim')?"selected":"" }}>Muslim</option>
                                                <option value="Hindu" {{ ($editData->religion=='Hindu')?"selected":"" }}>Hindu</option>
                                                <option value="Chirstan" {{ ($editData->religion=='Chirstan')?"selected":"" }}>Chirstan</option>
										
									        </select>
                                    
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="dob" class="form-control" required="" value="{{ $editData->dob }}">                                 
                                        </div>
							        </div>						
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Designation <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <select name="designation_id" id="" required="" class="form-control">
                                                <option value="" selected disabled>Select Designation</option>
                                                @foreach($designation as $desig)
                                                <option value="{{ $desig->id }}" {{ ($editData->designation_id==$desig->id)?"selected":"" }}>{{ $desig->name }}</option>
                                                @endforeach
										
									        </select>
                                    
                                    </div>
							        </div>						
                                </div>

                            </div> <!-- End Row -->    
                            <div class="row">
                                @if (!$editData)
                                    
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Salary <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="salary" class="form-control" required="" value="{{ $editData->salary }}">                                 
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Join Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="join_date" class="form-control" required="" value="{{ $editData->join_date }}">                                 
                                        </div>
							        </div>						
                                </div>
                                @endif
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Employee Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
									    <input type="file" name="image" id="image" class="form-control" ></div>							
							        </div>						
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="controls">
									    <img id="showImage" src="{{ (!empty($editData->image)?url('upload/employee_images/'.$editData->image):url('upload/no_img.jpg')) }}" alt="Admin" class="p-1 bg-info" height="100" width="110">							
							        </div>
							
                                </div>						
                                </div>

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-4">
                                   						
                                </div>
                                <div class="col-md-4">
                                    
                                    						
                                </div>
                                <div class="col-md-4">
                                    					
                                </div>

                            </div> <!-- End Row -->    

                               

                   
							
						</div>
						
							
							
					  </div>
						
						
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-info mb-5" value="Update Data">
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