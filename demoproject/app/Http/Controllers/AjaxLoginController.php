<?php

namespace App\Http\Controllers;

// use App\Models\Ajaxregister;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AjaxLoginController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function store(Request $request)
    {
        
        $name = $request->post('name');
        $email = $request->post('email');
        $password = $request->post('password');
        $confirm_password = $request->post('confirm_password');
        
        if($password == $confirm_password)
        {
            $insert = User::insert([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
            ]);
            if ($insert){
                return response()->json(['success'=>"Registeration Successfully"]);
            }else{
                return response()->json(['error'=>"Registeration Failed !!"]);
            }
        }else{
            return response()->json(['error'=>"Password Mismatch !!"]);
        }
       
        // return response()->json(['message'=>"Register Successfully"]);
    }

    public function loginShow()
    {
        return view('login.login');
    }

    public function doLogin(Request $request)
    {
        $data = array(
            'email' => $request->post('email'),
            'password' => $request->post('password')
        );
        // return response($data);
       if(Auth::attempt($data))
       {
        $user = User::Where('email',$request->post('email'))->get();
        $request->session()->put('name',$user->first()->name);
        return response()->json(['status'=>true,"redirect_url"=>url('welcome')]);
       }else{
            return response()->json(['error'=>"Email or Password incorrect"]);
       }


    }
}
