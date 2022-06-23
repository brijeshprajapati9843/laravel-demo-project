<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Register With Ajax</title>
</head>
<body>
 <div class="container">
    <div class="row">
        <h3 class="my-5">Register with Ajax</h3>
        <div class="col-sm-5">
            <div class="input-form">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="input-form mt-3">
            <label for="name">Email</label>
                <input type="text" id="email" class="form-control">
            </div>
            <div class="input-form mt-3">
            <label for="name">Password</label>
                <input type="password" id="password"  class="form-control">
            </div>
            <div class="input-form mt-3">
            <label for="name">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control">
            </div>
            <div class="input-form mt-5">
                <input type="button" id="btn" value="Register" class="btn btn-info">
            </div>
            <div class="alert alert-success mt-2 " id="success" style="display: none"></div>
            <div class="alert alert-danger mt-2 " id="error" style="display: none"></div>
        </div>
    </div>
 </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#btn').on('click',function(){
            $name = $('#name').val()
            $email = $('#email').val()
            $password = $('#password').val()
            $confirm_password = $('#confirm_password').val()

            
            // console.log("name = "+$name+"email = "+$email+"password = "+$password);

            $.ajax({
                type : "post",
                url : "{{URL::to('/ajaxregister')}}",
                data : {'name':$name,'email':$email,'password':$password,'confirm_password': $confirm_password ,'_token':'{{csrf_token()}}'},
                success : function(response){
                    if(response.success){
                        $('#success').text(response.success);
                        $('#success').show();
                    }else{
                        $('#error').text(response.error);
                        $('#error').show();
                    }
                                       
                }
            });
        });
    });
</script>
</body>
</html>