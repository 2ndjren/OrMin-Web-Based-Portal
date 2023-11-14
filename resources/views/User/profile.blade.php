@extends('layout.user.user_profile')
@section('profile')
<div class="font-semibold p-2 text-gray-600"><a href="{{url('/')}}"> BACK</a></div>

<div class="2xl:flex sm:block md:block lg:flex xl:flex mb-10  xl:space-x-5 h-full w-full">
  <div class="md:w-1/3  xl:w-1/3 sm:w-full p-10 bg-white shadow-md rounded-lg block space-y-5">

    <div class="flex justify-center">
      <img src="{{session('USER')['user_profile']}}" alt="" class="h-40 w-auto shadow">
    </div>

    <div class="text-xl text-gray-700 text-center font-bold">
      <p class="text-2xl"><i class="fa-solid fa-user"></i></p>
      <p> {{session('USER')['fname']}} {{session('USER')['lname']}}</p>
    </div>
    <div class=" p-2 bg-gray-100 font-bold  text-cyan-500">
      <p class="text-center">PERSONAL INFORMATION</p>
    </div>
    <div class="grid grid-cols-4 gap-3 text-sm">
      <div class="col-span-1  text-right text-gray-600">
        <p>Age:</p>
        <p>Gender:</p>
        <p>Birthday:</p>
        <p>Email:</p>
      </div>
      <div class="col-span-3 text-left">
        <p>{{session('USER')['age']}}</p>
        <p>{{session('USER')['gender']}}</p>
        <p>{{session('USER')['bday']}}</p>
        <p class="text-sm">{{session('USER')['email']}}</p>
      </div>
    </div>


    <div class="text-2xl flex justify-center items-center">
      <a class="text-red-500" href="{{url('logout')}}"><i class="fa-solid fa-right-to-bracket"></i> </a>
      <button type="button" class="text-cyan-500 ml-2"><i class="fa-solid fa-user-pen"></i> </button>
    </div>

  </div>


  <div class=" h-auto rounded-md-xl w-full my-10 xl:my-0 xl:mb-10">
    <div class="">
      <button id="appointment-container-btn" class="px-5 py-2  bg-blue-900 rounded-t-md text-white hover:border-b-4 hover:border-white  hover:bg-white hover:text-blue-900    "><i class="fa-solid fa-calendar-check"></i></button>
      <button id="volunteer-container-btn" class="px-5 py-2 bg-blue-900 rounded-t-md text-white hover:border-b-4 hover:border-white hover:bg-white hover:text-blue-900   "><i class="fa-solid fa-handshake-angle"></i> </button>
      <button id="blood-container-btn" class="px-5 py-2 bg-blue-900 rounded-t-md text-white hover:border-b-4 hover:border-white hover:bg-white hover:text-blue-900 "><i class="fa-solid fa-heart"></i> </button>
      <button id="membership-container-btn" class="px-5 py-2 bg-blue-900 rounded-t-md text-white hover:border-b-4 hover:border-white hover:bg-white hover:text-blue-900   "><i class="fa-solid fa-shield-halved"></i> </button>

    </div>

    {{-- APPOINTMENT --}}
    <div id="appointment-container" class=" rounded-r-xl  rounded-b-xl p-10 h-full bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-blue-900 font-bold text-xl">APPOINTMENT</p>
      </div>
      <div class="sm:block md:block lg:flex xl:flex 2xl:flex w-full h-5/6 pt-10">
        <div class="sm:w-full md:w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2 sm:h-auto md:h-auto  lg:border-r-2 xl:border-r-2 2xl:border-r-2 lg:border-gray-400 xl:border-gray-400 2xl:border-gray-400  lg:shadow-md  lg:h-full xl:h-full 2xl:h-full p-5 ">
          <div class="sm:h-auto md:h-auto lg:h-1/2 xl:h-1/2 2x:h-1/2   lg:shadow-md  xl:shadow-md 2xl:shadow-md py-2">
            <p class="text-sm font-bold text-cyan-500">MY MEETING</p>
            
            <div class="" id="My_Appointments">

            </div>

          </div>
          <div class=" sm:h-1/2 md:h-auto lg:h-1/2 xl:h-1/2 2x:h-1/2 py-2 sm:overflow-y-auto ">
            <p class="text-sm font-bold text-cyan-500">HISTORY</p>
            <table id="My_Appointments_History" class=" w-full text-left">
              <thead class="text-sm text-gray-600">
                <tr>
                  <th>DATE</th>
                  <th>STATUS</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>

          </div>

        </div>

        <div class="sm:w-1/2 md:w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2 sm:h-5/6  md:h-1/2 lg:h-full xl:h-full 2xl:h-full p-5 sm:mt-5 md:mt-5 ">
          <p class="text-sm font-bold text-cyan-500 mb-3">OCCUPIED SCHEDULES</p>
          <div id="Scheduled_Appointments" class="justify-center inline-block  space-y-4 ">
          </div>
        </div>
      </div>
    </div>


    {{-- VOLUNTEER --}}

    <div id="volunteer-container" class=" rounded-r-xl  rounded-b-xl p-10 h-full hidden bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-cyan-600 font-bold text-xl">VOLUNTEER</p>
      </div>


    </div>
    {{-- BLOOD --}}
    <div id="blood-container" class=" rounded-r-xl  rounded-b-xl p-10 h-full hidden bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-cyan-600 font-bold text-xl">BLOOD</p>
      </div>


    </div>
    {{-- MEMBERSHIP --}}
    <div id="membership-container" class=" rounded-r-xl  rounded-b-xl p-10 h-full hidden bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-cyan-600 font-bold text-xl">MEMBERSHIP PROGRAM</p>
      </div>
      <div id="membership-info" class="pt-10">
        {{-- <p class="text-sm font-bold text-cyan-500">Insurance</p> --}}


      </div>
    </div>


  </div>


</div>
</div>

<script>


</script>

@endsection