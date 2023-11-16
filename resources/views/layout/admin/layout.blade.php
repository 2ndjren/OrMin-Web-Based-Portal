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

    <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">


</head>

<body class="bg-gray-100">
    <div class="flex h-screen">

        <aside class="w-64 text-white hidden fixed flex-shrink-0 lg:flex flex-col items-center relative bg-cover bg-center" style="background-image: url('static/admin/sidebar.jpg')">

            <div class="border-b-2 border-gray-300 w-full flex flex-col items-center">
                <img class="h-20" src="https://redcross.org.ph/wp-content/themes/yootheme/cache/logo-968682b9.png" alt="Logo">
                <h2 class="text-center pb-4 font-semibold">ADMINISTRATOR</h2>
            </div>

            <ul class="space-y-2 p-4">
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
        </aside>

        <!-- Main content area -->
        <div class="flex-1 p-4 overflow-y-auto">
            <!-- Header -->
            <header class="flex justify-between items-center bg-gray-50 text-gray-900 p-4 border-b-2 border-gray-300">
                <!-- Header content -->
                <h1 class="font-semibold text-blue-800">RED CROSS ORMIN PORTAL</h1>

                <!-- Dropdown for account settings -->
                <div class="bg-blue-800 p-2">
                    <button class="flex items-center fonr-bold text-xs text-white hover:text-gray-900 focus:outline-none">
                        <span class="mr-1">{{session('ADMIN')['fname']}}</span>

                    </button>

                </div>
            </header>
      

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
        <div class="p-6">

            <!-- Toggle Mobile Sidebar Button -->
            <button id="sidebarToggle" class="lg:hidden block text-black text-2xl focus:outline-none p-3 rounded-full">&#9776;</button>
            @yield('dashboard')
            @yield('membership')
            @yield('volunteers')
            @yield('announcements')
            @yield('chats')
            @yield('accounts')
            </div>

        </main>
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