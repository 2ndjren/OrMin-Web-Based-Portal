{{-- validation Modal  --}}
<div id="validation-message" class="hidden justify-end z-10 bg-red-40 w-screen h-40 fixed ">
  <div class=" h-20 w-80 bg-blue-500 bg-opacity-80 border-white border m-4 rounded-sm shadow-md ">
    <div class="float-right pr-2">
      <i class="fa-solid fa-xmark"></i>
    </div>
    <p class="text-center p-2 text-red-500 ">Error</p>
  </div>
</div>


{{-- Forgot Account Modal  --}}
<div id="forgot-account-modal" class="hidden w-screen h-screen backdrop-blur-sm items-center z-10 pt-40 fixed">
  <div class=" w-96 h-auto mx-auto border-2 shadow-lg p-5 bg-white text-center rounded-md">
    <form id="reset-account">
      @csrf
      <p class="text-2xl text-green-600">Forgot Account?</p>
      <p class="text-gray-400 mx-3 text-sm">Let's retrieve your account</p>
      <p class="text-gray-400 mx-3 text-sm">Put your email account bellow.</p>
      <div id="response-show-message" class="hidden w-full bg-blue-700 bg-opacity-20 rounded-sm ">
        <i id="response-close-btn" class="fa-solid fa-xmark float-right pt-1 pr-1"></i>
        <p class="text-center w-full p-5" id="response-message"></p>
      </div>
      <input type="text" id="email" name="email" value="{{old('email')}}"  class="text-inputs rounded-md p-1 m-1 sm:w-full md:w-full @error('email')  is-invalid @enderror"  placeholder="Email" autocomplete="false">
      <button type="submit" class="p-2 bg-green-600 text-white hover:bg-green-700 rounded-md w-full mx-1 mt-3 hover:duration-200">Submit</button>
      <button type="button" id="forgot-close-btn" class="text-red-400 mt-5 hover:text-red-600">Close</button>
    </form>
  </div>
</div>

{{-- Appointment History Modal View --}}
<div id="user-profile-appointment-history-modal-view" class="hidden w-screen h-screen backdrop-blur-sm items-center z-10 pt-40 fixed">
  <div class=" w-1/2 h-auto mx-auto border-2 shadow-lg p-5 bg-white rounded-md">
    <div class="block border w-full p-5">
      <div class="mb-5">
        <p class="text-2xl text-blue-500 text-center">Appointment Details</p>
      </div>
      <div class=" ">
        <p>ID: <span id="app-id-details"></span></p>
        <p>Date: <span id="app-date-details"></span></p>
        <p>Time: <span id="app-time-details"></span></p>
        <p>Status: <span id="app-status-details"></span></p>
        <p>Description: <span id="app-description-details"></span></p>
        <p>Assisted By: <span id="app-assisted-by-details"></span></p>
        <p>Decline Information: <span id="app-decline-info-details"></span></p>
      </div>

    </div>
    <div class="w-full flex justify-center">
      
    <button type="button" id="user-profile-appointment-history-modal-view-close-btn" onclick="AppointmentHistoryDetailsCloseBtns()" class="text-red-400 mt-5 hover:text-red-600">Close</button>
    </div>
  </div>
</div>



{{-- User Profile Setting Modal  --}}
<div id="user-profile-setting-modal" class="hidden w-screen h-screen backdrop-blur-sm items-center z-10 pt-40 fixed">
  <div class=" w-1/2 h-auto mx-auto border-2 shadow-lg p-5 bg-white text-center rounded-md">
    <div class="flex">
      <div class=""></div>
      <div class=""></div>

    </div>

    <button type="button" id="account-setting-close-btn" class="text-red-400 mt-5 hover:text-red-600">Close</button>
  </div>
</div>


{{-- Set Appointment Modal  --}}
<div id="user-create-appointment-modal" class="hidden w-screen h-screen backdrop-blur-sm items-center z-20 pt-5 fixed">
  <div class=" w-auto h-auto mx-auto border-2 shadow-lg p-5 bg-white rounded-md">
    <div class="flex justify-center border p-5 gap-2 w-full h-full">
      <div class="block ">
        <form id="create-appointment-form">
          @csrf
          <div class=" text-center my-3">
            <p class="text-2xl">Appointment Setter</p>    
              <div id="appointment-create-show-message" class="hidden w-full bg-blue-700 bg-opacity-20 rounded-sm ">
              <i id="response-close-btn" class="fa-solid fa-xmark float-right pt-1 pr-1"></i>
              <p class="text-center w-full p-5" id="appointment-message"></p>
            </div>

          </div>
        <div class="flex w-full gap-2">
          <div class="">
            <label>Date</label><br>
            <input class="px-5 py-1 rounded-sm" type="date" name="app_date">
          </div>
          <div class="">
            <label>Time</label> <br>
            <select class="py-1 w-full" name="app_time">
              <option value="">Select</option>
              <option value="9:00 AM">9:00 AMsss</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
            </select>
          </div>
        </div>
        <div class="block w-full mt-5 ">
          <div class="text-let">
            <label>Decscription</label> <br>
            <textarea name="app_description" class="w-full rounded-sm" cols="30" name="app_description" rows="10"></textarea>
          </div>
        </div>
        <div class=" w-full mt-2">
        <button type="submit" id="create-app-submit-btn" class=" flex justify-center py-2 px-10  w-full  rounded-sm bg-green-500 hover:bg-green-600 text-white">Submit  
          <p id="create-appointments-spinner" class="hidden animate-spin border-r-4 border-b-4 border-dotted border-red-500 rounded-full h-5 w-5"></p>
        </button>
    <button type="button" id="user-appointment-close-modal-btn" class=" py-2 px-10 w-full text-white rounded-sm bg-red-500 hover:bg-red-600 mt-2">Close</button>


        </div>
        </form>
      </div>

    </div>
  </div>
</div>


{{-- Informaiton of schedule  modal  --}}
<div id="scheduled-appointments-list-modal" class="hidden w-screen h-screen backdrop-blur-sm items-center z-10 pt-40 fixed">
  <div class=" w-1/2 h-auto mx-auto border-2 shadow-lg p-5 bg-white text-center rounded-md">
    <div class="block">
      <div class="w-full"></div>
      <div class="w-full gap-2">
        <div class="">
          <p class="text-2xl text-green-500 mb-5">Scheduled Approved Appointments</p>
        </div>
        <table class="w-full p-10 mb-10 border-2 border-gray-400 rounded-sm" id="listofschedule-time">
          <thead>
            <tr>
              <th>Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody class=" "></tbody>
        </table>

        <p class="text-sm text-gray-400 p-4 bg-yellow-100 border">Note: <i>The list of time above are already taken. Pick time does not appear above when your setting an appointment.</i></p>
      </div>
    </div>

    <button type="button" id="list-scheduled-time-close-btn" onclick="AppointmentCloseBtns()" class="text-red-400 mt-5 hover:text-red-600">Close</button>
  </div>
</div>




<script src="{{asset('js/jquery.js')}}"></script>
<script>
  $(document).ready(function () {
    ForgotClosebtn();

  });
  function ForgotClosebtn(){
    $('#forgot-close-btn').click(function (e) { 
      e.preventDefault();
      $('#forgot-account-modal').removeClass('block');
      $('#forgot-account-modal').addClass('hidden');
    });



  }


</script>