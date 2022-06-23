<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
//    }

        public function showRegister()
        {
            return view('auth/register');
        }
//        public function validate(array $data)
//        {
//            return validate::make ($data,[
//                'name'=>['required','string','max:255'],
//                'email'=>['required','string','unique:users','max:255'],
//                'password'=>['required','string','min:8','confirmed']
//                ]);
//        }

        public function registerUser(Request $request)       
        {
            $name = $request->post('name');
            $email = $request->post('email');
            $password = $request->post('password');

            $user = User::where('email',$email)->get();

            if (count($user)>0){
                return back()->with('failed','email already exist');
            }else{
                $insert = User::insert([
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>Hash::make($password),
                ]);
                if($insert){
                    return back()->with('success',"User Register Successfully");
                }else{
                    return back()->with("failed","Somthing went wrong!!");
                }
            }

        }
}
