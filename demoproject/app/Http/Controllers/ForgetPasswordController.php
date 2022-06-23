<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ForgetPasswordController extends Controller
{
    public function forgetPassword()
    {
        return view('forgetpassword');
    }

    public function changePassword(Request $request)
    {
        // dd($request);
        $oldpassword = $request->post('oldpassword');
        $newpassword = $request->post('newpassword');
        $user_id = $request->session()->get('user_id');
        
        $getoldpassword = User::Where('id',$user_id)->get()->first();

    
        if(Hash::check($oldpassword , $getoldpassword->password)){
            $user = User::Where('id',$user_id)->update(['password'=>Hash::make( $newpassword)]);
            return back()->with('message', 'Your password has been changed!');
        }else{
            return back()->with('message', 'Your password cannot changed!');
        }
        
    }
}
