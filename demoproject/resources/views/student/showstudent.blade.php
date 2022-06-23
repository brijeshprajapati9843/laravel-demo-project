<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/backloader.css">

    <title>Document</title> 
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        #searchbox
        {
            outline: none;
            padding-left: 10px;
            width: 280px;
            height: 38px;
        }
    </style>   
</head>
<body>
<div class="loader" style = "margin-top: 300px; margin-bottom: 300px;" id="loader"></div>
    <div class="container">
        <div class="row ">
            <div class="col-sm-8">
                <h3 class="my-5">Show Student</h3>
            </div>
            <div class="col-sm-4 my-5">
                Search : <input type="search" name="search" id="searchbox"  >
            </div>
        
           <table id="table_id" class="table display text-center">
            <thead>
                <tr class="bg-dark text-light">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>Age</th>
                    <th>Department</th>
                </tr>
            </thead>
           
            <tbody>
            @if(count($data)>0)
            @foreach($data as $datas)           
                <tr> 
                    <td>{{ $datas->id }}</td>
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->phone }}</td>
                    <td>{{ $datas->age }}</td>
                    <td>{{ $datas->department }}</td>
                </tr>          
            @endforeach
            @else
                <tr>                    
                    <td class="text-danger" colspan="6">Records not Found</td>
                </tr>
            @endif
            </tbody>
            
           </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> -->
<script type="text/javascript">
    // function searchbox(){
    //     var searchbox = document.getElementById("searchbox").value;
    //     // alert(searchbox);
    //     console.log(searchbox)
    // }

    
        $('#searchbox').on('keyup',function(){
            $val = $(this).val();
            // console.log($val);
       

        $.ajax({
            type : 'get',
            url : "{{URL::to('search')}}",
            data : {'search': $val},
            success : function(data){
                $('tbody').html(data)
                
            }
        });
    });

</script>

<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    $(document).ready(function(){
        $('#loader').hide();
    });
    
</script>
</body>
</html>