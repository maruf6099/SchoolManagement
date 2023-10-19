@extends('admin.admin_master')
@section('admin')

<script src="{{ asset('backend/others/jq.js') }}"></script>
<script src="{{ asset('backend/others/handlebars.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js"></script> --}}



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
					<h4 class="box-title">Manage <strong>Monthly/Yearly Profit</strong></h4>
				  </div>

				  <div class="box-body">
					
					
						<div class="row">
							<div class="col-md-4">
                                <div class="form-group">
                                    <h5>Start Month <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="start_date" id="start_date" class="form-control" required="" >                                   
                                </div>
                                </div>						
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
                                    <h5>End Month <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="end_date" id="end_date" class="form-control" required="" >                                   
                                </div>
                                </div>						
                            </div>
                            
                            <div class="col-md-4" style="padding-top: 25px">
                                <a id="search" name="" class="btn btn-rounded btn-dark mb-5">Search</a>
                                                        
                            </div>
						</div> <!-- End row -->


{{-- /////// Registration Fee Table /////// --}}

 {{-- <div class="row" id="">
    <div class="col-md-12">
        <div id="DocumentResults">
            <script id="document-template" type="text/x-handlebars-template">
                <table class="table table-bordered table-striped" style="width:100%;">
            <thead>
                <tr>
                   @{{ {thsource} }}
                </tr>
            </thead>
            <tbody>
                @{{ #each this }}
                <tr>
                    @{{ {tdsource} }}
                </tr>
                @{{ /each }}
            </tbody>
        </table>
          </script>  
        </div>
    </div>
 </div> --}}
 <div class="row">
 	<div class="col-md-12">
 		<div id="DocumentResults">

 	<script id="document-template" type="text/x-handlebars-template">

 	<table class="table table-bordered table-striped" style="width: 100%">
 	<thead>
 		<tr>
        @{{{thsource}}}
 		</tr>
 	 </thead>
 	 <tbody>
 	 	
 	 	<tr>
 	 		@{{{tdsource}}}	
 	 	</tr>
 	 	
 	 </tbody>
 	</table>
    </script>

    
 			
 		</div> 		
 	</div>
 	
 </div>

					
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

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();

     $.ajax({
      url: "{{ route('report.profit.datewise.get')}}",
      type: "get",
      data: {'start_date':start_date,'end_date':end_date},
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

{{-- ============ End Script Roll Generate ================= --}}
@endsection