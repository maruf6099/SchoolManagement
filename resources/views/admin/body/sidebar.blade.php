 @php
   $prefix=Request::route()->getPrefix();

   $route=Route::current()->getName();
 @endphp
 
 
 <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>YoYoo</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route=='dashboard')?'active':'' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		@if (Auth::user()->role=='Admin')
      
    
        <li class="treeview {{ ($prefix=='/users')?'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('user.add') }}"><i class="ti-more"></i>add User</a></li>
          </ul>
        </li> 
		  @endif
       
        <li class="treeview {{ ($prefix=='/profile')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your profile</a></li>
            <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
            
          </ul>
        </li>
        <li class="treeview {{ ($prefix=='/setup')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Setup Managrment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">class="{{ ($route=='')?'active':'' }}"
            <li class="{{ ($route=='student.class.view')?'active':'' }}"><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
            <li class="{{ ($route=='student.year.view')?'active':'' }}"><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
            <li class="{{ ($route=='student.group.view')?'active':'' }}"><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
            <li class="{{ ($route=='student.shift.view')?'active':'' }}"><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a></li>
            <li class="{{ ($route=='fee.category.view')?'active':'' }}"><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
            <li class="{{ ($route=='fee.amount.view')?'active':'' }}"><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Amount</a></li>
            <li class="{{ ($route=='exam.type.view')?'active':'' }}"><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
            <li class="{{ ($route=='school.subject.view')?'active':'' }}"><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a></li>
            <li class="{{ ($route=='assign.subject.view')?'active':'' }}"><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>assign Subject</a></li>
            <li class="{{ ($route=='designation.view')?'active':'' }}"><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a></li>
            
          </ul>
        </li>

        <li class="treeview {{ ($prefix=='/students')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Student Managrment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='student.registration.view')?'active':'' }}"><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>
            <li class="{{ ($route=='roll.generate.view')?'active':'' }}"><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a></li>
            <li class="{{ ($route=='registration.fee.view')?'active':'' }}"><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee</a></li>
            <li class="{{ ($route=='monthly.fee.view')?'active':'' }}"><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthiy Fee</a></li>
            <li class="{{ ($route=='exam.fee.view')?'active':'' }}"><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee</a></li>
          </ul>
        </li>

        <li class="treeview {{ ($prefix=='/employees')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Employee Managrment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='employee.registration.view')?'active':'' }}"><a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee Registration</a></li>
            <li class="{{ ($route=='employee.salary.view')?'active':'' }}"><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
            <li class="{{ ($route=='employee.leave.view')?'active':'' }}"><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>
            <li class="{{ ($route=='employee.attendance.view')?'active':'' }}"><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a></li>
            <li class="{{ ($route=='employee.salary.view')?'active':'' }}"><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Monthly Salary</a></li>
            
          </ul>
        </li>
        <li class="treeview {{ ($prefix=='/marks')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Marks Managrment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='marks.entry.add')?'active':'' }}"><a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Marks Entry</a></li>
            <li class="{{ ($route=='marks.entry.edit')?'active':'' }}"><a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Marks Edit</a></li>
            <li class="{{ ($route=='marks.grade.view')?'active':'' }}"><a href="{{ route('marks.grade.view') }}"><i class="ti-more"></i>Marks Grade</a></li>
            
            
          </ul>
        </li>
        <li class="treeview {{ ($prefix=='/accounts')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Account Managrment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='student.fee.view')?'active':'' }}"><a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Student Fee</a></li>
            <li class="{{ ($route=='account.salary.view')?'active':'' }}"><a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
            <li class="{{ ($route=='other.cost.view')?'active':'' }}"><a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Other Cost</a></li>

            
            
          </ul>
        </li>
		
        		  
		 
        <li class="header nav-small-cap">Report Interface</li>
		  
        <li class="treeview {{ ($prefix=='/reports')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Report Managrment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='monthly.profit.view')?'active':'' }}"><a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly-Yearly Profit</a></li>
            <li class="{{ ($route=='marksheet.generate.view')?'active':'' }}"><a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>Mark-Sheet Generate</a></li>
            <li class="{{ ($route=='attendance.report.view')?'active':'' }}"><a href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Attendance Report</a></li>
            <li class="{{ ($route=='student.result.view')?'active':'' }}"><a href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Result</a></li>
            <li class="{{ ($route=='student.idcard.view')?'active':'' }}"><a href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student Id Card</a></li>
        
          </ul>
        </li>
		
		  
		  
     
		
		  
		<li>
          <a href="auth_login.html">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>