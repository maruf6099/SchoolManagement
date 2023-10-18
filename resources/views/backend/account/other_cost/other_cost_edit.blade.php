@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others/jq.js') }}"></script>

     <div class="content-wrapper">
	  <div class="container-full">
        <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Other Cost</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('other.cost.update',$editData->id) }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">

                              
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Amount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="amount" class="form-control" required="" value="{{ $editData->amount }}">                                 
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="date" class="form-control" required="" value="{{ $editData->date }}">                                 
                                        </div>
							        </div>						
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
									    <input type="file" name="image" id="image" class="form-control" ></div>							
							        </div>						
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="controls">
									    <img id="showImage" src="{{ (!empty($editData->image)?url('upload/cost_images/'.$editData->image):url('upload/no_img.jpg')) }}" alt="Admin" class="p-1 bg-info" height="100" width="110">							
							        </div>
							
                                </div>						
                                </div>

                            </div> <!-- End Row -->   
                              
                            <div class="row">

                                <div class="col-md-12">
                                   <div class="form-group">
								<h5>Description <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="description" id="description" class="form-control" required="" placeholder="Textarea text" aria-invalid="false">
                                        {{ $editData->description }}
                                    </textarea>
								<div class="help-block"></div></div>
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