<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $member = array(
            'email' => $request->post('email'),
            'password' => $request->post('password')
        );
        // dd($member);
        if(Auth::attempt($member))
        {
            $user = Member::where('email',$request->post('email'))->get();
            $request->session()->put('user_id', $user->first()->id);
            $request->session()->put('email', $user->first()->email);
            $request->session()->put('login', true);
            
            // dd('login successfully');
            return Redirect('home');
        }else{
            return back()->with("error","email or password incorrect");
        }
    }

    public function doLogout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('email');
        $request->session()->forget('login');
        $request->session()->forget('id');
        $request->session()->flush();
        return Redirect('login');
    }
}
