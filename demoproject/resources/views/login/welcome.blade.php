<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    @php
        $name = Session::get('name');
        
    @endphp
    <h1>Welcome : @php echo $name; @endphp </h1>
    
</body>
</html>