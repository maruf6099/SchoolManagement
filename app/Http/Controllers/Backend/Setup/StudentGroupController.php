<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
     public function ViewGroup(){
        $data['allData']=StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    }
    public function StudentGroupAdd(){
        return view('backend.setup.group.add_group');
    }
    public function StoreStudentGroup(Request $request){
         $validateData=$request->validate([
            'name'=>'required|unique:student_groups,name',
            
        ]);
        $data=new StudentGroup();
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'group Saved Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function EditStudentGroup($id){
        $editData=StudentGroup::find($id);
        return view('backend.setup.group.edit_group',compact('editData'));
    }

    public function UpdateStudentGroup(Request $request, $id){
        $data=StudentGroup::find($id);
       $validateData=$request->validate([
            'name'=>'required|unique:student_groups,name,'.$data->id
            
        ]);
        
        $data->name=$request->name;
        $data->save();

        $notification=array(
            'message'=>'Student Group Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function DeleteStudentGroup($id){
        $user=StudentGroup::find($id);
        $user->delete();

        $notification=array(
            'message'=>'Group Deleted Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
}
