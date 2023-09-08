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
				  <h3 class="box-title">Fee amount Details</h3>
                  <a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Fee Amount</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
<h4><strong>Fee Category :</strong>{{ $detailsData['0']['fee_category']['name'] }}</h4>
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
								<th width="5%">Sl</th>
								
								<th>Class Name</th>
								
								<th width="25%">Amount</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($detailsData as $key=>$details)    
                            
							<tr>
								<td>{{ $key+1 }}</td>
								
								<td>{{ $details['student_class']['name'] }}</td>
								
								<td>{{ $details->amount }}</td>
                                
								
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