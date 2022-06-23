@extends('layouts.navbar')

@section('content')
<section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Register Here
      </h2>
      <div class="row">
        <div class="col-md-8 mr-auto">
          <form action="{{ url('register') }}" method="POST" onsubmit="return validPass()">
            @csrf
            <div class="contact_form-container">
              <div>
                <div>
                  <input type="text" placeholder="Name" name="name" class"@error ('name') is-invalid @enderror"><br>
                  @error('name')
                    <span class="alert text-danger">{{ $message }}</snap>
                  @enderror
                </div>
                <div class="mt-3">
                  <input type="email" placeholder="Email" name="email" class"@error ('email') is-invalid @enderror"><br>
                  @error('email')  
                    <span class="alert text-danger">{{ $message }}</snap>
                  @enderror
                </div>
                <div class="mt-3">
                  <input type="password" placeholder="password" name="password" id="password" class"@error ('password') is-invalid @enderror"><br>
                  @error('password')
                    <span class="alert text-danger">{{ $message }}</snap>
                  @enderror
                </div>

                <div class="mt-3">
                  <input type="password" placeholder="confirm Password" name="confirm_password" id="confirm_password">
                  <p id="msg" class="text-danger"></p>
                </div>
                <div class="mt-5">
                  <button type="submit">
                    Register
                  </button>
                </div>
              </div>
              @if(Session::has('error'))
                  <div class="alert alert-danger">
                    {{ @Session::get('error') }}
                  </div>

              @endif
              @if(Session::has('success'))
                  <div class="alert alert-success">
                   {{ @Session::get('success') }}
                  </div>

              @endif


            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
   
    function validPass()
    {
      var password = document.getElementById('password').value;
      var confirm_password = document.getElementById('confirm_password').value;
      // alert(password)
      if(password == confirm_password){

      }else{
        document.getElementById('msg').innerText = "Password mismatch";
        return false;
        
      }
    }
  </script>
  @endsection