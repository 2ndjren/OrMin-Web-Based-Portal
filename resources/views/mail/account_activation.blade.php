<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Verify Account</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="flex h-screen w-screen justify-center">
    <div class="">

        <p>Thank you for registering on our website. Please click the link to verify your account.</p>
        <a class="px-10 py-2 bg-cyan-500 text-white hover:bg-cyan-600" href="{{url('verify',['token'=> $mail['token']])}}">Click here</a>
    </div>
  </div>
</body>
</html>