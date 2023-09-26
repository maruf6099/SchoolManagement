@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others/jq.js') }}"></script>
<script src="{{ asset('backend/others/handlebars.min.js') }}"></script>

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
					<h4 class="box-title">Add <strong>Student fee</strong></h4>
				  </div>

				  <div class="box-body">
					
					
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
                                        <h5>Fee Category<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="fee_category_id" id="fee_category_id" required="" class="form-control">
                                                <option value="" selected disabled>Select Fee Category</option>
                                                @foreach($fee_categories as $fee)
                                                <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                @endforeach <!-- @=isset -->
									        </select>                                  
                                    </div>
							        </div>						
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <h5>Attendance Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="date" name="date" class="form-control" required="" >                                   
                                    </div>					
                                    </div>
								
                                </div>
						</div> <!-- End row -->
                        <div class="col-md-3" style="padding-top: 25px">
                                    <a id="search" name="" class="btn btn-rounded btn-dark mb-5">Search</a>
                                    						
                                </div>
                        </div>
                       


{{-- /////// Marks Entry Table /////// --}}
 <div class="row">
    <div class="col-md-12">
       <div id="DocumentResults">

 	<script id="document-template" type="text/x-handlebars-template">

        <form action="{{ route('account.fee.store') }}" method="post" >
        @csrf
 	<table class="table table-bordered table-striped" style="width: 100%">
 	<thead>
 		<tr>
        @{{{thsource}}}
 		</tr>
 	 </thead>
 	 <tbody>
 	 	@{{#each this}}
 	 	<tr>
 	 		@{{{tdsource}}}	
 	 	</tr>
 	 	@{{/each}}
 	 </tbody>
 	</table>
    </form>
    </script>

    
 			
 		</div> 
        {{-- <input type="submit" class="btn btn-rounded btn-primary" value="Submit"> --}}
    </div>
 </div> <!-- end row -->

					
				  
				

			
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

  <script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var fee_category_id = $('#fee_category_id').val();
    var date = $('#date').val();

     $.ajax({
      url: "{{ route('account.fee.getstudent')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>
@endsection