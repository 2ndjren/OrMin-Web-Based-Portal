<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red Cross Membership Program</title>
</head>
<body>

    <p>Hello</p>
    @if ($mail['gender'] =="MALE")
        <p>Good day! Mr.{{$mail['fname']}}</p>
        <p>You can now recover your account by clicking the link button bellow.</p>
        <a href="{{url('recover/verify',['token'=>$mail['token']])}}">Click me</a>
    @else
        <p>Good day! Ms.{{$mail['fname']}}</p>
        <p>You can now recover your account by clicking the link button bellow.</p>
        <a href="{{url('recover/verify',['token'=>$mail['token']])}}">Click me</a>
    
    @endif
    
</body>
</html>