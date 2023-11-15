<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-OrMinRC | {{session('USER')['fname']}} {{session('USER')['lname']}} | Profile </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/profile.js')}}"></script>
  <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">
</head>
<body>
    <div class="flex h-screen w-screen fixed bg-gray-200 ">
   
        <div class="block h-full w-full ">
            <div class="w-full h-10 bg-red-500 shadow-lg"></div>
            <div class=" p-10 h-full w-full overflow-y-auto ">
                @yield('profile')
            </div>
        </div>
        
    </div>

<script>
    $(document).ready(function () {
        UserAccountSetting()
    });

    function UserAccountSetting(){
       $('#user-profile-setting-btn').click(function (e) { 
        e.preventDefault();
        $('#user-profile-setting-modal').removeClass('hidden');
        $('#user-profile-setting-modal').addClass('block');
       });
       $('#account-setting-close-btn').click(function (e) { 
      e.preventDefault();
      $('#user-profile-setting-modal').removeClass('block');
      $('#user-profile-setting-modal').addClass('hidden');
    });
    }
</script>
    
</body>
</html>