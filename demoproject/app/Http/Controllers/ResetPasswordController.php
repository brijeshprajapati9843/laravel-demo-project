<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('resetpassword');
    }
    public function sendResetLink(Request $request)
    {
        $this->email = $request->post('email');
        $token = Str::random(64);


        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );


        Mail::send('verify', ['token' => $token, 'email'=>$this->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });
  
        return back()->with('message', 'We have e-mailed your password reset link!');

    }
    public function viewReset($token,$email)
    {
        return view('reset-password',['email'=>$email, 'token'=>$token]);
    }
    public function updatePassword(Request $request)
    {

        // dd($request);
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'confirm_password' => 'required',     
        ]);

        $updatePassword = DB::table('password_resets')
        ->where(['email' => $request->email, 'token' => $request->token])
        ->first();
        

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }else{
            $user = User::where('email', $request->email)
                  ->update(['password' => Hash::make($request->password)]);
             DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return redirect('/login')->with('message', 'Your password has been changed!');
        }
    }
}
