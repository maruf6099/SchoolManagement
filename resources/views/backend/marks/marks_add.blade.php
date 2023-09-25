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
					<h4 class="box-title">Student <strong>Marks Entry</strong></h4>
				  </div>

				  <div class="box-body">
					
					<form action="{{ route('marks.entry.store') }}" method="post">
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
                                        <h5>Subject<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="assign_subject_id" id="assign_subject_id" required="" class="form-control">
                                                <option value="" selected >Select Subject</option>
                                                
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
								<div class="col-md-3" style="padding-top: 25px">
                                    <a id="search" name="" class="btn btn-rounded btn-dark mb-5">Search</a>
                                    						
                                </div>
						</div> <!-- End row -->


{{-- /////// Marks Entry Table /////// --}}
 <div class="row d-none" id="marks-entry">
    <div class="col-md-12">
        <table class="table table-bordered table-striped" style="width:100%;">
            <thead>
                <tr>
                    <th>Id NO</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Gender</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody id="marks-entry-tr">

            </tbody>
        </table>
        <input type="submit" class="btn btn-rounded btn-primary" value="Submit">
    </div>
 </div>

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

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id},
      success: function (data) {
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="marks[]"></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>

{{-- ============ End Script Roll Generate ================= --}}

<!-========================-  Load class by subject ====================== -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id = $('#class_id').val();
      $.ajax({
        url:"{{ route('marks.getsubject') }}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>
<!-========================-End  Load class by subject ====================== -->
@endsection