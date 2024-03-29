<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.tailwindcss.com"></script>
    
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
        <script src="{{asset('js/datatable.js')}}"></script>
    
    
        <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    
    
</head>


<body class="bg-gray-100 font-sans">
<header class="flex justify-between items-center bg-gray-50 text-gray-900 p-3 border-b-2 border-gray-300">
                <!-- Header content -->
                <h1 class="font-bold text-black px-4">PRC MINDORO ORIENTAL CHAPTER <span class="text-gray-500 font-normal">| Always first, Always ready, Always there.</span></h1>

                <!-- Dropdown for account settings -->
                <div class="bg-green-500 p-3">
                    <button class="flex items-center fonr-bold text-xs text-white hover:text-gray-900 focus:outline-none">
                        @if(session('ADMIN'))
                        <span class="mr-1">{{session('ADMIN')['fname']}}</span>

                        @elseif (session('STAFF'))
                        <span class="mr-1">{{session('STAFF')['fname']}}</span>

                        @else
                        <span class="mr-1">'RED CROSS'</span>
                        @endif

                    </button>

                </div>
            </header>
            
    <div class="flex h-screen">

       <aside class="w-64 text-white hidden fixed flex-shrink-0 lg:flex flex-col items-center relative bg-cover bg-center overflow-y-auto" style="background-image: url('static/user/home/sidebar.jpg');">

            <div class="border-b-2 border-gray-300 w-full text-xl p-4 flex flex-col items-center">
                <img src="{{asset('static/user/home/logo.png')}}" alt="" width="100" />

                @if(session('ADMIN'))
                <h2 class="text-center font-bold">ADMINISTRATOR</h2>
                @elseif(session('STAFF'))
                <h2 class="text-center font-bold">STAFF</h2>
                @else
                <h2 class="text-center font-bold">RED CROSS</h2>
                @endif
            </div>


            <ul class="space-y-2 p-2">
                <li><a href="{{url('dashboard')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-2 rounded-full flex items-center">
                        <i class="fas fa-tachometer-alt mr-2"></i> <span>Dashboard</span>
                    </a></li>
                <li><a href="{{url('membership')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-2 rounded-full flex items-center">
                        <i class="fa-solid fa-users mr-2"> </i> <span>Membership</span>
                    </a></li>
                <li><a href="{{url('volunteers')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-2 rounded-full flex items-center">
                        <i class="fa-solid fa-handshake-angle mr-2"></i> <span>Volunteers</span>
                    </a></li>
                @if(session('ADMIN'))
                <li><a href="{{url('donations')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-2 rounded-full flex items-center">
                        <i class="fa-solid fa-hand-holding-dollar mr-2"></i> <span>Donations</span>
                    </a></li>
                @endif
                <li><a href="{{url('announcements')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-2 rounded-full flex items-center">
                        <i class="fa-solid fa-bullhorn mr-2"></i> <span>Announcements</span>
                    </a></li>

       

                    <li><a href="{{url('feedbacks')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-2 rounded-full flex items-center">
                        <i class="fa-solid fa-comments mr-2"></i> <span>Feedback</span>
                    </a></li>
                <li><a href="{{url('appointments')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-2 rounded-full flex items-center">
                <i class="fa-solid fa-calendar-check mr-2"></i> <span>Appointments</span>
                    </a></li>
                <li><a href="{{url('chats')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                        <i class="fa-regular fa-message mr-2"></i> <span>Chats</span>
                    </a></li>
                <li><a href="{{url('blood')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                        <i class="fa-solid fa-droplet mr-2"></i> <span>Blood</span>
                    </a></li>
                @if(session('ADMIN'))
                <li><a href="{{url('accounts')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                        <i class="fas fa-users mr-2"></i> Accounts
                    </a></li>
                @endif
                <li><a href="{{url('logout')}}" class="block hover:bg-red-600 mt-40 mb-10  hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> <span>Logout</span>
                    </a></li>

            </ul>
        </aside>

        <!-- Main content area -->
        <div class="flex-1 overflow-y-auto">
            <!-- Header -->
          


            <!-- Mobile Sidebar (hidden by default) -->
            <div id="mobileSidebar" class="sm:w-80 md:w-72 lg:w-64 bg-red-500 text-white p-4 lg:hidden hidden">
                <ul class="space-y-2">
                    <li><a href="{{url('dashboard')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full">
                            <i class="fas fa-tachometer-alt mr-2"></i> <span>Dashboard</span>
                        </a></li>
                    <li><a href="{{url('membership')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-users mr-2"></i> <span>Membership</span>
                        </a></li>
                    <li><a href="{{url('volunteers')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-handshake-angle mr-2"></i> <span>Volunteers</span>
                        </a></li>
                    @if(session('ADMIN'))
                    <li><a href="{{url('donations')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-hand-holding-dollar mr-2"></i> <span>Donations</span>
                        </a></li>
                    @endif
                    <li><a href="{{url('announcements')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-bullhorn mr-2"></i> <span>Announcements</span>
                        </a></li>
                        <li><a href="{{url('feedbacks')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-comments  mr-2"></i> <span>Feedback</span>
                        </a></li>
                    <li><a href="{{url('appointments')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-bullhorn mr-2"></i> <span>Appointments</span>
                        </a></li>
                    <li><a href="{{url('chats')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-regular fa-message mr-2"></i> <span>Chats</span>
                        </a></li>
                    <li><a href="{{url('blood')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-droplet mr-2"></i> <span>Blood</span>
                        </a></li>
                    @if(session('ADMIN'))
                    <li><a href="{{url('accounts')}}" class="block hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fas fa-users mr-2"></i> <span>Accounts</span>
                        </a></li>
                    @endif
                    <li><a href="{{url('logout')}}" class="block mt-40 mb-10 hover:bg-red-600 hover:text-white transition-all duration-200 ease-in-out p-3 rounded-full flex items-center">
                            <i class="fa-solid fa-right-from-bracket mr-2"> </i> <span>
                                Logout</span>
                        </a></li>

                </ul>
            </div>

            <!-- Content Area -->
            <div class="p-4">

                <!-- Toggle Mobile Sidebar Button -->
                <button id="sidebarToggle" class="lg:hidden block text-black text-2xl focus:outline-none p-3 rounded-full">&#9776;</button>
                @yield('dashboard')
                @yield('membership')
                @yield('volunteers')
                @yield('blood')
                @yield('donations')
                @yield('announcements')
                @yield('appointments')
                @yield('feedbacks')
                @yield('chats')
                @yield('accounts')
            </div>
        </div>
    </div>

  


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
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