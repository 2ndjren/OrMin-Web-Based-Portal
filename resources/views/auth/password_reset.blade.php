<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <script src="{{asset('js/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">
</head>
<body>
    <form id="change-password-form" >
        @csrf
        <p>Password Reseting</p>
        <div id="password-reset-message" class="hidden w-full bg-blue-700 bg-opacity-20 rounded-sm ">
            <i id="password-reset-close-btn" class="fa-solid fa-xmark float-right pt-1 pr-1"></i>
            <p class="text-center w-full p-5" id="password-reset-response-message"></p>
          </div>
        <input type="hidden" value="{{session('token')}}" name="token">
        <input id="password" type="password" name="password" placeholder="Put your new password here!">
        <button class="bg-green-500 text-white p-3" type="submit" >Reset Password</button>
        <a class="underline text-blue-500" href="{{url('signin')}}">Go sign in</a>
    </form>
    <script>
        $(document).ready(function () {
            Password_Reset_Recovery()
        });
        function Password_Reset_Recovery(){
        $('#change-password-form').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "{{url('change-password')}}",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    console.log(response.failed);
                  
                    if(response.success){
                        $('password-reset-message').removeClass('hidden')
                    $('password-reset-message').addClass('block')
                        $('#password-reset-response-message').text(response.success)
                        $('#password').val("")
                    }
                    else{
                        $('password-reset-message').removeClass('hidden')
                    $('password-reset-message').addClass('block')
                        $('#password-reset-response-message').text(response.failed)
                    }
                }
            });
            
            
        });
        }
    </script>
</body>
</html>