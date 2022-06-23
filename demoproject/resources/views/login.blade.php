@extends('layouts.navbar')

@section('content')
<section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Login Here
      </h2>
      <div class="row">
        <div class="col-md-6 mr-auto">
          <form action="{{ url('do-login') }}" method="POST">
            @csrf
            <div class="contact_form-container">
              <div>
                <div class="mt-3">
                  <input type="email" placeholder="Email" name="email" require>
                </div>
                <div class="mt-3">
                  <input type="password" placeholder="password" name="password" id="password">
                </div>
                <div class="col-md-6 ">
                
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" >                        
                  </div>
                  <label class="form-check-label" for="remember">
                    Remember Me
                </label>
                </div>
                <div class="my-5">
                  <button type="submit">
                    Login
                  </button>
                </div>
              </div>
              @if(Session::has('error'))
                  <div class="alert alert-danger col-6">
                    {{ @Session::get('error') }}
                  </div>

              @endif
              @if(Session::has('message'))
                  <div class="alert alert-success col-6">
                   {{ @Session::get('message') }}
                  </div>

              @endif


            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- <script>
    var password = document.getElementById('password');
    var confirm_password = document.getElementById('confirm_password');
    function validPass()
    {
      alert()
    }
  </script> -->
  @endsection