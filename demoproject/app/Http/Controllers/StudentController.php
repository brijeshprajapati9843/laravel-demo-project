<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function index()
    {
        return view('student.student');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|min:3|required',
            'email'=>'string|max:255|unique:students|required|email',
            'phone'=>'required|min:10|max:10',
            'age'=>'digits:2|required',
            'department'=>'string|min:3|required',
        ]);
        
        $name = $request->post('name');
        $email = $request->post('email');
        $phone = $request->post('phone');
        $age = $request->post('age');
        $department = $request->post('department');
        // dd($name,$email,$phone,$age,$department);
        $insert = Student::insert([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'age'=>$age,
            'department'=>$department
        ]);
        if($insert){
            return back()->with('success','Student Successfully Added.');
        }else{
            return back()->with('error','Student Cannot Add!!');
        }
    }
    public function showStudent($para)
    {
        if($para>0){
            $data = Student::Where('age',$para)->orWhere('name',$para)->get();
            // dd($data );
        }else{
            $data = Student::get();
        }
        // if(count($data)>0){
            return view('student.showstudent',['data'=>$data]);
        // }else{
        //     return back()->with('error','Records not found.');
        // }
        // return view('student.showstudent',['data'=>$data]);
    }
    public function allData()
    {
        $data = Student::all();
        return view('student.showstudent',['data'=>$data]);
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
        $output="";
        $products=DB::table('students')->where('name','LIKE','%'.$request->search."%")
        ->orWhere('phone','LIKE','%'.$request->search."%")
        ->orWhere('age','LIKE','%'.$request->search."%")->get();
        if(count($products)>0)
        {
            foreach ($products as $key => $product) 
            {
                $output.='<tr>'.
                '<td>'.$product->id.'</td>'.
                '<td>'.$product->name.'</td>'.
                '<td>'.$product->email.'</td>'.
                '<td>'.$product->phone.'</td>'.
                '<td>'.$product->age.'</td>'.
                '<td>'.$product->department.'</td>'.
                '</tr>';
            }
            return Response($output);
        }else{
            $msg = "<tr style='color:red'>".
            '<td colspan = "6">'.'Record not Found'.'</td>'.
            '</tr>';
            return Response($msg);
        }
        }

    }
}
