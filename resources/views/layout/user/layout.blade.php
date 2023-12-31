<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

  <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">

</head>

<body class="">
  <div class="flex w-auto overflow-y-auto ">
    <div class="flex-wrap w-full xl:fixed">
      <div class="flex p-2 h-25 w-full bg-red-600  border-b-4 border-gray-400">

        @if (session('USER'))

        <nav class="w-screen">
          <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
              <!-- <img class="h-20" src="{{ asset('static/carrr.png') }}" alt="" /> -->
              <span class="self-center text-2xl font-bold text-white px-4">PRC ORMIN CHAPTER</span>
            </a>

            <button id="navbar-toggle" data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:text-red-800 hover:bg-white " aria-controls="navbar-dropdown" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
              </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
              <ul class="flex flex-col font-lg font-bold p-4 md:p-0 mt-4  md:flex-row md:space-x-14 md:mt-0">

                <li>
                  <a href="/" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">Home</a>
                </li>

                <li>
                  <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">Donate <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg></button>
                  <!-- Dropdown menu -->
                  <div id="dropdownNavbar" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-72 p4">

                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                      <li>
                        <a href="{{url('donate')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Raise Fund</a>
                      </li>

                      <li>
                        <a href="{{url('donate#blood')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Give Blood</a>
                      </li>
                    </ul>

                  </div>

                </li>


                <li>
                  <button id="dropdownButtonServices" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">Services <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg></button>
                  <!-- Dropdown menu -->
                  <div id="dropdownButtonServicesMenu" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-72 p4">

                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                      <li>
                        <a href="{{url('user/membership')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Membership</a>
                      </li>

                      <li>
                        <a href="{{url('user/training')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Seminars and Training</a>
                      </li>

                      <li>
                        <a href="{{url('user/volunteer')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Volunteer</a>
                      </li>

                    </ul>

                  </div>

                </li>

                <li>
                  <a href="#" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">About US</a>
                </li>

                <ul class="lg:flex"> <!-- Reduced space-x -->


                  <li class="px-2 ">
                  <a class="bg-blue-900 rounded-xl shadow-sm px-5 py-2 hover:bg-yellow-600 text-white " href="{{url('profile')}}">{{session('USER')['fname']}}</a>
                  </li>



                </ul>



              </ul>
            </div>
          </div>
        </nav>



        @else

        <nav class="w-screen">
          <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
              <!-- <img class="h-20" src="{{ asset('static/carrr.png') }}" alt="" /> -->
              <span class="self-center text-2xl font-bold text-white px-4">PRC ORMIN CHAPTER</span>
            </a>
            <button id="navbar-toggle" data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:text-red-600 hover:bg-white " aria-controls="navbar-dropdown" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
              </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
              <ul class="flex flex-col font-lg font-bold p-4 md:p-0 mt-4  md:flex-row md:space-x-14 md:mt-0">
                <li>
                  <a href="/" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">Home</a>
                </li>
                <li>
                  <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">Donate <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg></button>
                  <!-- Dropdown menu -->
                  <div id="dropdownNavbar" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-72 p4">

                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                      <li>
                        <a href="/signin" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Raise Fund</a>
                      </li>

                      <li>
                        <a href="/signin" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Give Blood</a>
                      </li>
                    </ul>

                  </div>

                </li>


                <li>
                  <button id="dropdownButtonServices" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">Services <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg></button>
                  <!-- Dropdown menu -->
                  <div id="dropdownButtonServicesMenu" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-72 p4">

                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                      <li>
                        <a href="/signin" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Membership</a>
                      </li>

                      <li>
                        <a href="/signin" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Seminars and Training</a>
                      </li>

                      <li>
                        <a href="/signin" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Volunteer</a>
                      </li>

                    </ul>

                  </div>

                </li>

                <li>
                  <a href="/signin" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-white hover:bg-white hover:text-red-700">About US</a>
                </li>

                <ul class="lg:flex"> <!-- Reduced space-x -->
                  <li class="mx-2">
                    <a href="/signin" class="flex items-center justify-between w-full p-4 bg-blue-800 hover:bg-white hover:text-blue-800 text-white font-bold rounded ">LOGIN</a>
                  </li>

                  <li class="mx-2">
                    <a href="/signup" class="flex items-center justify-between w-full p-4 bg-white hover:text-white hover:bg-red-800 text-red-800 font-bold rounded ">SIGNUP</a>

                  </li>

                </ul>



              </ul>
            </div>
          </div>
        </nav>


        @endif
      </div>

      <div class="">
        @include('layout.user.alerts')
        @include('layout.user.chat')
        @yield('home')
        @yield('appointment')
        @yield('announcement')
        @yield('donate')
        @yield('training')
        @yield('volunteer')
        @yield('membership')
        @yield('signup')




      </div>

  

    </div>


  </div>
  <!-- Include AOS JavaScript via CDN -->
  <script>
    $(document).ready(function() {

    });
  </script>

  
  <script>
    // JavaScript to toggle the mobile menu
    document.addEventListener('DOMContentLoaded', function() {
      const button = document.getElementById('navbar-toggle');
      const menu = document.getElementById('navbar-dropdown');

      const dropdownButton = document.getElementById('dropdownNavbarLink');
      const dropdownMenu = document.getElementById('dropdownNavbar');

      const dropdownButtonServices = document.getElementById('dropdownButtonServices');
      const dropdownButtonServicesMenu = document.getElementById('dropdownButtonServicesMenu');

      dropdownButton.addEventListener('click', () => {
        if (!dropdownButtonServicesMenu.classList.contains('hidden')) {
          dropdownButtonServicesMenu.classList.add('hidden');
        }
        dropdownMenu.classList.toggle('hidden');
      });

      dropdownButtonServices.addEventListener('click', () => {
        if (!dropdownMenu.classList.contains('hidden')) {
          dropdownMenu.classList.add('hidden');
        }
        dropdownButtonServicesMenu.classList.toggle('hidden');
      });

      button.addEventListener('click', function() {
        if (!dropdownMenu.classList.contains('hidden')) {
          dropdownMenu.classList.add('hidden');
        }
        if (!dropdownButtonServicesMenu.classList.contains('hidden')) {
          dropdownButtonServicesMenu.classList.add('hidden');
        }
        menu.classList.toggle('hidden');
      });
    });
  </script>


</body>

</html>