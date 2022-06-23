@extends('layouts.navbar')

@section('content')
<section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Login Here
      </h2>
      <div class="row">
        <div class="col-md-6 mr-auto">
          <form action="{{ url('reset-password') }}" method="POST">
            @csrf
            <div class="contact_form-container">
              <div>
              
               <div>
              
                    <input type="hidden" value="{{$email}}" name="email" placeholder="Email">
                    <input type="hidden" value="{{$token}}" name="token" placeholder="Email">
               </div>
                <div class="mt-3">
                  <input type="password" placeholder="password" name="password" id="password">
                </div>
                <div class="mt-3">
                  <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
                </div>
               
                <div class="my-5">
                  <button type="submit">
                    Reset
                  </button>
                </div>
              </div>
              @if(Session::has('error'))
                  <div class="alert alert-danger col-7">
                    {{ @Session::get('error') }}
                  </div>

              @endif
              @if(Session::has('success'))
                  <div class="alert alert-success col-7">
                   {{ @Session::get('success') }}
                  </div>

              @endif


            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
 
  @endsection