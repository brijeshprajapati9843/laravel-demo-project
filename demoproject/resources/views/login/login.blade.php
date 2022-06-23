<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- loader -->
    <link href="css/loader.css" type="text/css" rel="stylesheet">
    <title>Login With Ajax</title>
</head>
<body>
 <div class="container">
    <div class="row">
        <h3 class="my-5">Login with Ajax</h3>
        <div class="col-sm-5">
        <div class="alert alert-danger mt-2 " id="error" style="display: none"></div>
            <div class="input-form mt-3">
            <label for="name">Email</label>
                <input type="text" id="email" class="form-control">
            </div>
            <div class="input-form mt-3">
            <label for="name">Password</label>
                <input type="password" id="password"  class="form-control">
            </div>

            <div class="row">
                <div class="col-sm-3">
                <div class="input-form mt-4">
                    <input type="button" id="btn" value="Login" class="btn btn-info">               
                </div>
                </div>
                <div class="col-sm-5">
                    <div class="loader mt-4" ></div>
                </div>
            </div>
            
        </div>
    </div>
 </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#btn').on('click',function(){
            $('.loader').show()
            $('#btn').hide()
            $email = $('#email').val()
            $password = $('#password').val()
         
            // console.log("name = "+$name+"email = "+$email+"password = "+$password);

            $.ajax({
                type : "post",
                url : "{{URL::to('/ajaxlogin')}}",
                data : {'email':$email,'password':$password ,'_token':'{{csrf_token()}}'},
                success : function(response){
                    // console.log(response);
                    if(response.redirect_url){
                        window.location = response.redirect_url;
                        // $('#success').text(response.success);
                        // $('#success').show();
                    }else{
                        $('#error').text(response.error);
                        $('#error').show();
                        $('.loader').hide()
                        $('#btn').show()
                    }
                                       
                }
            });
        });
    });
</script>
</body>
</html>