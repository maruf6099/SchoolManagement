@extends('admin.admin_master')
@section('admin')
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
					<h4 class="box-title">Student <strong>Search</strong></h4>
				  </div>

				  <div class="box-body">
					
					<form action="{{ route('student.year.class.wise') }}" method="GET">
						@csrf
						<div class="row">
							<div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <select name="year_id" id="year" required="" class="form-control">
                                                <option value="" selected disabled>Select Year</option>
                                                @foreach($years as $year)
                                                <option value="{{ $year->id }}" {{ (@$year_id==$year->id)?"selected":"" }}>{{ $year->name }}</option>
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
                                                <option value="{{ $class->id }}" {{ (@$class_id==$class->id)?"selected":"" }}>{{ $class->name }}</option>
                                                @endforeach <!-- @=isset -->
									        </select>                                 
                                    </div>
							        </div>						
                                </div>
								<div class="col-md-4" style="padding-top: 25px">
                                    <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">						
                                </div>
						</div> <!-- End row -->
					</form>
				  </div>
				</div>

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student List</h3>
                  <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Student</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					{{-- @if('!@search') --}}@if(!@$search)
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								
								<th>Student Name</th>
								<th>Student Id</th>
								<th>Roll</th>
								<th>Year</th>
								<th>Class</th>
								<th>Image</th>
								@if(Auth::user()->role=="Admin")
								<th>code</th>
								@endif
								<th width="25%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key=>$value)    
                            
							<tr>
								<td>{{ $key+1 }}</td>
								
								<td>{{ $value['student']['name'] }}</td>
								<td>{{ $value['student']['id_no'] }}</td>
								<td>{{ $value['student']['roll'] }}</td>
								<td>{{ $value['student_year']['name'] }}</td>
								<td>{{ $value['student_class']['name'] }}</td>
								<td>
									 <img id="" src="{{ (!empty($value['student']['image'])?url('upload/student_images/'.$value['student']['image']):url('upload/no_img.jpg')) }}" alt="Admin" class="p-1 bg-info" height="50" width="50">
								</td>
								<td>{{ $value['student']['code'] }}</td>
								
								<td>
                                    <a href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('student.registration.promotion',$value->student_id) }}" class="btn btn-danger" id="delete">Promotion</a>
                                </td>
								
							</tr> 
                            @endforeach
						</tbody>
						
					  </table>
				@else
				<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								
								<th>Student Name</th>
								<th>Student Id</th>
								<th>Roll</th>
								<th>Year</th>
								<th>Class</th>
								<th>Image</th>
								@if(Auth::user()->role=="Admin")
								<th>Year</th>
								@endif
								<th width="25%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key=>$value)    
                            
							<tr>
								<td>{{ $key+1 }}</td>
								
								<td>{{ $value['student']['name'] }}</td>
								<td>{{ $value['student']['id_no'] }}</td>
								<td>{{ $value['student']['roll'] }}</td>
								<td>{{ $value['student_year']['name'] }}</td>
								<td>{{ $value['student_class']['name'] }}</td>
								<td>
									 <img id="" src="{{ (!empty($value['student']['image'])?url('upload/student_images/'.$value['student']['image']):url('upload/no_img.jpg')) }}" alt="Admin" class="p-1 bg-info" height="50" width="50">
								</td>
								<td>{{ $value['student_class']['name'] }}</td>
								
								<td>
                                    <a href="{{ route('edit.student.year',$value->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('delete.student.year',$value->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
								
							</tr> 
                            @endforeach
						</tbody>
						
					  </table>
				@endif
					</div>
				</div>
				<!-- /.box-body -->
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