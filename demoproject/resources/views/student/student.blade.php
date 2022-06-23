<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <title>Document</title> 
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>   
</head>
<body>
    <div class="container">
        <div class="row ">
        <h3 class="my-5">Add Student</h3>
        <div class="col-sm-5 ">
            <form action="{{url('add-student')}}" method="POST">
                @csrf
            <label for="name">Name</label>
            <div class="input-form mb-3">
                <input type="text" class="form-control @error ('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                @error('name')  
                    <span class="alert text-danger">{{ $message }}</snap>
                @enderror
            </div>
           
            <label for="email">Email</label>
            <div class="input-form mb-3">
                <input type="text" class="form-control  @error ('email') is-invalid @enderror" name="email"  value="{{ old('email') }}">
                @error('email')  
                    <span class="alert text-danger">{{ $message }}</snap>
                @enderror
            </div>
            <label for="phone">Phone no</label>
            <div class="input-form mb-3">
                <input type="number" class="form-control  @error ('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                @error('phone')  
                    <span class="alert text-danger">{{ $message }}</snap>
                @enderror
            </div>
            <label for="age">Age</label>
            <div class="input-form mb-3">
                <input type="text" class="form-control  @error ('age') is-invalid @enderror" name="age" value="{{ old('age') }}">
                @error('age')  
                    <span class="alert text-danger">{{ $message }}</snap>
                @enderror
            </div>
            <label for="department">Department</label>
            <div class="input-form mb-3">
                <input type="text" class="form-control  @error ('department') is-invalid @enderror" name="department" value="{{ old('department') }}">
                @error('department')  
                    <span class="alert text-danger">{{ $message }}</snap>
                @enderror
            </div>
            <div class="mb-2">
                <input type="submit" class="btn btn-danger text-light">
            </div>
            
            </form>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
        </div>
        
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>