@extends('layouts.navbar')

@section('content')
<section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Forget Password
      </h2>
      <div class="row">
        <div class="col-md-6 mr-auto">
          <form action="{{ url('forget-password') }}" method="POST">
            @csrf
            <div class="contact_form-container">
              <div>
                <div class="mt-3">
                  <input type="password" placeholder="Old Password" name="oldpassword" required>
                </div>
                <div class="mt-3">
                  <input type="password" placeholder="New Password" name="newpassword" required>
                </div>
                <div class="my-5">
                  <button type="submit">
                    Change
                  </button>
                </div>
              </div>
               @if(Session::has('error'))
                  <div class="alert alert-danger col-7">
                    {{ @Session::get('error') }}
                  </div>
              @endif
              @if(Session::has('message'))
                  <div class="alert alert-success col-7">
                   {{ @Session::get('message') }}
                  </div>
              @endif


            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
 
  @endsection