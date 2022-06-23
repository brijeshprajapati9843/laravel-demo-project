<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|string',
            'email'=>'required|unique:members,email|max:255|email',
            'password'=>'required|min:6',
            // 'confirm_password'=>'required|same:password'

        ]);
        $name = $request->post('name');
        $email = $request->post('email');
        $password = $request->post('password');
        $confirm_password = $request->post('confirm_password');

        if($password === $confirm_password){
            $user = User::Where('email',$email)->get();
            if(count($user)>0){
                return back()->with("error","Email Already Exist");
            }else{
                $insert = User::insert([
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>Hash::make($password)
                ]);
                if($insert){
                    return back()->with("success"," Register Successfully.");
                }else{
                    return back()->with("error"," Register Failed.");
                }
            }
        }else{
            return back()->with("error","Password mismatch.");
        }
        // dd("$name", "$email", "$password");
        
        
    }


    public function delete($id)
    {
        $delete = User::Where('id',Crypt::decryptString($id))->delete();
        if($delete){
            return back()->with("success","User Deleted Successfully");
        }else{
            return back()->with('error',"User Cannot Delete");
        }
    }
}
