<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>TROPIKO</title>
    
</head>
<body>
<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="" /><span>
              Tropiko
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
              @if(Session::has('login'))
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="{{url('fruits')}}"> Fruits</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('services')}}"> Services </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('show_user')}}"> Show User </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('contact')}}">Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('logout')}}">Logout</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('forgetpassword')}}">Forget Password</a>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="{{url('login')}}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('register')}}">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('reset_password')}}">Reset Password</a>
                </li>
               
                @endif
              </ul>
              
          </div>
        </nav>
      </div>
    </header>
    <main >
        @yield('content')
    </main>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
</body>
</html>