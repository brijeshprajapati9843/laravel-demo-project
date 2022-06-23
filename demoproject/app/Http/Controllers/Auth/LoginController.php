<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
public function showLogin(){
    return view('auth/login');
}

    public function doLogin(Request $request){
        $userdata = array(
            'email' => $request->post('email') ,
            'password' => $request->post('password')
        );
        if (Auth::attempt($userdata)){
            $user = User::where('email',$request->post('email'))->get();
            $request->session()->put('user_id', $user->first()->id);
            $request->session()->put('email', $user->first()->email);
            return Redirect("show_user");
        }else{
//            return view('auth/login');
            return back()->with('error','login failed');
        }
    }
}
