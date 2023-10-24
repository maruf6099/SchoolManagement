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
					<h4 class="box-title">Manage <strong>MarkSheet Generate</strong></h4>
				  </div>

				  <div class="box-body">
					
					<form action="{{ route('mark.sheet.get') }}" method="GET" target="_blank">
						@csrf
						<div class="row">
							<div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <select name="year_id" id="year_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Year</option>
                                                @foreach($years as $year)
                                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
										
									        </select>
                                    
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Class<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach <!-- @=isset -->
									        </select>                                 
                                    </div>
							        </div>						
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Exam Type<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="exam_type_id" id="exam_type_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Type</option>
                                                @foreach($exam_type as $exm)
                                                <option value="{{ $exm->id }}">{{ $exm->name }}</option>
                                                @endforeach <!-- @=isset -->
									        </select>                                  
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Id No<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="text" name="id_no" class="form-control" required="" >                                  
                                    </div>
							        </div>						
                                </div>
								<div class="col-md-3" style="padding-top: 25px">
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