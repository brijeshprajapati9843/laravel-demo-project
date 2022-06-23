@extends('layouts.navbar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
       
        @if(@isset($type))
        @else
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{session::get('error')}}
            </div>
        @endif
        <table class="table table-striped text-center">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a class="btn btn-success btn-sm" href="{{ url('/update_user/'.\Illuminate\Support\Facades\Crypt::encryptString($user->id)) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-danger btn-sm" href="{{ url('/delete_user/'.\Illuminate\Support\Facades\Crypt::encryptString($user->id)) }}"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
            @endforeach
        </table>
        @endif


    </div>
</div>
@endsection
