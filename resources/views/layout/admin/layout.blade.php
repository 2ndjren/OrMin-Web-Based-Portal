<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
  <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
  <script src="{{asset('js/datatable.js')}}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">


</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar with Red Theme Background -->
        <div class="w-64 bg-red-500 text-white p-4 hidden lg:flex flex-col items-center">
            <ul class="space-y-2">
                <li><a href="{{url('dashboard')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a></li>
                <li><a href="{{url('membership')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Membership
                </a></li>
                <li><a href="{{url('volunteers')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Volunteers
                </a></li>
                <li><a href="{{url('announcements')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Announcements
                </a></li>
                <li><a href="{{url('chats')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Chats
                </a></li>
              @if(session('ADMIN'))
              <li><a href="{{url('accounts')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-users mr-2"></i> Accounts
                </a></li>
              @endif
              <li><a href="{{url('logout')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Logout
                </a></li>
              
            </ul>
        </div>

        <!-- Mobile Sidebar (hidden by default) -->
        <div id="mobileSidebar" class="sm:w-80 md:w-72 lg:w-64 bg-red-500 text-white p-4 lg:hidden hidden">
            <ul class="space-y-2">
                <li><a href="{{url('dashboard')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a></li>
                <li><a href="{{url('membership')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Membership
                </a></li>
                <li><a href="{{url('volunteers')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Volunteers
                </a></li>
                <li><a href="{{url('announcements')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Announcements
                </a></li>
                <li><a href="{{url('chats')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Chats
                </a></li>
                @if(session('ADMIN'))
              <li><a href="{{url('accounts')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-users mr-2"></i> Accounts
                </a></li>
              @endif
              <li><a href="{{url('logout')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Logout
                </a></li>
        
            </ul>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-4 overflow-y-auto">
            <!-- Toggle Mobile Sidebar Button -->
            <button id="sidebarToggle" class="lg:hidden block text-black text-2xl focus:outline-none p-3 rounded-full">&#9776;</button>
           @yield('dashboard')
           @yield('membership')
           @yield('volunteers')
           @yield('announcements')
           @yield('chats')
           @yield('accounts')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sidebarToggle").click(function() {
                $("#mobileSidebar").toggleClass("hidden");
            });

            // Show/hide sections
            $(".content-section").hide();
            $("#dashboard").show();

            $(".block").click(function() {
                $(".content-section").hide();
                const target = $(this).data("target");
                $(`#${target}`).show();
            });
        });
    </script>
</body>
</html>