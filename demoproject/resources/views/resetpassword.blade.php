@extends('layouts.navbar')

@section('content')
<section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Reset Password
      </h2>
      <div class="row">
        <div class="col-md-6 mr-auto">
          <form action="{{ url('send-email') }}" method="POST">
            @csrf
            <div class="contact_form-container">
              <div>
                <div class="mt-3">
                  <input type="email" placeholder="Email" name="email" required>
                </div>
               
                <div class="my-5">
                  <button type="submit">
                    Send
                  </button>
                </div>
              </div>
               <!-- @if(Session::has('error'))
                  <div class="alert alert-danger col-6">
                    {{ @Session::get('error') }}
                  </div>

              @endif -->
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
 
  @endsection