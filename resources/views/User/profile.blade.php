
@extends('layout.user.user_profile')
@section('profile')
<div class="font-semibold p-2 text-gray-600"><a href="{{url('/')}}"> BACK</a></div>

<div class="2xl:flex sm:block md:block lg:flex xl:flex mb-10  xl:space-x-5 lg:h-auto w-full">
  <div class="md:w-1/3  xl:w-1/3 sm:w-full p-10 bg-white shadow-md rounded-lg block space-y-5">

    <div class="flex justify-center">
      @if(session('USER')['user_profile']!=null)
      <img src="data:image/jpeg;base64,{{session('USER')['user_profile']}}" alt="Image" class="h-40 w-auto shadow">
      @else
      <p class="text-8xl "><i class="fa-solid fa-user w-auto shadow"></i></p>
    
      @endif

    </div>

    <div class="text-xl text-gray-700 text-center font-bold">
      
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

    <div class=" flex justify-center items-center">
    <button id="edit-profile-details" data-id="{{session('USER')['id']}}" type="button" class="text-cyan-500 ml-2"><span>Edit Profile</span> <i class="fa-solid fa-user-pen ml-2"></i> </button>

    </div>
    <div class=" flex justify-center items-center">
      <a class="text-red-500" href="{{url('logout')}}"><span>Sign out</span><i class="fa-solid fa-right-to-bracket ml-2"></i></a>

    </div>


  </div>


  <div class=" h-auto rounded-md-xl w-full my-10 xl:my-0 xl:mb-10">
    <div class="">
      <button id="appointment-container-btn" class="px-5 py-2  bg-blue-900 rounded-t-md text-white hover:border-b-4 hover:border-white  hover:bg-white hover:text-blue-900    "><i class="fa-solid fa-calendar-check"></i></button>
      <button id="volunteer-container-btn" class="px-5 py-2 bg-blue-900 rounded-t-md text-white hover:border-b-4 hover:border-white hover:bg-white hover:text-blue-900   "><i class="fa-solid fa-handshake-angle"></i> </button>
      <button id="membership-container-btn" class="px-5 py-2 bg-blue-900 rounded-t-md text-white hover:border-b-4 hover:border-white hover:bg-white hover:text-blue-900   "><i class="fa-solid fa-shield-halved"></i> </button>

    </div>

    {{-- APPOINTMENT --}}
    <div id="appointment-container" class=" rounded-r-xl  rounded-b-xl p-10 bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-blue-900 font-bold text-xl">APPOINTMENT</p>
      </div>
      <div class="sm:block lg:flex  pt">

      <div id="set-an-appointment-btn" class=" w-full  hidden my-4">
      <div class="flex mb-5 mt-5">
  <div class=" p-2 border-r-2 border-blue-500">
  </div>
  <div class=" pl-2">
    <p class="text-yellow-500 font-semibold">How to set an appointment?</p>
  <p class="font-semibold text-sm text-gray-700 mb-5">To schedule your appointment, simply click the button below. <br> <br> <a class="font-semibold text-white px-2 py-2  bg-blue-500 " href="{{url('user-appointment')}}">Set Appointment</a></p>
       
</div>

</div>


        
      </div>
      <div class="w-full" id="appointment-details-submitted">

      </div>
      <div class="w-full">
        <table id="appointment-table" class="w-full border text-center border-blue-500 p-2">
          <thead class="bg-blue-500 text-white">
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
      </div>

          
    </div>


    {{-- VOLUNTEER --}}

    <div id="volunteer-container" class=" rounded-r-xl  rounded-b-xl p-10  hidden bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-cyan-600 font-bold text-xl">VOLUNTEER</p>

      </div>


      
      <div id="register-as-volunteer-btn" class="show hidden mt-2">
      <div class="flex mb-5 mt-5">
  <div class=" p-2 border-r-2 border-blue-500">
  </div>
  <div class=" pl-2">
    <p class="text-yellow-500 font-semibold">Volunteering</p>
  <p class="font-semibold text-sm text-gray-700 mb-5">Would you like to explore further about volunteering? <a class="hover:underline text-blue-500 font-semibold" href="{{url('user/volunteer')}}">Click here</a> to discover additional information. <br>To volunteer, kindly click the blue button below.  <br> <br><a class="font-semibold text-white px-2 py-2 ml-5  bg-blue-500 " href="{{url('register-volunteer')}}">Be a volunteer!</a></p>
       
</div>

</div>
       
      </div>
      <div class="sm:block lg:flex mt-2" id="volunteer-details">

      </div>


    </div>
    {{-- BLOOD --}}
    <div id="blood-container" class=" rounded-r-xl  rounded-b-xl p-10 h-full hidden bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-cyan-600 font-bold text-xl">BLOOD</p>
      </div>


    </div>
    {{-- MEMBERSHIP --}}
    <div id="membership-container" class=" rounded-r-xl  rounded-b-xl p-10  hidden bg-white shadow-xl">
      <div class=" bg-gray-200 p-3">
        <p class="text-cyan-600 font-bold text-xl">MEMBERSHIP PROGRAM</p>
      </div>
  <div class="">
    <div id="get-membership-details" class=" hidden pl-2">
    <p class="font-semibold text-gray-500 mb-5">Benifits of having an insurance account in our organization? <br> <a class="hover:underline px-2 py-1 bg-blue-500 shadow-lg text-white font-semibold" href="{{url('user/membership')}}">Learn More ...</a></p>
         
    </div>
    <div id="user-insurance-data"></div>
    <div class="flex">
<div class="w-full"></div>

    <div class="w-full  h-auto">
<table id='membership-history-table' class="border border-red-500 w-full text-center">
          <thead class="text-white bg-red-500">
            <tr>
              <th>Program</th>
              <th>Validity</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
</div>
    </div>
  </div>
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
                <option value="Calapan City">Calapan City</option>
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
                <option value="Gcash">Gcash Express </option>
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

<div id="edit-profile-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg ">
    <div id="decline-membership-note" class="w-full">
      <p class="font-semibold text-center text-blue-500 text-xl">Update Profile</p>
      <form id="edit-user-profile-form" enctype="multipart/form-data">
        @csrf
      
        <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="name">Current Profile</label>
        <div class="w-full ">
        <div class="mx-auto w-full" id="current-profile-picture"></div>
        </div>
        <input id="edit-id" type="hidden" name="id">
       <div class=" flex space-x-2">
        <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Change Profile</label>
            <input accept="image/*" id="user_profile"   name="user_profile" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file">
          </div>
       <div class="w-full">
       <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Image Preview</label>

       <div id="imagePreview"></div>
       </div>

       </div>
        <div class="flex space-x-2">
       

        <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">First Name</label>
            <input id="edit-fname" name="fname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Middle Name</label>
            <input id="edit-mname" name="mname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Last Name</label>
            <input id="edit-lname" name="lname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
        </div>
        <div class="flex space-x-2">
        <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Mobile No.</label>
            <input id="edit-phone_num" name="phone_num" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>

       <div class="mb-4 w-full ">
           <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Birthday</label>
           <input id="edit-bday" name="bday" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date">
         </div>
       </div>
        
        <div class="flex justify-end space-x-2">
          <button id="close-edit-profile-modal" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Cancel</button>
          <button class="bg-blue-500 font-semibold text-white p-2 rounded-md" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>













<!-- appointment-modal -->
<div id="appointment-details-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-1/2  lg:w-1/4 mx-auto rounded-lg p-4 shadow-lg ">
    <div id="decline-membership-note" class="w-full">
      <p class="font-semibold text-center text-blue-500 ">Appointment Details</p>
      <div id="myappointment-details">

      </div>

    </div>
  </div>
</div>




<div id="my-volunteer-card-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container sm:h-3/4 lg:h-4/6 sm:w-3/4  lg:w-1/4 mx-auto rounded-lg p-4 shadow-lg ">
    <div id="decline-membership-note" class="w-full h-full">
      <div id="my-volunteer-details"  class=" h-full bg-no-repeat bg-center bg-contain" style="background-image: url('/static/user/categories/volunteer.jpg'); ">
      <div id="volunteer-data" class=""></div>
      <div class="flex justify-center mt-5"><button id="volunteer-card-btn" class="text-white bg-blue-500 px-3 py-1 rounded-md " type="button">Close</button></div>
      </div>

    </div>
  </div>
</div>


<div id="my-membership-card-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div id="card-background-modal" class="modal-container sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 mx-auto rounded-lg">
    <div id="classic-card"  class=" h-full bg-no-repeat bg-center bg-contain hidden " style="background-image: url('/static/user/categories/classic.png'); ">
      <div id="insurance-user-classic-data" class=""></div>
  
    </div>
    <div id="bronze-card"  class=" h-full bg-no-repeat bg-center bg-contain hidden" style="background-image: url('/static/user/categories/bronze.png'); ">
      <div id="insurance-user-bronze-data" class=""></div>
  
    </div>
    <div id="silver-card"  class=" h-full bg-no-repeat bg-center bg-contain hidden" style="background-image: url('/static/user/categories/silver.png'); ">
      <div id="insurance-user-silver-data" class=""></div>
  
    </div>
    <div id="gold-card"  class=" h-full bg-no-repeat bg-center bg-contain hidden" style="background-image: url('/static/user/categories/gold.png'); ">
      <div id="insurance-user-gold-data" class=""></div>
  
    </div>
    <div id="platinum-card"  class=" h-full bg-no-repeat bg-center bg-contain hidden" style="background-image: url('/static/user/categories/platinum.png'); ">
      <div id="insurance-user-platinum-data" class=""></div>
  
    </div>
    <div id="senior-card"  class=" h-full bg-no-repeat bg-center bg-contain hidden" style="background-image: url('/static/user/categories/senior.png'); ">
      <div id="insurance-user-senior-data" class=""></div>
  
    </div>
    <div id="plus-card"  class=" h-full bg-no-repeat bg-center bg-contain hidden" style="background-image: url('/static/user/categories/plus.png'); ">
      <div id="insurance-user-plus-data" class=""></div>
    </div>
    <div class="flex justify-center mt-5"><button id="close-insurance-card-btn" class="text-white bg-blue-500 px-3 py-1 rounded-md " type="button">Close</button></div>
  </div>
</div>





<script>
  $(document).ready(function () {
    SelectInsuranceLevel()
    Close_Membership_form()
    Open_Membership_form()
    Create_Membership_Account()
    Edit_Profile()
    MyAppointments()
    Show_My_Appointment()
    Check_Existing_Appointment()
    Appointment_Btn()
    Volunter_Record()
    Show_My_Volunteer_Card()
    User_Insurance()
    Show_Insurance_Details()
    CLose_Inusarnce_Card_Modal()
  });


  function Edit_Profile(){
    $('#close-edit-profile-modal').click(function (e) { 
      e.preventDefault();

      $('#edit-user-profile-form')[0].reset()
      $('#edit-profile-modal').addClass('hidden')

      
    });
$('#edit-profile-details').click(function (e) { 
  e.preventDefault();
  var id=$(this).data('id')
  $.ajax({
    type: "GET",
    url: "user-edit/"+id,
    data: "data",
    dataType: "json",
    success: function (user) {
 
      $('#current-profile-picture').empty()
      

      if(user.user_profile!==""){
        var profile="<img  class='mx-auto h-32 border-2 border-blue-500' src='data:image/jpeg;base64,"+user.user_profile+"'>"
      $('#current-profile-picture').append(profile)

      }else{
      var profile="<p class='text-8xl text-center'><i class='fa-solid fa-user w-auto shadow'></i></p>"
      $('#current-profile-picture').append(profile)

      }
      $('#edit-fname').val(user.fname);
      $('#edit-mname').val(user.mname);
      $('#edit-lname').val(user.lname);
      $('#edit-id').val(user.id);
      $('#edit-phone_num').val(user.phone_num);
      $('#edit-bday').val(user.bday);
      $('#edit-profile-modal').removeClass('hidden')
    }
  });
});
}

$('#edit-user-profile-form').submit(function (e) { 
  e.preventDefault();
  var formData= new FormData($(this)[0])
  var submit = $(this);
      submit.prop('disabled', true)
      submit.addClass('opacity-50 cursor-not-allowed')
  $.ajax({
    type: "POST",
    url: "/update-user-profile",
    data: formData,
      processData: false,
      contentType: false,
    success: function (response) {
      if(response.success){
        alert(response.success)
        window.location.href="/profile"
        submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
      }else{
        alert(response.failed)
        submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
      }
      
    },
    error: function(xhr, status, error) {
          submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(xhr.responseText);
        }
  });
  
});
function Show_My_Appointment(){
  $(document).on('click','.appointment-btn',function(){
    var id=$(this).data('id')
    $.ajax({
      type: "GET",
      url: "/my-appointments-details/"+id,
      data: "data",
      dataType: "json",
      success: function (response) {
        console.log(response)
        $('#myappointment-details').empty()
        var start = new Date(response.app_date);

var day = start.getDate();
var month = start.getMonth() + 1;
var year = start.getFullYear();

var months = [
  "Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];
 var monthss = months[month - 1];
        var details="<div>"
        details+="<p>Date: <span class='ml-2'>"+monthss+" "+day+", "+year+"</span><p>"
        details+="<p>Time: <span class='ml-2'>"+response.app_time+"</span><p>"
        details+="<p>Description: <span class='ml-2'>"+response.app_description+"</span><p>"
        if(response.note!==null){
          details+="<p>Note: <span class='ml-2'>"+response.note+"</span><p>"
          
        }
        if(response.status==='PENDING'){
                  details+="<p>Status:<span class='text-white bg-gray-500 px-2 rounded-md'>"+response.status+"</span></p>"

                  }else if(response.status==='APPROVED'){
                  details+="<p>Status: <span class='text-white bg-yellow-500 px-2 rounded-md'>"+response.status+"</span></p>"
                    
                  }else if(response.status==="ONGOING"){
                    details+="<p>Status: <span class='text-white bg-green-500 px-2 rounded-md'>"+response.status+"</span></p>"
                  
                  }else if(response.status==="DECLINED"){
                    details+="<p>Status: <span class='text-white bg-blue-500 px-2 rounded-md'>"+response.status+"</span></p>"
                  }else if(response.status==="CANCELLED"){
                    details+="<p>Status: <span class='text-black border-2 bg-white px-2 rounded-md'>"+response.status+"</span></p>"
                  }else if(response.status==="DONE"){
                    details+="<p>Status: <span class='text-white bg-orange-500 px-2 rounded-md'>"+response.status+"</span></p>"
                  }
                  details+="<div class='flex justify-center spcae-x-2 mt-5'>"
                  if(response.status==='PENDING'|| response.status==='APPROVED'){
                    details+="<button class='px-2 py-2 rounded-md bg-blue-500 text-white' type='button' data-id='"+response.id+"' id='cancel-appointment'>Cancel Appointment</button>"
                    
                  }
                  details+="<button class='px-2 py-2 ml-2 rounded-md bg-gray-500 text-white mr-2' type='button' data-id='"+response.id+"' id='close-appointment-details'>Close</button>"
                  details+="</div>"

        details+="</div>"
        $('#myappointment-details').append(details)
        $('#appointment-details-modal').removeClass('hidden')
      }
    });
  })
  
}
function Appointment_Btn(){
  $(document).on('click','#close-appointment-details',function(){
    $('#myappointment-details').empty()
    $('#appointment-details-modal').addClass('hidden')

  })
  $(document).on('click','#cancel-appointment',function(){
    var id=$(this).data('id')
    $.ajax({
      type: "GET",
      url: "/cancel-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (response) {
        if(response.success){
          Check_Existing_Appointment()
          MyAppointments()
          alert(response.success)
        }else{
          alert(response.failed)
        }
        
      }
    });
    $('#myappointment-details').empty()
    $('#appointment-details-modal').addClass('hidden')

  })
  
}


function Check_Existing_Appointment(){
  $.ajax({
    type: "GET",
    url: "/my-existing-appointments",
    data: "data",
    dataType: "json",
    success: function (response) {
      console.log(response)
      if(response.results){
        $('#set-an-appointment-btn').removeClass('hidden')
      }else{
        $('#set-an-appointment-btn').addClass('hidden')
      }
    }
  });
}
function MyAppointments(){
  $.ajax({
    type: "GET",
    url: "/my-appointments",
    data: "data",
    dataType: "json",
    success: function (response) {
      $('#appointment-table tbody').empty();
      console.log(response)
      if(response.results){
        var datalist="<tr>"
          
           datalist+="<td></td>"
           datalist+="<td>"+response.results+"</td>"
           datalist+="<td></td>"
           
          
           datalist+="<tr>"
         $('#appointment-table tbody').append(datalist);
      }
      else{
        $.each(response, function (index, field) { 
          var datalist="<tr>"
           datalist+="<td><button class='appointment-btn hover:underline' type='button' data-id='"+field.id+"'>"+field.app_date+"</button></td>"
           datalist+="<td>"+field.app_time+"</td>"
           if(field.status==='PENDING'){
            datalist+="<td><span class='text-white bg-gray-500 px-2 rounded-md'>"+field.status+"</span></td>"

                  }else if(field.status==='APPROVED'){
                  datalist+="<td> <span class='text-white bg-yellow-500 px-2 rounded-md'>"+field.status+"</span></td>"
                    
                  }else if(field.status==="ONGOING"){
                    datalist+="<td> <span class='text-white bg-green-500 px-2 rounded-md'>"+field.status+"</span></td>"
                  
                  }else if(field.status==="DECLINED"){
                    datalist+="<td> <span class='text-white bg-blue-500 px-2 rounded-md'>"+field.status+"</span></td>"
                  }else if(field.status==="CANCELLED"){
                    datalist+="<td> <span class='text-black border-2 bg-white px-2 rounded-md'>"+field.status+"</span></td>"
                  }else if(field.status==="DONE"){
                    datalist+="<td> <span class='text-white bg-orange-500 px-2 rounded-md'>"+field.status+"</span></td>"
                  }
          
           datalist+="<tr>"
         $('#appointment-table tbody').append(datalist);
        });
      }
    }
  });

}

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
          var submit = $(this);
      submit.prop('disabled', true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('create-user-membership')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
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
          submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });
        });
      }

      function Volunter_Record(){
        $.ajax({
          type: "GET",
          url: "/registered-details-volunteer",
          data: "data",
          dataType: "json",
          success: function (response) {
            console.log(response)
            if(response.results){
             $('#register-as-volunteer-btn').removeClass('hidden')

            }else{
              var left="<div class='p-2 w-full text-sm border-l-2 border-red-500 ml-4'>"
              left+="<div class='flex w-full space-x-2 '>"
              if(response.vol_id!== null){
                left+="<p class='font-semibold text-blue-500 w-full'>Volunteer ID: <span class='text-gray-700 ml-2 '>"+response.vol_id+"</span><p>"
              }else{
                left+="<p class='font-semibold text-blue-500 w-full'>Volunteer ID: <span class='text-gray-700 ml-2 '>Pending</span><p>"
              }
              if(response.expiration_date!==null){
              left+="<p class='font-semibold text-blue-500 w-full text-left'>Expiration: <span class='text-gray-700 ml-2 '>"+response.expiration_date+"</span><p>"
              }else{
                left+="<p class='font-semibold text-blue-500 w-full'>Expiration: <span class='text-gray-700 ml-2 '>Pending</span><p>"
              }
              left+="</div>"
              left+="<p class='font-semibold text-blue-500'>Role: <span class='text-gray-700 ml-2 '>"+response.role+"</span><p>"
              left+="<p class='font-semibold text-blue-500'>Name: <span class='text-gray-700 ml-2 '>"+response.fname+" "+response.mname+" "+response.lname+"</span><p>"
              left+="<div class='flex w-full space-x-2'>"
              left+="<p class='font-semibold text-blue-500 w-full'>Birthday: <span class='text-gray-700 ml-2 '>"+response.birthday+"</span><p>"
              left+="<p class='font-semibold text-blue-500 w-full text-left'>Gender: <span class='text-gray-700 ml-2 '>"+response.gender+"</span><p>"
              left+="</div>"
              left+="<p class='font-semibold text-blue-500'>Phone No: <span class='text-gray-700 ml-2 '>"+response.phone_no+"</span><p>"
              left+="<p class='font-semibold text-blue-500'>Civil Status: <span class='text-gray-700 ml-2 '>"+response.civil_status+"</span><p>"
              left+="<p class='font-semibold text-blue-500'>Address: <span class='text-gray-700 ml-2 '>"+response.barangay_street+", "+response.barangay+", "+response.municipal+", "+response.province+"</span><p>"
              left+="</div>"
              $('#volunteer-details').append(left)
              var right="<div class='w-full flex justify-center align-center'>"
              right+="<button type='button' data-id='"+response.id+"' id='show-my-volunteer-card' class='hover:underline text-lg'><i class='fa-solid fa-id-card text-xl mr-2'></i> My ID</button>"
              right+="</div>"
              $('#volunteer-details').append(right)
            }
          }
        });
      }

      function Show_My_Volunteer_Card(){
        $(document).on('click','#show-my-volunteer-card',function(){
          var id =$(this).data('id')
          $.ajax({
            type: "GET",
            url: "/my-voluntee-card/"+id,
            data: "data",
            dataType: "json",
            success: function (response) {
              console.log(response)
              if(response.results){
                alert(response.results)
              }else{
                var vol_id="<div class='w-full pt-20 pl-40'>";
                if(response.vol_id!==null){
                  vol_id+="<p class='pt-5 text-center font-semibold'>"+response.vol_id+"</p>";
                }else{
                  vol_id+="<p class='pt-5 text-center font-semibold'>Pending</p>";
                }
                vol_id+="</div>";
                var profile="<div class='flex justify-end pt-10 mr-14'>";
               if(response.vol_profile!==null){
                profile+="<p class='pt-5 text-center font-semibold'>"+response.vol_profile+"</p>";
               }else{
                  profile+="<p class='text-8xl '><i class='fa-solid fa-user w-auto shadow'></i></p>"

               }
                profile+="</div>";
                var vol_fname="<div class='pt-5'>";
               if( response.mname!==null||response.lname!==null){
                vol_fname+="<p class='pt-5 text-center font-semibold'>"+response.fname+" "+response.mname+" "+response.lname+"</p>";
               }else{
                vol_fname+="<p class='pt-5 text-center font-semibold'></p>";
               }
                vol_fname+="</div>";
                var address="<div class='pt-4'>";
                address+="<p class='pt-5 font-semibold text-sm'><span class='mr-20 ml-8'>"+response.barangay_street+"</span> <span>"+response.barangay+"</span></p>";
                address+="<p class='pt-5 font-semibold text-sm'><span class='mr-20 ml-8'>"+response.municipal+"</span> <span>"+response.province+"</span></p>";
                address+="</div>";
                var mobile="<div class='pt-10'>";
                address+="<p class='pt-9 font-semibold text-sm'><span class='mr-40 ml-20'>"+response.phone_no+"</span> <span>"+response.blood_type+"</span></p>";

                mobile+="</div>";
                var expiration="<div class=' text-right w-full'>";
                if(response.expiration_date!==null){
                  expiration+="<p class='pt-7 font-semibold text-sm'><span class='mr-20 ml-20'>"+response.expiration_date+"</span></p>";
                }else{
                  expiration+="<p class='pt-7 font-semibold text-sm'><span class='mr-20 ml-20'>Pending</span></p>";
                }


                $('#volunteer-data').append(vol_id);
                $('#volunteer-data').append(profile);
                $('#volunteer-data').append(vol_fname);
                $('#volunteer-data').append(address);
                $('#volunteer-data').append(mobile);
                $('#volunteer-data').append(expiration);
                $('#my-volunteer-card-modal').removeClass('hidden')
              }
            }
          });
        })
        $('#volunteer-card-btn').click(function (e) { 
          e.preventDefault();
          $('#volunteer-data').empty();
          $('#my-volunteer-card-modal').addClass('hidden')
          
        });
      }

      function User_Insurance(){
        $.ajax({
          type: "GET",
          url: "/user-insurance",
          data: "data",
          dataType: "json",
          success: function (response) {
            console.log(response)
            if(response.ongoing.status==="ACTIVATED"){
              $('#get-membership-details').addClass('hidden')
            }else{
              $('#get-membership-details').removeClass('hidden')

            }
            if(response.history!=="No results found!"){
             $.each(response.history, function (index, value) { 
              var table_data="<tr class='text-blue-500 font-semibold'>"
              table_data+="<td><button type='button' class='history-details-btn hover:underline'  data-id="+value.id+">"+value.level+"</button></td>"
             if(value.start_at!==null && value.end_at!==null){
              table_data+="<td>"+value.start_at+" "+value.end_at+"</td>"
             }else{
              table_data+="<td>Pending</td>"

             }
              table_data+="<td>"+value.status+"</td>"
              table_data+="</tr>"
              $('#membership-history-table tbody').append(table_data)
             });
            }else{
              var table_data="<tr>"
              table_data+="<td></td>"
              table_data+="<td>"+response.history+"</td>"
              table_data+="<td></td>"
              table_data+="</tr>"
              $('#membership-history-table tbody').append(table_data)

            }



          }
        });
      }

      function Show_Insurance_Details(){
        $(document).on('click','.history-details-btn',function(){
          var id=$(this).data('id');
          $.ajax({
            type: "GET",
            url: "/user-insurance-details/"+id,
            data: "data",
            dataType: "json",
            success: function (response) {
              console.log(response)
              if(response.level==="CLASSIC"){

                $('#classic-card').removeClass('hidden')
                $('#card-background-modal').removeClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/2 ')
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 ')
                var name="<div class='sm:pt-96 sm:pl-20'>"
                if(response.mname!==null && response.lname!== null){
                  name+="<p class=' font-semibold sm:pt-7 lg:pt-16'>"+response.fname+" "+response.mname+" "+response.lname+"</p>"
                }else{
                  name+="<p class=' sm:pt-7 lg:pt-16'>"+response.fname+"</p>"
                }
                name+="</div>"
                var address="<div class='sm:pl-20 '>"
                address+="<p class=' font-semibold sm:pt-7'>"+response.barangay_street+", "+response.barangay+", "+response.municipality+"</p>"
                address+="</div>"
                var validity="<div class='flex sm:space-x-20 sm:pt-6 sm:pl-16'>"
                validity+="<div>"
                if(response.statr_at!==null && response.end_at!==mnull){
                  validity+="<p class=' font-semibold sm:pt-7 sm:pt-5'>"+response.start_at+" "+response.end_at+"</p>"
                }else{
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>Pending</p>"
                }
                validity+="</div>"
                validity+="<div>"
                validity+="<p class=' font-semibold sm:pt-7   sm:pt-5'>"+response.blood_type+"</p>"
                validity+="</div>"
                validity+="</div>"
                $('#insurance-user-classic-data').append(name)
                $('#insurance-user-classic-data').append(address)
                $('#insurance-user-classic-data').append(validity)
              }
              if(response.level==="BRONZE"){
                $('#bronze-card').removeClass('hidden')
                $('#card-background-modal').removeClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 ')
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-full lg:w-1/2 ')
                var name="<div class='sm:pt-96 sm:pl-24'>"
                if(response.mname!==null && response.lname!== null){
                  name+="<p class=' font-semibold sm:pt-7 lg:pt-28'>"+response.fname+" "+response.mname+" "+response.lname+"</p>"
                }else{
                  name+="<p class=' sm:pt-7 lg:pt-16'>"+response.fname+"</p>"
                }
                name+="</div>"
                var validity="<div class='flex sm:space-x-20 sm:pt-6 sm:pl-16'>"
                validity+="<div class='w-full lg:pl-10'>"
                if(response.statr_at!==null && response.end_at!==mnull){
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>"+response.start_at+" "+response.end_at+"</p>"
                }else{
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>Pending</p>"
                }
                validity+="</div>"
                validity+="<div class='w-full  lg:pl-5'>"
                validity+="<p class=' font-semibold sm:pt-3 lg:pt-5  '>"+response.blood_type+"</p>"
                validity+="</div>"
                validity+="</div>"
                $('#insurance-user-bronze-data').append(name)
                $('#insurance-user-bronze-data').append(validity)
            

              }
              if(response.level==="SILVER"){
                $('#silver-card').removeClass('hidden')
                $('#card-background-modal').removeClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 ')
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-full lg:w-1/2 ')
                var name="<div class='sm:pt-96 sm:pl-24'>"
                if(response.mname!==null && response.lname!== null){
                  name+="<p class=' font-semibold sm:pt-7 lg:pt-28'>"+response.fname+" "+response.mname+" "+response.lname+"</p>"
                }else{
                  name+="<p class=' sm:pt-7 lg:pt-16'>"+response.fname+"</p>"
                }
                name+="</div>"
                var validity="<div class='flex sm:space-x-20 sm:pt-6 sm:pl-16'>"
                validity+="<div class='w-full lg:pl-10'>"
                if(response.statr_at!==null && response.end_at!==mnull){
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>"+response.start_at+" "+response.end_at+"</p>"
                }else{
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>Pending</p>"
                }
                validity+="</div>"
                validity+="<div class='w-full  lg:pl-5'>"
                validity+="<p class=' font-semibold sm:pt-3 lg:pt-5  '>"+response.blood_type+"</p>"
                validity+="</div>"
                validity+="</div>"
                $('#insurance-user-silver-data').append(name)
                $('#insurance-user-silver-data').append(validity)
              }
              if(response.level==="GOLD"){
                $('#gold-card').removeClass('hidden')
                $('#card-background-modal').removeClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 ')
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-full lg:w-1/2 ')
                var name="<div class='sm:pt-96 sm:pl-24'>"
                if(response.mname!==null && response.lname!== null){
                  name+="<p class=' font-semibold sm:pt-7 lg:pt-28'>"+response.fname+" "+response.mname+" "+response.lname+"</p>"
                }else{
                  name+="<p class=' sm:pt-7 lg:pt-16'>"+response.fname+"</p>"
                }
                name+="</div>"
                var validity="<div class='flex sm:space-x-20 sm:pt-6 sm:pl-16'>"
                validity+="<div class='w-full lg:pl-10'>"
                if(response.statr_at!==null && response.end_at!==mnull){
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>"+response.start_at+" "+response.end_at+"</p>"
                }else{
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>Pending</p>"
                }
                validity+="</div>"
                validity+="<div class='w-full  lg:pl-5'>"
                validity+="<p class=' font-semibold sm:pt-3 lg:pt-5  '>"+response.blood_type+"</p>"
                validity+="</div>"
                validity+="</div>"
                $('#insurance-user-gold-data').append(name)
                $('#insurance-user-gold-data').append(validity)
              }
              if(response.level==="PLATINUM"){
                $('#platinum-card').removeClass('hidden')
                $('#card-background-modal').removeClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 ')
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-full lg:w-1/2 ')
                var name="<div class='sm:pt-96 sm:pl-24'>"
                if(response.mname!==null && response.lname!== null){
                  name+="<p class=' font-semibold sm:pt-7 lg:pt-28'>"+response.fname+" "+response.mname+" "+response.lname+"</p>"
                }else{
                  name+="<p class=' sm:pt-7 lg:pt-16'>"+response.fname+"</p>"
                }
                name+="</div>"
                var validity="<div class='flex sm:space-x-20 sm:pt-6 sm:pl-16'>"
                validity+="<div class='w-full lg:pl-10'>"
                if(response.statr_at!==null && response.end_at!==mnull){
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>"+response.start_at+" "+response.end_at+"</p>"
                }else{
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>Pending</p>"
                }
                validity+="</div>"
                validity+="<div class='w-full  lg:pl-5'>"
                validity+="<p class=' font-semibold sm:pt-3 lg:pt-5  '>"+response.blood_type+"</p>"
                validity+="</div>"
                validity+="</div>"
                $('#insurance-user-platinum-data').append(name)
                $('#insurance-user-platinum-data').append(validity)
              }
              if(response.level==="SENIOR"){
                $('#senior-card').removeClass('hidden')
                $('#card-background-modal').removeClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 ')
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-full lg:w-1/2 ')
                var name="<div class='sm:pt-96 sm:pl-24'>"
                if(response.mname!==null && response.lname!== null){
                  name+="<p class=' font-semibold sm:pt-7 lg:pt-28'>"+response.fname+" "+response.mname+" "+response.lname+"</p>"
                }else{
                  name+="<p class=' sm:pt-7 lg:pt-16'>"+response.fname+"</p>"
                }
                name+="</div>"
                var validity="<div class='flex sm:space-x-20 sm:pt-6 sm:pl-16'>"
                validity+="<div class='w-full lg:pl-10'>"
                if(response.statr_at!==null && response.end_at!==mnull){
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>"+response.start_at+" "+response.end_at+"</p>"
                }else{
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>Pending</p>"
                }
                validity+="</div>"
                validity+="<div class='w-full  lg:pl-5'>"
                validity+="<p class=' font-semibold sm:pt-3 lg:pt-5  '>"+response.blood_type+"</p>"
                validity+="</div>"
                validity+="</div>"
                $('#insurance-user-senior-data').append(name)
                $('#insurance-user-senior-data').append(validity)
              }
              if(response.level==="SENIOR PLUS"){
                $('#plus-card').removeClass('hidden')
                $('#card-background-modal').removeClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/4 ')
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-full lg:w-1/2 ')
                var name="<div class='sm:pt-96 sm:pl-24'>"
                if(response.mname!==null && response.lname!== null){
                  name+="<p class=' font-semibold sm:pt-7 lg:pt-28'>"+response.fname+" "+response.mname+" "+response.lname+"</p>"
                }else{
                  name+="<p class=' sm:pt-7 lg:pt-16'>"+response.fname+"</p>"
                }
                name+="</div>"
                var validity="<div class='flex sm:space-x-20 sm:pt-6 sm:pl-16'>"
                validity+="<div class='w-full lg:pl-10'>"

                if(response.statr_at!==null && response.end_at!==mnull){
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>"+response.start_at+" "+response.end_at+"</p>"
                }else{
                  validity+="<p class=' font-semibold sm:pt-3 lg:pt-5'>Pending</p>"
                }
                validity+="</div>"
                validity+="<div class='w-full  lg:pl-5'>"
                validity+="<p class=' font-semibold sm:pt-3 lg:pt-5  '>"+response.blood_type+"</p>"
                validity+="</div>"
                validity+="</div>"
                $('#insurance-user-plus-data').append(name)
                $('#insurance-user-plus-data').append(validity)
              }
                $('#card-background-modal').addClass('sm:h-3/4 lg:h-3/4 sm:w-3/4 lg:w-1/2 ')

              $('#my-membership-card-modal').removeClass('hidden')
            }
          });
        })
      }
      function CLose_Inusarnce_Card_Modal(){
        $('#close-insurance-card-btn').click(function (e) { 
          e.preventDefault();
          $('#my-membership-card-modal').addClass('hidden')
          
        });
      }

</script>

@endsection