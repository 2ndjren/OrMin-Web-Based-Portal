<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Program</title>
</head>
<body>
    <div class="">
    <p>Congratulations</p>
    <p>{{$mail['message']}}</p>
    <p>Program: {{$mail['level']}}</p>
    <p>Validity:  {{$mail['validity']}}</p>
    <p>Status: {{$mail['status']}}</p>
    </div>
    
</body>
</html>