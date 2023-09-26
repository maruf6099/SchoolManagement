@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others/jq.js') }}"></script>

     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Grade Mark</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('marks.grade.update',$editData->id) }}">
						@csrf
					  <div class="row">
						<div class="col-12">

                            
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Grade Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="grade_name" class="form-control" value="{{ $editData->grade_name }}" required="" >                          
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Grade Point<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="grade_point" class="form-control" value="{{ $editData->grade_point }}" required="" >
                                    </div>
							        </div>						
                                </div>
                                

                            </div> <!-- End Row -->    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Start Marks<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="start_marks" class="form-control" value="{{ $editData->start_marks }}" required="" >                                  
                                    </div>
							        </div>						
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>End Marks<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="end_marks" class="form-control" value="{{ $editData->end_marks }}" required="" >
                                    
                                        </div>
							        </div>						
                                </div>
                                

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Start point <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="start_point" class="form-control" value="{{ $editData->start_point }}" required="" >                                 
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <h5>End Point<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="end_point" class="form-control" value="{{ $editData->end_point }}" required="" >
                                    
                                        </div>
							        </div>							
                                </div>
                        

                            </div> <!-- End Row -->    
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Remarks<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="remarks" class="form-control" value="{{ $editData->remarks }}" required="" >
                                    
                                        </div>
							        </div>						
                                </div>
                                

                            </div> <!-- End Row -->    

							
						</div>
						
							
							
					  </div>
						
						
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-info mb-5" value="Update">
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