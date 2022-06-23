<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLogin']);
Route::post('/do_login', [App\Http\Controllers\Auth\LoginController::class, 'doLogin']);
Route::get('/show_user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/update_user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('update_user',[App\Http\Controllers\UserController::class,'update']);

//Register
Route::get('register_user',[App\Http\Controllers\Auth\RegisterController::class, 'showRegister']);
Route::post('doregister',[App\Http\Controllers\Auth\RegisterController::class, 'registerUser']);

// All pages

    Route::get('home', function(){
        return view('index');
    })->middleware('do_login');
    Route::get('fruits', function(){
        return view('fruit');
    })->middleware('do_login');
    Route::get('services', function(){
        return view('service');
    })->middleware('do_login');
    Route::get('contact', function(){
        return view('contact');
    })->middleware('do_login');
Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('do-login', [App\Http\Controllers\LoginController::class, 'doLogin']);
Route::get('register', [App\Http\Controllers\RegisterController::class, 'index']);
Route::post('register', [App\Http\Controllers\RegisterController::class, 'store']);
Route::get('logout',[App\Http\Controllers\LoginController::class, "doLogout"]);
Route::get('delete_user/{id}',[App\Http\Controllers\RegisterController::class, 'delete']);
Route::get('reset_password',[App\Http\Controllers\ResetPasswordController::class, 'index']);
Route::post('send-email',[App\Http\Controllers\ResetPasswordController::class, 'sendResetLink']);
Route::get('{token}/reset-password/{email}',[App\Http\Controllers\ResetPasswordController::class, 'viewReset']);
Route::post('reset-password',[App\Http\Controllers\ResetPasswordController::class, 'updatePassword']);
Route::get('forgetpassword',[App\Http\Controllers\ForgetPasswordController::class, 'forgetPassword']);
Route::post('forget-password',[App\Http\Controllers\ForgetPasswordController::class , 'changePassword']);
Route::get('get-student',[App\Http\Controllers\StudentController::class, 'index']);
Route::post('add-student',[App\Http\Controllers\StudentController::class, 'store']);
Route::get('show-student/{id}',[App\Http\Controllers\StudentController::class, 'showStudent']);
Route::get('show-student',[App\Http\Controllers\StudentController::class, 'allData'])->middleware('verified');
Route::get('search', [App\Http\Controllers\StudentController::class, 'search']);


// login with ajax
Route::get('register-ajax',[App\Http\controllers\AjaxLoginController::class, 'index']);
Route::post('ajaxregister',[App\Http\Controllers\AjaxLoginController::class, 'store']);
Route::get('login-ajax',[App\Http\Controllers\AjaxLoginController::class, 'loginShow']);
Route::post('ajaxlogin',[App\Http\Controllers\AjaxLoginController::class, 'doLogin']);
Route::get('welcome',function(){
    return view('login.welcome');
});
