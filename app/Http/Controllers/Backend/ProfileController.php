<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('backend.user.profile_view',compact('user'));
    }
    public function ProfileEdit(){
        $id=Auth::user()->id;
        $editData=User::find($id);
        return view('backend.user.edit_profile',compact('editData'));
    }
    public function ProfileStore(Request $request){

        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=$request->phone;
        $data->address=$request->address;
        $data->gender=$request->gender;
        
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image']=$filename;
            
        }
        
        $data->save();
       

        $notification=array(
            'message'=>'Admin Profile Update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('profile.view')->with($notification);
        
    }
    public function PasswordView(){
        return view('backend.user.edit_password');
    }

    public function PasswordUpdate(Request $request){
        $validateData=$request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);

        $hashPassword=Auth::user()->password;
        if(Hash::check($request->old_password, $hashPassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }
}
