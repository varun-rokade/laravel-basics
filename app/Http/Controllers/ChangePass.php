<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ChangePass extends Controller
{
    
    public function Cpassword()
    {
        return view('admin.body.cpassword');
    }

    public function PassUpdate(Request $request)
    {
        // $ValidateDate = $request->validate([
        //     'current_password' => 'required',
        //     'password' => 'required|confirmed',
            // 'conform_password' => 'required'
        // ]);

        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashedpassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login')->with('success','Your Password Was Changed Successfully');

        }
        else
        {
            return redirect()->back()->with('error','Current Password is invalid'); 
        }

    }

    public function PUpdate()
    {
        if(Auth::user())
        {
            $user = User::find(Auth::user()->id);
            if($user)
            {
                return view('admin.body.update_profile',compact('user'));
            }
        }
    }


    public function updateUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($user)
        {
            $user->name = $request['name'];
            $user->email = $request['email'];
            
            $user->save();
            return redirect()->back()->with('success','User Profile Updated') ;
        }
        else
        {
            return Redirect()->back();
        }
    }

}
