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

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Assign Subject Details</h3>
                  <a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Subject</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
<h4><strong>Assign Subject :</strong>{{ $detailsData['0']['student_class']['name'] }}</h4>
					<div class="table-responsive">
					  <table id="" class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
								<th width="5%">Sl</th>
								
								<th>Subject</th>
								<th>Full Marks</th>
								<th>Subjective Mark</th>
								<th>Pass Mark</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($detailsData as $key=>$details)    
                            
							<tr>
								<td>{{ $key+1 }}</td>
								
								<td>{{ $details['school_subject']['name'] }}</td>
								
								<td>{{ $details->full_mark }}</td>
								<td>{{ $details->subjective_mark }}</td>
								<td>{{ $details->pass_mark }}</td>
                                
								
							</tr> 
                            @endforeach
						</tbody>
						
					  </table>
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