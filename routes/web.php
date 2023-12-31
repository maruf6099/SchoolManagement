<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Account\AccountSalaryController;
use App\Http\Controllers\Backend\Account\OtherCostController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\GradeController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Report\AttendanceReportController;
use App\Http\Controllers\Backend\Report\MarkSheetController;
use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Report\ResultReportController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Marks\MarksController;
use App\Models\EmployeeSalaryLog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'prevent-back-button'],function(){


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'],function () {
    


//User Management All Route

Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});

//User Profile and Password All Route

Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');

    Route::get('/password/view',[ProfileController::class,'PasswordView'])->name('password.view');
    Route::post('/password/update',[ProfileController::class,'PasswordUpdate'])->name('password.update');
    
   
});

//Setups All Route

Route::prefix('setup')->group(function(){
    //StudentClass
    Route::get('/student/class',[StudentClassController::class,'ViewStudent'])->name('student.class.view');
    Route::get('/student/class/add',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store',[StudentClassController::class,'StoreStudentClass'])->name('store.student.class');
    Route::get('/student/class/edit/{id}',[StudentClassController::class,'EditStudentClass'])->name('edit.student.class');
    Route::post('/student/class/update/{id}',[StudentClassController::class,'UpdateStudentClass'])->name('update.student.class');
    Route::get('/student/class/delete/{id}',[StudentClassController::class,'DeleteStudentClass'])->name('delete.student.class');

    //Student Year
    Route::get('/student/year',[StudentYearController::class,'ViewYear'])->name('student.year.view');
    Route::get('/student/year/add',[StudentYearController::class,'StudentYearAdd'])->name('student.year.add');
    Route::post('/student/year/store',[StudentYearController::class,'StoreStudentYear'])->name('store.student.year');
    Route::get('/student/year/edit/{id}',[StudentYearController::class,'EditStudentYear'])->name('edit.student.year');
    Route::post('/student/year/update/{id}',[StudentYearController::class,'UpdateStudentYear'])->name('update.student.year');
    Route::get('/student/year/delete/{id}',[StudentYearController::class,'DeleteStudentYear'])->name('delete.student.year');

    //Student Group
    Route::get('/student/group',[StudentGroupController::class,'ViewGroup'])->name('student.group.view');
    Route::get('/student/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');
    Route::post('/student/group/store',[StudentGroupController::class,'StoreStudentGroup'])->name('store.student.group');
    Route::get('/student/group/edit/{id}',[StudentGroupController::class,'EditStudentGroup'])->name('edit.student.group');
    Route::post('/student/group/update/{id}',[StudentGroupController::class,'UpdateStudentGroup'])->name('update.student.group');
    Route::get('/student/group/delete/{id}',[StudentGroupController::class,'DeleteStudentGroup'])->name('delete.student.group');

    //Student Shift
    Route::get('/student/shift',[StudentShiftController::class,'ViewShift'])->name('student.shift.view');
    Route::get('/student/shift/add',[StudentShiftController::class,'StudentShiftAdd'])->name('student.shift.add');
    Route::post('/student/shift/store',[StudentShiftController::class,'StoreStudentShift'])->name('store.student.shift');
    Route::get('/student/shift/edit/{id}',[StudentShiftController::class,'EditStudentShift'])->name('edit.student.shift');
    Route::post('/student/shift/update/{id}',[StudentShiftController::class,'UpdateStudentShift'])->name('update.student.shift');
    Route::get('/student/shift/delete/{id}',[StudentShiftController::class,'DeleteStudentShift'])->name('delete.student.shift');

    //Fee Category
    Route::get('/fee/category',[FeeCategoryController::class,'ViewFeeCategory'])->name('fee.category.view');
    Route::get('/fee/shift/add',[FeeCategoryController::class,'FeeCategoryAdd'])->name('fee.category.add');
    Route::post('/fee/shift/store',[FeeCategoryController::class,'StoreFeeCategory'])->name('store.fee.category');
    Route::get('/fee/shift/edit/{id}',[FeeCategoryController::class,'EditFeeCategory'])->name('edit.fee.category');
    Route::post('/fee/shift/update/{id}',[FeeCategoryController::class,'UpdateFeeCategory'])->name('update.fee.category');
    Route::get('/fee/shift/delete/{id}',[FeeCategoryController::class,'DeleteFeeCategory'])->name('delete.fee.category');

    //Fee Category Amount
    Route::get('/fee/amount',[FeeAmountController::class,'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('/fee/amount/add',[FeeAmountController::class,'AddFeeAmount'])->name('fee.amount.add');
    Route::post('/fee/amount/store',[FeeAmountController::class,'StoreFeeAmount'])->name('store.fee.amount');
    Route::get('/fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}',[FeeAmountController::class,'UpdateFeeAmount'])->name('update.fee.amount');
    Route::get('/fee/amount/details/{fee_category_id}',[FeeAmountController::class,'DetailsFeeAmount'])->name('details.fee.amount');

    //Exam Type 
    Route::get('/exam/type',[ExamTypeController::class,'ExamTypeView'])->name('exam.type.view');
    Route::get('/exam/type/add',[ExamTypeController::class,'AddExamType'])->name('exam.type.add');
    Route::post('/exam/type/store',[ExamTypeController::class,'StoreExamType'])->name('store.exam.type');
    Route::get('/exam/type/edit/{id}',[ExamTypeController::class,'EditExamType'])->name('edit.exam.type');
    Route::post('/exam/type/update/{id}',[ExamTypeController::class,'UpdateExamType'])->name('update.exam.type');
    Route::get('/exam/type/delete/{id}',[ExamTypeController::class,'DeleteExamType'])->name('delete.exam.type');

     //School Subject  
    Route::get('/school/subject',[SchoolSubjectController::class,'SchoolSubjectView'])->name('school.subject.view');
    Route::get('/school/subject/add',[SchoolSubjectController::class,'SchoolSubjectAdd'])->name('school.subject.add');
    Route::post('/school/subject/store',[SchoolSubjectController::class,'StoreSchoolSubject'])->name('store.school.subject');
    Route::get('/school/subject/edit/{id}',[SchoolSubjectController::class,'EditSchoolSubject'])->name('edit.school.subject');
    Route::post('/school/subject/update/{id}',[SchoolSubjectController::class,'UpdateSchoolSubject'])->name('update.school.subject');
    Route::get('/school/subject/delete/{id}',[SchoolSubjectController::class,'DeleteSchoolSubject'])->name('delete.school.subject');
   
    //Assign Subject
    Route::get('/assign/subject',[AssignSubjectController::class,'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('/assign/subject/add',[AssignSubjectController::class,'AddAssignSubject'])->name('assign.subject.add');
    Route::post('/assign/subject/store',[AssignSubjectController::class,'StoreAssignSubject'])->name('store.assign.subject');
    Route::get('/assign/subject/edit/{class_id}',[AssignSubjectController::class,'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}',[AssignSubjectController::class,'UpdateAssignSubject'])->name('update.assign.subject');
    Route::get('/assign/subject/details/{class_id}',[AssignSubjectController::class,'DetailsAssignSubject'])->name('assign.subject.details');

    //Designation  
    Route::get('/designation/type',[DesignationController::class,'DesignationView'])->name('designation.view');
    Route::get('/designation/add',[DesignationController::class,'AddDesignation'])->name('designation.add');
    Route::post('/designation/store',[DesignationController::class,'StoreDesignation'])->name('designation.store');
    Route::get('/designation/edit/{id}',[DesignationController::class,'EditDesignation'])->name('designation.edit');
    Route::post('/designation/update/{id}',[DesignationController::class,'UpdateDesignation'])->name('designation.update');
    Route::get('/designation/delete/{id}',[DesignationController::class,'DeleteDesignation'])->name('designation.delete');
});

//Student Registration Route

Route::prefix('students')->group(function(){
    Route::get('/registration/view',[StudentRegController::class,'StudentRegView'])->name('student.registration.view');
    Route::get('/registration/add',[StudentRegController::class,'StudentRegAdd'])->name('student.registration.add');
    Route::post('/registration/store',[StudentRegController::class,'StudentRegStore'])->name('student.registration.store');
    Route::get('/year/class/wise',[StudentRegController::class,'StudentClassYearWise'])->name('student.year.class.wise');
    Route::get('/registration/edit/{student_id}',[StudentRegController::class,'StudentRegEdit'])->name('student.registration.edit');
    Route::post('/registration/update/{student_id}',[StudentRegController::class,'StudentRegUpdate'])->name('student.registration.update'); 
    Route::get('/registration/promotion/{student_id}',[StudentRegController::class,'StudentRegPromotion'])->name('student.registration.promotion'); 
    Route::post('/registration/update/promotion/{student_id}',[StudentRegController::class,'StudentUpdatePromotion'])->name('promotion.student.registration'); 
    Route::get('/registration/details/{student_id}',[StudentRegController::class,'StudentRegDetails'])->name('student.registration.details'); 

    //Roll Generation
     Route::get('/roll/generate/view',[StudentRollController::class,'StudentRollView'])->name('roll.generate.view');
     Route::get('/reg/student/get',[StudentRollController::class,'GetStudents'])->name('student.registration.getstudents');
     Route::post('/roll/generate/store',[StudentRollController::class,'StudentsRollStore'])->name('roll.generate.store');

     //registration fee
     Route::get('/registration/fee/view',[RegistrationFeeController::class,'RegFeeView'])->name('registration.fee.view');
     Route::get('/registration/fee/classwise',[RegistrationFeeController::class,'GetStudentsFee'])->name('student.registration.fee.classwise.get');
     Route::get('/registration/fee/payslip',[RegistrationFeeController::class,'RegFeePayslip'])->name('student.registration.fee.payslip');

     //registration fee
     Route::get('/monthly/fee/view',[MonthlyFeeController::class,'MonthlyFeeView'])->name('monthly.fee.view');
     Route::get('/monthly/fee/classwise',[MonthlyFeeController::class,'GetMonthlyFee'])->name('student.monthly.fee.classwise.get');
     Route::get('/monthly/fee/payslip',[MonthlyFeeController::class,'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

     //Exam fee
     Route::get('/exam/fee/view',[ExamFeeController::class,'ExamFeeView'])->name('exam.fee.view');
     Route::get('/exam/fee/classwise',[ExamFeeController::class,'GetExamFee'])->name('student.exam.fee.classwise.get');
     Route::get('/exam/fee/payslip',[ExamFeeController::class,'ExamFeePayslip'])->name('student.exam.fee.payslip');
});

//Employ Management
Route::prefix('employees')->group(function(){
    Route::get('/employee/reg/view',[EmployeeRegController::class,'EmpRegView'])->name('employee.registration.view');
    Route::get('/employee/reg/add',[EmployeeRegController::class,'AddEmpReg'])->name('employee.registration.add');
    Route::post('/employee/reg/store',[EmployeeRegController::class,'StoreEmpReg'])->name('employee.registration.store');
    Route::get('/employee/reg/edit/{id}',[EmployeeRegController::class,'EditEmpReg'])->name('employee.registration.edit');
    Route::post('/employee/reg/update/{id}',[EmployeeRegController::class,'UpdateEmpReg'])->name('employee.registration.update');
    Route::get('/employee/reg/details/{id}',[EmployeeRegController::class,'DetailsEmpReg'])->name('employee.registration.details');

    //Employee Salary
     Route::get('/employee/salary/view',[EmployeeSalaryController::class,'EmpSalaryView'])->name('employee.salary.view');
     Route::get('/employee/salary/view/{id}',[EmployeeSalaryController::class,'EmpSalaryIncrement'])->name('employee.salary.increment');
     Route::post('/increment/salary/view/{id}',[EmployeeSalaryController::class,'SalaryStore'])->name('update.increment.store');
     Route::get('/emp/salary/details/{id}',[EmployeeSalaryController::class,'SalaryDetails'])->name('employee.salary.details');
    

     //Employee Leave
     Route::get('/employee/leave/view',[EmployeeLeaveController::class,'EmpLeaveView'])->name('employee.leave.view');
     Route::get('/employee/leave/add',[EmployeeLeaveController::class,'EmpLeaveAdd'])->name('employee.leave.add');
     Route::post('/employee/leave/store',[EmployeeLeaveController::class,'EmpLeaveStore'])->name('employee.leave.store');
     Route::get('/employee/leave/edit/{id}',[EmployeeLeaveController::class,'EmpLeaveEdit'])->name('employee.leave.edit');
     Route::post('/employee/leave/update/{id}',[EmployeeLeaveController::class,'EmpLeaveUpdate'])->name('employee.leave.update');
     Route::get('/employee/leave/delete/{id}',[EmployeeLeaveController::class,'EmpLeaveDelete'])->name('employee.leave.delete');

     //Employee Attendance
     Route::get('/employee/attendance/view',[EmployeeAttendanceController::class,'EmpAttendanceView'])->name('employee.attendance.view');
     Route::get('/employee/attendance/add',[EmployeeAttendanceController::class,'EmpAttendanceAdd'])->name('employee.attendance.add');
     Route::post('/employee/attendance/store',[EmployeeAttendanceController::class,'EmpAttendanceStore'])->name('employee.attendance.store');
     Route::get('/employee/attendance/edit/{date}',[EmployeeAttendanceController::class,'EmpAttendanceEdit'])->name('employee.attendance.edit');
     Route::get('/employee/attendance/details/{date}',[EmployeeAttendanceController::class,'EmpAttendanceDetails'])->name('employee.attendance.details');

      //Employee monthly Salary
     Route::get('/employee/salary/view',[MonthlySalaryController::class,'MonthlySalaryView'])->name('employee.salary.view');
     Route::get('/employee/salary/get',[MonthlySalaryController::class,'MonthlySalaryGet'])->name('employee.monthly.salary.get');
     Route::get('/employee/salary/payslip/{employee_id}',[MonthlySalaryController::class,'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
   
});

//Marks Management
Route::prefix('marks')->group(function(){
    Route::get('/marks/entry/add',[MarksController::class,'MarksAdd'])->name('marks.entry.add');
    Route::post('/marks/entry/store',[MarksController::class,'MarkStore'])->name('marks.entry.store');
    Route::get('/marks/entry/edit',[MarksController::class,'MarksEdit'])->name('marks.entry.edit');
    Route::get('/marks/getstudents/edit',[MarksController::class,'MarksGetStudents'])->name('student.edit.getstudents');
    Route::post('/marks/entry/update',[MarksController::class,'MarksUpdate'])->name('marks.entry.update');

    //Marks Grade
    Route::get('/marks/grade/view',[GradeController::class,'GradeView'])->name('marks.grade.view');
    Route::get('/marks/grade/add',[GradeController::class,'GradeAdd'])->name('marks.grade.add');
    Route::post('/marks/grade/store',[GradeController::class,'GradeStore'])->name('marks.grade.store');
    Route::get('/marks/grade/edit/{id}',[GradeController::class,'GradeEdit'])->name('marks.grade.edit');
    Route::post('/marks/grade/update/{id}',[GradeController::class,'GradeUpdate'])->name('marks.grade.update');
    Route::get('/marks/grade/delete/{id}',[GradeController::class,'GradeDelete'])->name('marks.grade.delete');
    
    
    
   
});

Route::get('/marks/getsubject',[DefaultController::class,'GetSubject'])->name('marks.getsubject');
Route::get('/student/marks/getsubject',[DefaultController::class,'GetStudent'])->name('student.marks.getstudents');

//Account Management
Route::prefix('accounts')->group(function(){
    Route::get('/student/fee/view',[StudentFeeController::class,'StudentFeeView'])->name('student.fee.view');
    Route::get('/student/fee/add',[StudentFeeController::class,'StudentFeeAdd'])->name('student.fee.add');
    Route::get('/student/fee/getstudent',[StudentFeeController::class,'StudentFeeGetStudent'])->name('account.fee.getstudent');
    Route::post('/student/fee/store',[StudentFeeController::class,'StudentFeeStore'])->name('student.fee.store');

    //Employee Salary Route
    Route::get('/account/salary/view',[AccountSalaryController::class,'AccountSalaryView'])->name('account.salary.view');
    Route::get('/account/salary/add',[AccountSalaryController::class,'AccountSalaryAdd'])->name('account.salary.add');
    Route::get('/account/salary/getemployee',[AccountSalaryController::class,'AccountSalaryGetEmployee'])->name('account.salary.getemployee');
    Route::post('/account/salary/store',[AccountSalaryController::class,'AccountSalaryStore'])->name('account.salary.store');

    //Other Cost Route
    Route::get('/other/cost/view',[OtherCostController::class,'OtherCostView'])->name('other.cost.view');
    Route::get('/other/cost/add',[OtherCostController::class,'OtherCostAdd'])->name('other.cost.add');
    Route::post('/other/cost/store',[OtherCostController::class,'OtherCostStore'])->name('other.cost.store');
    Route::get('/other/cost/edit/{id}',[OtherCostController::class,'OtherCostEdit'])->name('other.cost.edit');
    Route::post('/other/cost/update/{id}',[OtherCostController::class,'OtherCostUpdate'])->name('other.cost.update');
});

//Report Management
Route::prefix('reports')->group(function(){
    Route::get('/monthly/profit/view',[ProfitController::class,'MonthlyProfitView'])->name('monthly.profit.view');
    Route::get('/report/profit/datewise',[ProfitController::class,'MonthlyProfitDateWise'])->name('report.profit.datewise.get');
    Route::get('/report/profit/pdf',[ProfitController::class,'MonthlyProfitPdf'])->name('report.profit.pdf');

    //MarkSheet Generator
    // Route::get('/mark/sheet/view',[MarkSheetController::class,'MarkSheetView'])->name('mark.sheet.view');
    // Route::get('/mark/sheet/get',[MarkSheetController::class,'MarkSheetGet'])->name('mark.sheet.get');
    Route::get('marksheet/generate/view', [MarkSheetController::class, 'MarkSheetView'])->name('marksheet.generate.view');

Route::get('marksheet/generate/get', [MarkSheetController::class, 'MarkSheetGet'])->name('report.marksheet.get');

    //Attendance Generator
    Route::get('/attendance/report/view',[AttendanceReportController::class,'AttendanceReportView'])->name('attendance.report.view');
    Route::get('/attendance/report/get',[AttendanceReportController::class,'AttendanceReportGet'])->name('attendance.report.get');

    //Student Result Report
    Route::get('/student/result/view',[ResultReportController::class,'ResultView'])->name('student.result.view');
    Route::get('/student/result/get',[ResultReportController::class,'ResultGet'])->name('report.student.result.get');

    //Student Id Card
    Route::get('/student/idcard/view',[ResultReportController::class,'IdCardView'])->name('student.idcard.view');
    Route::get('/student/idcard/get',[ResultReportController::class,'IdCardGet'])->name('report.student.idcard.get');
    });

}); //end middleware auth route
}); //end prevent back middleware 