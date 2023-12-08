@extends('layout.admin.layout')
@section('membership')
<title>Insurance</title>
<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Membership</p>
  <div class="flex justify-end">
    <button type="button" id="open-create-membership-modal" class="p-3 rounded-md bg-green-600 font-semibold text-white">Create Membership</button>
  </div>
</div>

<div class="h-screen  px-10">


  <div class="bg-white rounded-md w-full overflow-x-auto p-5 space-y-2">
    <div class="">
      <button id="activated-membership-btn" class="p-2 rounded-md text-white bg-green-500">Ongoing</button>
      <button id="pending-membership-btn" class="p-2 rounded-md text-white bg-green-500">Applications</button>
      <button id="other-membership-btn" class="p-2 rounded-md text-white bg-green-500">More</button>
    </div>
    <div id="membership-accounts-table" class="block w-full">

    </div>

    <div class="">
      <div class="w-full">
        <p class="font-semibold text-gray-500">Program Legend</p>
        <div class="flex space-x-2">
          <div class="">
            <p>Classic</p>
            <p class="p-2 bg-blue-500"></p>
          </div>
          <div class="">
            <p>Bronze</p>
            <p class="p-2 bg-yellow-900"></p>
          </div>
          <div class="">
            <p>Silver</p>
            <p class="p-2 bg-gray-500"></p>
          </div>
          <div class="">
            <p>Gold</p>
            <p class="p-2 bg-yellow-500"></p>
          </div>
          <div class="">
            <p>Platinum</p>
            <p class="p-2 bg-red-500"></p>
          </div>
          <div class="">
            <p>Senior</p>
            <p class="p-2 bg-green-500"></p>
          </div>
          <div class="">
            <p>Senior Plus</p>
            <p class="p-2 bg-purple-600"></p>
          </div>
        </div>
      </div>
      @if(session('ADMIN'))
      <div class=" flex justify-end space-x-2">



        <button id="open-import-modal-form-btn" class="p-2 rounded-lg bg-blue-500 text-white font-semibold " type="button">Import Data</button>

        <button id="open-export-modal-form-btn" class="p-2 rounded-lg bg-green-500 text-white font-semibold " type="button">Export Data</button>
        <button id="open-reports-modal-form-btn" class="p-2 rounded-lg bg-red-500 text-white font-semibold " type="button">Print</button>
      </div>
      @endif

    </div>
  </div>

</div>



<div id="create-membership-account-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-70 ">
  <div class="modal-container bg-white sm:w-full lg:w-3/5 mx-auto rounded-lg shadow-lg ">
    <header class="border-b-2 border-gray-500 relative bg-cover bg-center" style="background-image: url('https://t3.ftcdn.net/jpg/04/42/06/34/360_F_442063430_OjLo5sHK0twuUk2hCGWpjLphEHiLcamL.jpg');">

      <div class="container mx-auto p-2 text-center relative">
        <!-- Logo positioned on top center of the header -->
        <img src="{{asset('static/user/home/logo.png')}}" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-20">

        <h1 class="mt-6 text-xl text-white font-bold">PRC MINDORO ORIENTAL CHAPTER</h1>
        <p class="text-white text-sm font-semibold">JP RIZAL, CAPITOL COMPLEX, CALAPAN CITY</p>
      </div>
    </header>

    <div class="h-96 p-4 overflow-y-auto">
      <h2 class="text-2xl font-semibold text-blue-800">Add New Record</h2>
      <div class="p-2 border border-green-500 bg-green-500 bg-opacity-10 rounded-md hidden" id="success">
        <p id="success-message" class="text-center text-blue-500"></p>
      </div>

      <div class="p-2 border border-red-500 bg-red-500 bg-opacity-10 rounded-md hidden" id="failed">
        <p id="failed-message" class="text-center text-blue-500"></p>
      </div>
      <form id="create-membership-account" enctype="multipart/form-data">
        @csrf
        <input id="id" name="id" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="hidden">

        <div class="flex space-x-2">
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">First Name</label>
            <input id="fname" name="fname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Middle Name</label>
            <input id="mname" name="mname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Last Name</label>
            <input id="lname" name="lname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
        </div>
        <div class="flex space-x-2">
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Birthday</label>
            <input id="birthday" name="birthday" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date">
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Age</label>
            <input id="age" name="age" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Gender</label>
            <div class="relative">
              <select id="gender" name="gender" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                <option value="">Select </option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>


              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Blood Type</label>
            <div class="relative">
              <select id="blood_type" name="blood_type" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                <option value="">Select </option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="flex space-x-2">
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Municipality/City</label>
            <div class="relative">
              <select id="municipality" name="municipality" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Baco">Baco</option>
                <option value="Bansud">Bansud</option>
                <option value="Bongabong">Bongabong</option>
                <option value="Bulalacao">Bulalacao</option>
                <option value="Calapan">Calapan</option>
                <option value="Gloria">Gloria</option>
                <option value="Mansalay">Mansalay</option>
                <option value="Naujan">Naujan</option>
                <option value="Pinamalayan">Pinamalayan</option>
                <option value="Pola">Pola</option>
                <option value="Puerto Galera">Puerto Galera</option>
                <option value="Roxas">Roxas</option>
                <option value="San Teodoro">San Teodoro</option>
                <option value="Socorro">Socorro</option>
                <option value="Victoria">Victoria</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Barangay</label>
            <input id="barangay" name="barangay" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Street</label>
            <input id="barangay_street" name="barangay_street" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>

        </div>
        <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Mebership ID</label>
          <input id="mem_id" name="mem_id" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
        </div>
        <div class="flex space-x-2">
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Program</label>
            <div class="relative">
              <select id="level" name="level" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Classic">Classic</option>
                <option value="Bronze">Bronze</option>
                <option value="Silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
                <option value="Senior">Senior</option>
                <option value="Senior Plus">Senior Plus</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Amount</label>
            <input id="amount" name="amount" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Program Status</label>
            <div class="relative">
              <select id="status" name="status" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Pending">Pending</option>
                <option value="Activated">Activated</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center  px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>

        </div>
        <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Email</label>
          <input id="email" name="email" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email">
        </div>
        <div class="flex space-x-2">
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Type of Payment</label>
            <div class="relative">
              <select id="type_of_payment" name="type_of_payment" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Gcash">Gcash</option>
                <option value="Paymaya">Paymaya</option>
                <option value="Bank Transfer">Bank Transfer</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Proof of Payment</label>
            <input id="proof_of_payment" name="proof_of_payment" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file">
          </div>


        </div>

        <div class="mt-6 flex justify-end">
          <button id="close-create-membership-modal" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
          <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
            <div>Save </div>
            <div id="spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div>
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- ///// -->

<div id="membership-account-profile-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-70 ">
  <div class="modal-container bg-white sm:w-full lg:w-3/5 mx-auto rounded-lg shadow-lg ">
    <header class="border-b-2 border-gray-500 relative bg-cover bg-center" style="background-image: url('https://t3.ftcdn.net/jpg/04/42/06/34/360_F_442063430_OjLo5sHK0twuUk2hCGWpjLphEHiLcamL.jpg');">

      <div class="container mx-auto p-2 text-center relative">
        <!-- Logo positioned on top center of the header -->
        <img src="{{asset('static/user/home/logo.png')}}" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-20">

        <h1 class="mt-6 text-xl text-white font-bold">PRC MINDORO ORIENTAL CHAPTER</h1>
        <p class="text-white text-sm font-semibold">JP RIZAL, CAPITOL COMPLEX, CALAPAN CITY</p>
      </div>
    </header>
    <div id="membership-account-profile" class="flex p-4"></div>
    <div id="membership-account-profile-btns" class="flex justify-end p-4"></div>

  </div>
</div>

<!-- //// -->

<div id="show-membership-account-payment-modal" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg ">
    <div id="membership-account-payment" class="block"></div>

  </div>
</div>



<!-- Print Modal  -->
<div id="create-report-print-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-70 ">
  <div class="modal-container bg-white sm:w-full lg:w-3/5 mx-auto rounded-lg shadow-lg ">
    <header class="border-b-2 border-gray-500 relative bg-cover bg-center" style="background-image: url('https://t3.ftcdn.net/jpg/04/42/06/34/360_F_442063430_OjLo5sHK0twuUk2hCGWpjLphEHiLcamL.jpg');">

      <div class="container mx-auto p-2 text-center relative">
        <!-- Logo positioned on top center of the header -->
        <img src="{{asset('static/user/home/logo.png')}}" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-20">

        <h1 class="mt-6 text-xl text-white font-bold">PRC MINDORO ORIENTAL CHAPTER</h1>
        <p class="text-white text-sm font-semibold">JP RIZAL, CAPITOL COMPLEX, CALAPAN CITY</p>
      </div>
    </header>

    <div class="p-4">
      <div class="mb-4 w-full p-4 ">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Print</label>
        <div class="relative">
          <select id="to_print" name="to_print" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select </option>
            <option value="Sales Report">Sales Report</option>
            <option value="Membership Data">Membership Data</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
            </svg>
          </div>
        </div>

      </div>


      <div class=" hidden mb-4 w-full " id="selection_to_print">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Sales to Print</label>
        <div class="relative">
          <select id="type_of_sales_to_print" name="type_of_sales_to_print" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select </option>
            <option value="Annual">Annual</option>
            <option value="Monthly">Monthly</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
            </svg>
          </div>
        </div>

      </div>


      <div id="annual_sales_report" class="hidden">
        <form id="check_print_results_for_annual_sales">
          @csrf
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What year?</label>
            <div class="relative">
              <select id="annual_report" name="annual_report" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mt-6 flex justify-end">
            <button class="close-create-print-modal bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
            <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
              <div>Proceed </div>
              <div id="spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div>
            </button>
          </div>
        </form>
      </div>

      <div id="monthly_sales_report" class="hidden">
        <form id="check_print_results_for_monthly_sales">
          @csrf
          <div class="Monthly">
            <div class="mb-4 w-full " id="Annual">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What Month?</label>
              <div class="relative">
                <select id="monthly_sales_month" name="monthly_sales_month" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  <option value="">Select </option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">Decemebr</option>

                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                  </svg>
                </div>
              </div>

            </div>
            <div class="mb-4 w-full " id="Annual">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What year?</label>
              <div class="relative">
                <select id="monthly_sales_year" name="monthly_sales_year" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  <option value="">Select </option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                  </svg>
                </div>
              </div>

            </div>
          </div>
          <div class="mt-6 flex justify-end">
            <button class="close-create-print-modal bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
            <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
              <div>Proceed </div>
              <div id="spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div>
            </button>
          </div>
        </form>

      </div>
      <div id="membership_data" class="hidden">
        <div class="mb-4 w-full " id="membership_type_of_data_to_print">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Type of data to print?</label>
          <div class="relative">
            <select id="type_of_data_to_print" name="type_of_data_to_print" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              <option value="">Select </option>
              <option value="program">Per program</option>
              <option value="municipality">Per municipality</option>
              <option value="barangay">Per barangay</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
              </svg>
            </div>
          </div>

        </div>
        <form id="per_program_to_print_form" class="hidden">
          @csrf
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Program</label>
            <div class="relative">
              <select id="level" name="level" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Classic">Classic</option>
                <option value="Bronze">Bronze</option>
                <option value="Silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
                <option value="Senior">Senior</option>
                <option value="Senior Plus">Senior Plus</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What year?</label>
            <div class="relative">
              <select id="year" name="year" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mt-6 flex justify-end">
            <button class="close-create-print-modal bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
            <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
              <div>Proceed </div>
              <div id="spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div>
            </button>
          </div>
        </form>
        <form id="per_muncipality_to_print_form" class="hidden">
          @csrf
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What Municipality/City?</label>
            <div class="relative">
              <select id="municipality" name="municipality" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Baco">Baco</option>
                <option value="Bansud">Bansud</option>
                <option value="Bongabong">Bongabong</option>
                <option value="Bulalacao">Bulalacao</option>
                <option value="Calapan">Calapan</option>
                <option value="Gloria">Gloria</option>
                <option value="Mansalay">Mansalay</option>
                <option value="Naujan">Naujan</option>
                <option value="Pinamalayan">Pinamalayan</option>
                <option value="Pola">Pola</option>
                <option value="Puerto Galera">Puerto Galera</option>
                <option value="Roxas">Roxas</option>
                <option value="San Teodoro">San Teodoro</option>
                <option value="Socorro">Socorro</option>
                <option value="Victoria">Victoria</option>
              </select>

              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What year?</label>
            <div class="relative">
              <select id="year" name="year" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mt-6 flex justify-end">
            <button class="close-create-print-modal bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
            <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
              <div>Proceed </div>
              <div id="spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div>
            </button>
          </div>
        </form>
        <form id="per_barangay_to_print_form" class="hidden">
          @csrf

          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What Municipality/City?</label>
            <div class="relative">
              <select id="municipality" name="municipality" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Baco">Baco</option>
                <option value="Bansud">Bansud</option>
                <option value="Bongabong">Bongabong</option>
                <option value="Bulalacao">Bulalacao</option>
                <option value="Calapan">Calapan</option>
                <option value="Gloria">Gloria</option>
                <option value="Mansalay">Mansalay</option>
                <option value="Naujan">Naujan</option>
                <option value="Pinamalayan">Pinamalayan</option>
                <option value="Pola">Pola</option>
                <option value="Puerto Galera">Puerto Galera</option>
                <option value="Roxas">Roxas</option>
                <option value="San Teodoro">San Teodoro</option>
                <option value="Socorro">Socorro</option>
                <option value="Victoria">Victoria</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>

          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">What barangay?</label>
            <input id="barangay" name="barangay" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">What year?</label>
            <div class="relative">
              <select id="year" name="year" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mt-6 flex justify-end">
            <button class="close-create-print-modal bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
            <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
              <div>Proceed </div>
              <div id="spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div>
            </button>
          </div>
        </form>


      </div>
      <div class="mt-6 flex justify-end">
        <button id="close-closebtn" class="close-create-print-modal bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>

      </div>
    </div>
  </div>
</div>

<div id="export-data-form-modal" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/3 mx-auto rounded-lg shadow-lg ">
    <header class="border-b-2 border-gray-500 relative bg-cover bg-center" style="background-image: url('https://t3.ftcdn.net/jpg/04/42/06/34/360_F_442063430_OjLo5sHK0twuUk2hCGWpjLphEHiLcamL.jpg');">

      <div class="container mx-auto p-2 text-center relative">
        <!-- Logo positioned on top center of the header -->
        <img src="{{asset('static/user/home/logo.png')}}" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-20">

        <h1 class="mt-6 text-xl text-white font-bold">PRC MINDORO ORIENTAL CHAPTER</h1>
        <p class="text-white text-sm font-semibold">JP RIZAL, CAPITOL COMPLEX, CALAPAN CITY</p>
      </div>
    </header>

    <div class="p-4">
      <div id="membership-account-payment" class="block  p-3">
        <form id="membership-export-data-form">
          @csrf
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Program</label>
            <div class="relative">
              <select id="level" name="level" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Classic">Classic</option>
                <option value="Bronze">Bronze</option>
                <option value="Silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
                <option value="Senior">Senior</option>
                <option value="Senior Plus">Senior Plus</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Account Status</label>
            <div class="relative">
              <select id="status" name="status" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Activated">Activated</option>
                <option value="Pending">Pending</option>
                <option value="Declined">Declined</option>
                <option value="Expired">Expired</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Year</label>
            <div class="relative">
              <select id="year" name="year" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="2022">2024</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>


          </div>

          <div class="flex justify-end space-x-2">
            <button id="close-export-date-form-modal-btn" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Back</button>
            <button class="bg-green-500 font-semibold text-white p-2 rounded-md" type="submit">Proceed</button>
          </div>

        </form>
      </div>

    </div>

  </div>
</div>

<div id="import-data-form-modal" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/3 mx-auto rounded-lg shadow-lg ">
    <header class="border-b-2 border-gray-500 relative bg-cover bg-center" style="background-image: url('https://t3.ftcdn.net/jpg/04/42/06/34/360_F_442063430_OjLo5sHK0twuUk2hCGWpjLphEHiLcamL.jpg');">

      <div class="container mx-auto p-2 text-center relative">
        <!-- Logo positioned on top center of the header -->
        <img src="{{asset('static/user/home/logo.png')}}" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-20">

        <h1 class="mt-6 text-xl text-white font-bold">PRC MINDORO ORIENTAL CHAPTER</h1>
        <p class="text-white text-sm font-semibold">JP RIZAL, CAPITOL COMPLEX, CALAPAN CITY</p>
      </div>
    </header>

    <div class="p-4">


      <form id="importForm" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xlsx,.xls" required>

        <div class="flex justify-end space-x-2">
          <button id="close-import-modal-form-btn" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Back</button>

          <button class="bg-green-500 font-semibold text-white p-2 rounded-md" type="button" onclick="importExcel()">Import</button>
        </div>
      </form>
    </div>

  </div>

</div>


<div id="decline-membership-account-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg ">
    <div id="decline-membership-note" class="w-full">
      <p class="font-semibold">State your reason on the text box!</p>
      <form id="decline-membership-form">
        @csrf
        <input id="decline-id" type="text" name="id">
        <textarea placeholder="Write here..." class="border w-full" name="note" id="" cols="30" rows="5"></textarea>
        <div class="flex justify-end space-x-2">
          <button id="close-decline-membership-account-modal" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Cancel</button>
          <button class="bg-green-500 font-semibold text-white p-2 rounded-md" type="submit">Proceed</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Loading Page -->
<div id="loading-page" class="fixed inset-0 z-40 flex items-center justify-center bg-black bg-opacity-70 hidden">
  <!-- You can customize the loading animation or message here -->
  <div class="text-white text-2xl font-bold">Loading...</div>
</div>


<script>
  $(document).ready(function() {
    Membership_Profile()
    Membership_Navigation_Btn()
    Active_Membership()
    Create_Membership_Account()
    Decline_Membership_Form()
    Approve_Membership()
    Delete_Membership_Account()
    Export_Data()
    ToPrint()
    Process_Print_Data()
    // setInterval(() => {
    //   Account_To_Notified()
    // }, 5000);

    $.ajax({
      type: "GET",
      url: "/all-membership-account",
      data: "data",
      dataType: "json",
      success: function (response) {
        console.log(response)
      },

              error: function(xhr, status, error) {
          // Handle errors, if any
        console.log(xhr.responseText);
        }
    });
  });

  function Account_To_Notified() {
    $.ajax({
      type: "GET",
      url: "{{url('members-accounts')}}",
      data: "data",
      dataType: "json",
      success: function(check) {
        var today = new Date();
        var formattedDate = today.toISOString().split('T')[0];
        $.each(check.toexpire, function(index, field) {
          if (field.days_before_end === formattedDate && field.notified === '0') {
            $.ajax({
              type: "GET",
              url: "/notify-member/" + field.id,
              data: "data",
              dataType: "json",
              success: function(response) {
                console.log(response)
              },
              error: function(xhr, status, error) {
          // Handle errors, if any
          window.alert(xhr.responseText);
        }
            });
          }

        });
        $.each(check.expired, function (index, field) { 
          if(field.end_at===formattedDate && field.status==='ACTIVATED' && field.notified==='1') {
            $.ajax({
              type: "GET",
              url: "/notify-expired-account/" + field.id,
              data: "data",
              dataType: "json",
              success: function(response) {
                console.log("success")
              },
              error: function(xhr, status, error) {
          // Handle errors, if any
          window.alert(xhr.responseText);
        }
            });

          }  
        });

      }
    });
  }

  function ToPrint() {
    $('#to_print').change(function(e) {
      e.preventDefault();
      var selected = $(this).val();
      if (selected === 'Sales Report') {
        $('#selection_to_print').removeClass('hidden')
        $('#membership_data').addClass('hidden')
        $('#close-closebtn').removeClass('hidden')
        $('#type_of_sales_to_print').change(function(e) {
          e.preventDefault();
          var chosen = $(this).val();
          if (chosen === 'Annual') {
            $('#membership_data').addClass('hidden')


            $('#annual_sales_report').removeClass('hidden')
            $('#monthly_sales_report').addClass('hidden')
            $('#close-closebtn').addClass('hidden')
          } else if (chosen === 'Monthly') {
            $('#membership_data').addClass('hidden')

            $('#close-closebtn').addClass('hidden')
            $('#annual_sales_report').addClass('hidden')
            $('#monthly_sales_report').removeClass('hidden')


          } else {
            $('#membership_data').addClass('hidden')



            $('#annual_sales_report').addClass('hidden')
            $('#monthly_sales_report').addClass('hidden')
            $('#close-closebtn').removeClass('hidden')

          }


        });

      } else if (selected === 'Membership Data') {

        $('#membership_data').removeClass('hidden')
        $('#selection_to_print').addClass('hidden')

        $('#annual_sales_report').addClass('hidden')
        $('#monthly_sales_report').addClass('hidden')
        $('#close-closebtn').addClass('hidden')

        $('#type_of_data_to_print').change(function(e) {
          e.preventDefault();
          var chosen_data = $(this).val();
          if (chosen_data === 'program') {
            $('#per_program_to_print_form').removeClass('hidden')
            $('#per_muncipality_to_print_form').addClass('hidden')
            $('#per_barangay_to_print_form').addClass('hidden')

          } else if (chosen_data === 'municipality') {
            $('#per_program_to_print_form').addClass('hidden')
            $('#per_muncipality_to_print_form').removeClass('hidden')
            $('#per_barangay_to_print_form').addClass('hidden')

          } else if (chosen_data === 'barangay') {
            $('#per_program_to_print_form').addClass('hidden')
            $('#per_muncipality_to_print_form').addClass('hidden')
            $('#per_barangay_to_print_form').removeClass('hidden')
          } else {

          }

        });



      } else {

        $('#annual_sales_report').addClass('hidden')
        $('#membership_type_of_data_to_print').addClass('hidden')
        $('#monthly_sales_report').addClass('hidden')
        $('#close-closebtn').removeClass('hidden')

        $('#selection_to_print').addClass('hidden')
        $('#per_program_to_print_form').addClass('hidden')
        $('#per_muncipality_to_print_form').addClass('hidden')
        $('#per_barangay_to_print_form').addClass('hidden')

      }

    });
  }

  function Process_Print_Data() {
    $('#check_print_results_for_annual_sales').submit(function(e) {
      e.preventDefault();
      localStorage.removeItem('annual_report')
      localStorage.removeItem('monthly_report')
      localStorage.removeItem('ongoing_report')

      var formdata = new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')

      $.ajax({
        type: "POST",
        url: "{{url('annual-report-print')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {

            console.log(response.annual)
            alert(response.success)
            localStorage.setItem('annual_report', JSON.stringify(response.annual))
            localStorage.setItem('ongoing_report', 'annual')
            window.location.href = "{{url('print-view')}}"


          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });

    });
    $('#check_print_results_for_monthly_sales').submit(function(e) {
      e.preventDefault();
      localStorage.removeItem('annual_report')
      localStorage.removeItem('monthly_report')
      localStorage.removeItem('ongoing_report')


      var formdata = new FormData($(this)[0])
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('monthly-report-print')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {

            console.log(response.monthly)
            alert(response.success)
            localStorage.setItem('monthly_report', JSON.stringify(response.monthly))
            localStorage.setItem('ongoing_report', 'monthly')
            window.location.href = "{{url('print-view')}}"


          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });

    });
    $('#per_program_to_print_form').submit(function(e) {
      e.preventDefault();
      localStorage.removeItem('annual_report')
      localStorage.removeItem('monthly_report')
      localStorage.removeItem('ongoing_report')

      var formdata = new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('program-report-print')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {

            const Program = localStorage.setItem('membership_program_levels', JSON.stringify(response.program.level))
            const level_progam = localStorage.setItem('membership_programlevels', response.program.program)


            alert(response.success)
            localStorage.setItem('ongoing_report', 'membership_per_program')
            window.location.href = "{{url('print-view')}}"


          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
          var submit=$(this);
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });

    });
    $('#per_muncipality_to_print_form').submit(function(e) {
      e.preventDefault();
      localStorage.removeItem('annual_report')
      localStorage.removeItem('monthly_report')
      localStorage.removeItem('ongoing_report')

      var formdata = new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('municipality-report-print')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          if (response.success) {

            var muni = JSON.stringify(response.municipal_data.members)

            var Program = localStorage.setItem('municipality_records', muni)

            var level_progam = localStorage.setItem('municipal_name_data', response.municipal_data.municipality)

            alert(response.success)
            localStorage.setItem('ongoing_report', 'municipality_records')
            window.location.href = "{{url('print-view')}}"


          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });

    });
    $('#per_barangay_to_print_form').submit(function(e) {
      e.preventDefault();
      localStorage.removeItem('annual_report')
      localStorage.removeItem('monthly_report')
      localStorage.removeItem('ongoing_report')

      var formdata = new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('barangay-report-print')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {
            var mem_data = JSON.stringify(response.barangay_data.members)
            var Program = localStorage.setItem('barangay_records', mem_data)
            var muncipality = localStorage.setItem('municipality_name_data', response.barangay_data.municipality)
            var barangay = localStorage.setItem('barangay_name_data', response.barangay_data.barangay)
            alert(response.success)
            localStorage.setItem('ongoing_report', 'barangay_records')
            window.location.href = "{{url('print-view')}}"


          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });

    });

  }
  $('#open-reports-modal-form-btn').click(function(e) {
    e.preventDefault();
    $('#create-report-print-modal').removeClass('hidden')

  });
  $('.close-create-print-modal').click(function(e) {
    e.preventDefault();
    $('#close-closebtn').removeClass('hidden')
    $('#membership_data').addClass('hidden')
    $('#check_print_results_for_annual_sales')[0].reset()
    $('#check_print_results_for_monthly_sales')[0].reset()
    $('#annual_sales_report').addClass('hidden')
    $('#monthly_sales_report').addClass('hidden')
    $('#create-report-print-modal').addClass('hidden')



  });
  $('#open-create-membership-modal').click(function(e) {
    e.preventDefault();
    $('#create-membership-account-modal').removeClass('hidden')
    $('#create-membership-account-modal').addClass('block')

  });
  $('#open-export-modal-form-btn').click(function(e) {
    e.preventDefault();
    $('#export-data-form-modal').removeClass('hidden')
    $('#export-data-form-modal').addClass('block')

  });
  $('#open-import-modal-form-btn').click(function(e) {
    e.preventDefault();
    $('#import-data-form-modal').removeClass('hidden')
    $('#import-data-form-modal').addClass('block')

  });



  $('#close-export-date-form-modal-btn').click(function(e) {
    e.preventDefault();
    $('#membership-export-data-form')[0].reset()
    $('#export-data-form-modal').removeClass('block')
    $('#export-data-form-modal').addClass('hidden')

  });
  $(document).on('click', '#close-membership-profile-modal-btn', function() {
    $('#membership-account-profile').empty();
    $('#membership-account-profile-btns').empty();
    $('#membership-account-profile-modal').removeClass('block');
    $('#membership-account-profile-modal').addClass('hidden');
  });
  $(document).on('click', '#close-membership-payment', function() {
    $('#membership-account-payment').empty()
    $('#show-membership-account-payment-modal').removeClass('block')
    $('#show-membership-account-payment-modal').addClass('hidden')
  });
  $(document).on('click', '#close-decline-membership-account-modal', function() {
    $('#decline-membership-form')[0].reset()
    $('#decline-membership-account-modal').removeClass('block')
    $('#decline-membership-account-modal').addClass('hidden')
  });
  $(document).on('click', '.decline-membership-account-modal-btn', function() {
    var id = $(this).data('id')
    $('#decline-id').val(id)
    $('#decline-membership-account-modal').removeClass('hidden')

  });

  function Decline_Membership_Form() {
    $('#decline-membership-form').submit(function(e) {
      e.preventDefault();
      var formdata = new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('decline-membership')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {
            alert(response.success)
            $('#decline-membership-form')[0].reset()
            $('#decline-membership-account-modal').addClass('hidden')
          } else if (response.failed) {
            alert(response.failed)
          } else {
            alert('Network error!')
          }
        },
        error: function(xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });

    });
  }

  function Export_Data() {
    $('#membership-export-data-form').submit(function(e) {
      e.preventDefault();
      var formdata = new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('post-membership')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          if (response.success) {
            alert(response.success)
            window.location.href = "{{url('export-membership')}}"

          } else {
            alert(response.failed)

          }
        },
        error: function(xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });

    });
  }

  function Approve_Membership() {
    $(document).on('click', '.approve-membership-account-modal-btn', function() {
      var id = $(this).data('id')
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "GET",
        url: "/approve-membership/" + id,
        data: "data",
        dataType: "json",
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          if (response.success) {
            $('#membership-accounts-table').empty()
            Pending_Membership()
            alert(response.success)
          } else {
            alert(response.failed)
          }
        }
      });
    });
  }

  function Membership_Navigation_Btn() {
    $('#activated-membership-btn').click(function(e) {
      e.preventDefault();
      $('#membership-accounts-table').empty()
      Active_Membership()

    });
    $('#pending-membership-btn').click(function(e) {
      e.preventDefault();
      $('#membership-accounts-table').empty()
      Pending_Membership()


    });
    $('#other-membership-btn').click(function(e) {
      e.preventDefault();
      $('#membership-accounts-table').empty()
      Other_Membership()
    });

  }

  function Delete_Membership_Account() {
  $(document).on('click', '.delete-membership-account-profile-btn', function(e) {
    e.stopImmediatePropagation(); // Prevents multiple event bindings
    
    var id = $(this).data('id');
    var submit = $(this);
    
    if (submit.data('confirmed') === 'true') {
      submit.removeData('confirmed');
      return; // If already confirmed, exit the function
    }
    
    if (confirm('Are you sure you want to delete this record?')) {
      submit.data('confirmed', 'true'); // Set a flag that confirmation has been made
      
      submit.prop('disabled', true);
      submit.addClass('opacity-50 cursor-not-allowed');
      
      $.ajax({
        type: "GET",
        url: "/delete-membership-account-profile/" + id,
        data: "data",
        dataType: "json",
        success: function(response) {
          submit.prop('disabled', false);
          submit.removeClass('opacity-50 cursor-not-allowed');
          alert(response.success);
          $('#membership-account-profile').empty();
          $('#membership-account-profile-btns').empty();
          $('#membership-account-profile-modal').removeClass('block');
          $('#membership-account-profile-modal').addClass('hidden');

          // $('#activated-accounts').DataTable().ajax.reload(); // Assuming you're using DataTables

          
        }
      });
    }
  });
}




  function Delete_Other_Acount(others) {
    $(document).on('click', '.other-delete-membership-account-profile-btn', function() {
      var id = $(this).data('id');
      
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "GET",
        url: "/delete-membership-account-profile/" + id,
        data: "data",
        dataType: "json",
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          alert(response.success)
          $('#membership-account-profile').empty();
          $('#membership-account-profile-btns').empty();
          $('#membership-account-profile-modal').removeClass('block');
          $('#membership-account-profile-modal').addClass('hidden');
          others.ajax.reload()
        }
      });
    });
  }
  $(document).on('click', '#view-membership-payment-btn', function() {
    var id = $(this).data('id');
    var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
    $.ajax({
      type: "GET",
      url: "/membership-account-profile/" + id,
      data: "data",
      dataType: "json",
      success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
        var payment = "<img class='h-96 ' src='data:image/jpeg;base64,"+response.proof_of_payment+"'>"
        payment += "<div class='flex justify-end my-2'>"
        payment += "<button type='button' id='close-membership-payment' class='p-2 bg-gray-500 text-white rounded-md'>Close</button>"
        payment += "<div>"

        $('#membership-account-payment').append(payment)
        $('#show-membership-account-payment-modal').removeClass('hidden')
        $('#show-membership-account-payment-modal').addClass('block')
      }
    });
  });
  $('#close-create-membership-modal').click(function(e) {
    e.preventDefault();
    $('#failed').removeClass('block')
    $('#failed').addClass('hidden')
    $('#success').removeClass('block')
    $('#success').addClass('hidden')
    $('.form-inputs').removeClass('border-red-500')
    $('#create-membership-account')[0].reset();
    $('#create-membership-account-modal').removeClass('block')
    $('#create-membership-account-modal').addClass('hidden')

  });



  function Create_Membership_Account() {
    $('#create-membership-account').submit(function(e) {
      e.preventDefault();
      $('.form-inputs').removeClass('border-red-500')
      $('#failed').removeClass('block')
      $('#failed').addClass('hidden')
      $('#success').removeClass('block')
      $('#success').addClass('hidden')
      var formdata = new FormData($(this)[0]);
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: '{{url("create-membership-account")}}',
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          if (response.success) {
            $('#create-membership-account')[0].reset()
            $('#success-message').text(response.success)
            $('#membership-accounts-table').empty()
            Pending_Membership()
            alert(response.success)
          } else if (response.failed) {
            $('#spinner').addClass('hidden')

            $('#failed').removeClass('hidden')
            $('#failed').addClass('block')
            $('#failed-message').text(response.failed)
          } else {
            $('#spinner').addClass('hidden')

            $('#failed').removeClass('hidden')
            $('#failed').addClass('block')
            if (response.errors.email === "The email has already been taken.") {
              $('#failed-message').text(response.errors.email)
            } else {
              $('#failed-message').text('All fields are required!')
            }
            $.each(response.errors, function(field, errorMessage) {

              $('#' + field).addClass('border border-red-500');
            });
          }
        },
        error: function(xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(xhr.responseText);
        }
      });
    });
  }

  function Active_Membership() {
    var activated_table = "<table id='activated-accounts' class='stripe hover  w_full '>"
    activated_table += "<thead>"
    activated_table += "<tr>"
    activated_table += "<th>Name</th>"
    activated_table += "<th>Program</th>"
    activated_table += "<th>Validity</th>"
    activated_table += " <th>Action</th>"
    activated_table += " </tr>"
    activated_table += " </thead>"
    activated_table += " <tbody> "
    activated_table += " </tbody>"
    activated_table += " </table>"
    $('#membership-accounts-table').append(activated_table)
    let activated = new DataTable('#activated-accounts', {
      "responsive": true,
      "ajax": {
        "url": "/all-membership-account",
        "type": "GET",
        "dataSrc": "activated",
      },
      "columns": [{
          "data": null,
          "render": function(data, type, row) {
            console.log(data);
            return '<p class="text-gray-500 text-xs font-semibold">' + row.fname + ' '  + ' ' + row.lname + '</p>'
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            if (row.level === "CLASSIC") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-blue-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "BRONZE") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-orange-900 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SILVER") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-gray-400 p-2 ">' + row.level + '</span>'
            } else if (row.level === "GOLD") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-yellow-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "PLATINUM") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-red-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SENIOR") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-green-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SENIOR PLUS") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-purple-900 p-2 ">' + row.level + '</span>'
            }
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {

            var start = new Date(row.start_at);

var startday = start.getDate(); 
var startmonth = start.getMonth() + 1; 
var startyear = start.getFullYear(); 

var end = new Date(row.end_at);

var endday = end.getDate(); 
var endmonth = end.getMonth() + 1; 
var endyear = end.getFullYear(); 
var months = [
  "Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];
var startmon = months[startmonth - 1];
var endmon = months[endmonth - 1];

            return '<span class=" font-semibold text-xs  ">' +  startmon + ' ' + startday + ', ' + startyear + ' - ' + endyear + '</span>'
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<button class="membership-profile-modal-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Profile</button>';
          }
        }
      ],
    });
    Delete_Membership_Account(activated)

  }

  function Pending_Membership() {
    var pending_table = "<table id='pending-accounts' class='stripe hover  w_full '>"
    pending_table += "<thead>"
    pending_table += "<tr>"
    pending_table += "<th>Name</th>"
    pending_table += "<th>Program</th>"
    pending_table += "<th>Status</th>"
    pending_table += " <th>Action</th>"
    pending_table += " </tr>"
    pending_table += " </thead>"
    pending_table += " <tbody> "
    pending_table += " </tbody>"
    pending_table += " </table>"
    $('#membership-accounts-table').append(pending_table)
    let pending = new DataTable('#pending-accounts', {
      "responsive": true,
      "ajax": {
        "url": "/all-membership-account",
        "type": "GET",
        "dataSrc": "pending",
      },
      "columns": [{
          "data": null,
          "render": function(data, type, row) {
            return '<p class="text-gray-500 text-xs font-semibold">' + row.fname + ' ' + ' ' + row.lname + '</p>'
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            if (row.level === "CLASSIC") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-blue-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "BRONZE") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-orange-900 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SILVER") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-gray-400 p-2 ">' + row.level + '</span>'
            } else if (row.level === "GOLD") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-yellow-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "PLATINUM") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-red-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SENIOR") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-green-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SENIOR PLUS") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-purple-900 p-2 ">' + row.level + '</span>'
            }
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<span class=" font-semibold text-xs ">' + row.status + '</span>'
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            var actions = '<div class="flex space-x-2">'
            actions += '<button class="membership-profile-modal-btn text-sm font-semibold bg-yellow-500 rounded-md text-white p-2" data-id="' + row.id + '">Profile</button>';
            actions += '<button class="approve-membership-account-modal-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Approve</button>';
            actions += '<button class="decline-membership-account-modal-btn text-sm font-semibold bg-red-500 rounded-md text-white p-2" data-id="' + row.id + '">Declined</button>';
            actions += '</div>'
            return actions
          }
        }
      ],
    });
  }

  function Other_Membership() {
    var other_table = "<table id='other-accounts' class='stripe hover  w_full '>"
    other_table += "<thead>"
    other_table += "<tr>"
    other_table += "<th>Name</th>"
    other_table += "<th>Program</th>"
    other_table += "<th>Status</th>"
    other_table += " <th>Action</th>"
    other_table += " </tr>"
    other_table += " </thead>"
    other_table += " <tbody> "
    other_table += " </tbody>"
    other_table += " </table>"
    $('#membership-accounts-table').append(other_table)
    let others = new DataTable('#other-accounts', {
      "responsive": true,
      "ajax": {
        "url": "/all-membership-account",
        "type": "GET",
        "dataSrc": "others",
      },
      "columns": [{
          "data": null,
          "render": function(data, type, row) {
            return '<p class="text-gray-500 text-xs font-semibold">' + row.fname + ' '  + ' ' + row.lname + '</p>'
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            if (row.level === "CLASSIC") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-blue-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "BRONZE") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-orange-900 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SILVER") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-gray-400 p-2 ">' + row.level + '</span>'
            } else if (row.level === "GOLD") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-yellow-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "PLATINUM") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-red-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SENIOR") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-green-500 p-2 ">' + row.level + '</span>'
            } else if (row.level === "SENIOR PLUS") {
              return '<span class="rounded-full text-white font-semibold text-xs bg-purple-900 p-2 ">' + row.level + '</span>'
            }
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<span class=" font-semibold text-xs  ">' + row.status + '</span>'
          }
        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<button class="membership-profile-modal-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Profile</button>';
          }
        }
      ],
    });
    Delete_Other_Acount(others)
  }

  function Membership_Profile() {
    $(document).on('click', '.membership-profile-modal-btn', function() {
      var id = $(this).data('id')
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "GET",
        url: "/membership-account-profile/" + id,
        data: "data",
        dataType: "json",
        success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          var left_details = "<div class='w-full'>"
          left_details += "<p class='font-semibold text-gray-400 text-xs'>NAME. : <span class='text-gray-600  text-sm' id='profile-password'>" + response.fname + " "  + " " + response.lname + "</span></p>"
          left_details += "<p class='font-semibold text-gray-400 text-xs'>BIRTHDAY. : <span class='text-gray-600  text-sm' id='profile-password'>" + response.birthday + "</span></p>"
          left_details += "<p class='font-semibold text-gray-400 text-xs'>AGE. : <span class='text-gray-600  text-sm' id='profile-password'>" + response.age + "</span></p>"
          left_details += "<p class='font-semibold text-gray-400 text-xs'>GENDER. : <span class='text-gray-600  text-sm' id='profile-password'>" + response.gender + "</span></p>"
          left_details += "<p class='font-semibold text-gray-400 text-xs'>BLOOD TYPE. : <span class='text-gray-600  text-sm' id='profile-password'>" + response.blood_type + "</span></p>"
          left_details += "<p class='font-semibold text-gray-400 text-xs'>ADDRESS. : <span class='text-gray-600  text-sm' id='profile-password'>" + response.barangay_street + " BRGY. " + response.barangay + " " + response.municipality + "</span></p>"
          left_details += "<p class='font-semibold text-gray-400 text-xs'>EMAIL. : <span class='text-gray-600  text-sm' id='profile-password'>" + response.email + "</span></p>"
          left_details += "<div>"
          var right_details = "<div class='w-full'>"
          right_details += "<p class='font-semibold text-gray-400 text-xs'>MEMBERSHIP ID: <span class='text-gray-600  text-sm' id='profile-password'>" + response.mem_id + "</span></p>"
          if (response.level === "CLASSIC") {
            right_details += "<p class='font-semibold text-gray-400 text-xs'>PROGRAM: <span class='text-white bg-blue-500 p-1 rounded-full  text-sm' id='profile-password'>" + response.level + "</span></p>"
          } else if (response.level === "BRONZE") {
            right_details += "<p class='font-semibold text-gray-400 text-xs'>PROGRAM: <span class='text-white bg-orange-900 p-1 rounded-full  text-sm' id='profile-password'>" + response.level + "</span></p>"
          } else if (response.level === "SILVER") {
            right_details += "<p class='font-semibold text-gray-400 text-xs'>PROGRAM: <span class='text-white bg-gray-400 p-1 rounded-full  text-sm' id='profile-password'>" + response.level + "</span></p>"
          } else if (response.level === "GOLD") {
            right_details += "<p class='font-semibold text-gray-400 text-xs'>PROGRAM: <span class='text-white bg-yellow-500 p-1 rounded-full  text-sm' id='profile-password'>" + response.level + "</span></p>"
          } else if (response.level === "PLATINUM") {
            right_details += "<p class='font-semibold text-gray-400 text-xs'>PROGRAM: <span class='text-white bg-red-500 p-1 rounded-full  text-sm' id='profile-password'>" + response.level + "</span></p>"

          } else if (response.level === "SENIOR") {
            right_details += "<p class='font-semibold text-gray-400 text-xs'>PROGRAM: <span class='text-white bg-green-500 p-1 rounded-full  text-sm' id='profile-password'>" + response.level + "</span></p>"

          } else if (response.level === "SENIOR PLUS") {
            right_details += "<p class='font-semibold text-gray-400 text-xs'>PROGRAM: <span class='text-white bg-purple-900 p-1 rounded-full  text-sm' id='profile-password'>" + response.level + "</span></p>"
          }
          right_details += "<p class='font-semibold text-gray-400 text-xs'>PRICE: <span class='text-gray-600  text-sm' id='profile-password'>" + response.amount + ".00 PESOS</span></p>"
          right_details += "<p class='font-semibold text-gray-400 text-xs'>STATUS: <span class='text-gray-600  text-sm' id='profile-password'>" + response.status + "</span></p>"
          right_details += "<p class='font-semibold text-gray-400 text-xs'>TYPE OF PAYMENT: <span class='text-gray-600  text-sm' id='profile-password'>" + response.type_of_payment + "</span></p>"
          right_details += "<p class='font-semibold text-gray-400 text-xs'>PROOF OF PAYMENT:</p>"
  
          right_details += "<button class='text-gray-600' data-id=" + response.id + " id='view-membership-payment-btn'  text-sm' id='profile-password'><img src='data:image/jpeg;base64,"+response.proof_of_payment+"' class='h-32 w-auto'></button>"

          left_details += "<div>"
          var profile_btns = "<div class='flex space-x-2'>"
          profile_btns += "<button type='button' id='close-membership-profile-modal-btn' class='p-2 bg-gray-500 text-white rounded-md'>Close</button>"
          if (response.status === "ACTIVATED") {
            profile_btns += "<button type='button'  data-id=" + response.id + " class='delete-membership-account-profile-btn p-2 bg-red-500 text-white rounded-md'>Delete</button>"
            profile_btns += "<div>"
          } else if (response.status === "DECLINED" || response.status === "EXPIRED") {
            profile_btns += "<button type='button'  data-id=" + response.id + " class='other-delete-membership-account-profile-btn p-2 bg-red-500 text-white rounded-md'>Delete</button>"
            profile_btns += "<div>"
          }
          $('#membership-account-profile').append(left_details);
          $('#membership-account-profile').append(right_details);
          $('#membership-account-profile-btns').append(profile_btns);
          $('#membership-account-profile-modal').removeClass('hidden');
          $('#membership-account-profile-modal').addClass('block');


        }
      });
    });

  }


 
  function importExcel() {
    document.getElementById('loading-page').classList.remove('hidden');

    var formData = new FormData();
    formData.append('file', $('input[name="file"]')[0].files[0]);

    // Get CSRF token from the meta tag
    var token = $('meta[name="csrf-token"]').attr('content');


    $.ajax({
      type: "POST",
      url: "{{ route('import') }}",
      data: formData,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': token // Include CSRF token in the header
      },
      success: function(response) {
        document.getElementById('loading-page').classList.add('hidden');
        console.log(response);

        $('#import-data-form-modal').addClass('hidden');
        window.alert("Import Successful!");
             
      },
      error: function(xhr, status, error) {
        // Handle error response here
        window.alert(xhr.responseText);
      }
    });
  }
  // Close modal when the "Back" button is clicked
  $('#close-import-modal-form-btn').on('click', function() {
    $('#import-data-form-modal').addClass('hidden');
  });
</script>

@endsection