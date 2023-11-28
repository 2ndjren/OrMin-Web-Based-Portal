@extends('layout.user.user_profile')
@section('profile')
<div class="font-semibold p-2 text-gray-600"><a href="{{url('/')}}"> BACK</a></div>

<div class="2xl:flex sm:block md:block lg:flex xl:flex mb-10  xl:space-x-5 h-screen w-full">
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
      <div id="volunteer-details">

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
  <div class="">
  <div id="membership-info" class="pt-10">


</div>
<div id="membership-card"></div>
  </div>
    </div>

    <div class="h-96">

    </div>

  </div>


</div>
</div>

<div id="membership-modal" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg ">
    <div id="membership-form" class="block"></div>
    <p class="p-2 bg-blue-900 text-white rounded-md font-semibold text-center text-lg my-2">Red Cross Membership Program</p>
    <form id="create-membership-account" enctype="multipart/form-data">
      @csrf
      <p class="text-blue-500 text-sm bg-blue-500 bg-opacity-5 p-4">Note: Please complete the necessary details before you submit your mebership request form! Thanky you!</p>
   
      <div class="block space-y-2 p-3">  

      <div class="flex space-x-2">
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
      </div>

         <div class="">
   

         <p>Choose program</p>
      <select name="level" id="program" class="form-inputs appearance-none border rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      <option value="">Select</option>
        <option value="Classic">Classic</option>
        <option value="Bronze">Bronze</option>
        <option value="Silver">Silver</option>
        <option value="Gold">Gold</option>
        <option value="Platinum">Platinum</option>
        <option value="Senior">Senior</option>
        <option value="Senior Plus">Senior Plus</option>
              </select>
   </div>
      <div class="">
      <p class="p-2 text-sm">Price</p>
      <input  type="text" id="exact-amount" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="amount">
      </div>
      <div class="">
        <p class="text-sm">Payment Method</p>
    <select id="type_of_payment" name="type_of_payment" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Gcash">Gcash</option>
                <option value="Paymaya">Paymaya</option>
                <option value="Bank Transfer">Bank Transfer</option>
              </select>
    </div>
    <div class="">
      <p class="p-2 text-sm">Proof of Payment(Upload here!)</p>
      <input type="file"  class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="proof_of_payment">
      </div>
    </div>
    <div class="flex space-x-2 justify-center">
        <button type="button" id="back-form" class="p-2 rounded-md text-white bg-red-500" >Back</button>
        <button type="submit"  class="p-2 rounded-md text-white bg-green-500" >Submit</button>
    </div>

    </form>

    
    
  </div>
</div>

<script>
  $(document).ready(function () {
    SelectInsuranceLevel()
    Close_Membership_form()
    Open_Membership_form()
    Create_Membership_Account()
  });
function SelectInsuranceLevel(){
        $(document).ready(function () {
        var productValues = {
      "Classic": 65,
      "Bronze": 150,
      "Silver": 300,
      "Gold": 500,
      "Platinum": 1000,
      "Senior": 300,
      "Senior Plus": 350,
  };

  // Attach a change event listener to the select element
  $('#program').change(function() {
      // Get the selected product's value from the mapping
      var selectedProduct = $(this).val();
      var productValue = productValues[selectedProduct];
      $('#exact-amount').val(productValue);
  });

    });
      }
      function Close_Membership_form(){
        $('#back-form').click(function(){
          $('#membership-modal').addClass('hidden')
          $('#create-membership-account')[0].reset()
        });
      }
      function Open_Membership_form(){
        $(document).on('click','#open-modal-form',function(){
          $('#membership-modal').removeClass('hidden')
        });
      }
      function Create_Membership_Account(){
        $('#create-membership-account').submit(function (e) { 
          e.preventDefault();
          var formdata = new FormData($(this)[0])
      $.ajax({
        type: "POST",
        url: "{{url('create-user-membership')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log(response)
          if (response.success) {
            $('#membership-modal').addClass('hidden')
            $('#open-modal-form').addClass('hidden')
          $('#create-membership-account')[0].reset()
            alert(response.success)
          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
          // Handle errors, if any
          window.alert(xhr.responseText);
        }
      });
        });
      }

</script>

@endsection