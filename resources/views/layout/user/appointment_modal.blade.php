<div id="make-appointment-modal" class=" hidden fixed h-screen w-full bg-black bg-opacity-50 z-10">
  <div class=" sm:w-4/5 md:w-1/2 lg:w-1/2 xl:w-1/4 2xl:w-1/4 h-auto bg-white mx-auto mt-20 rounded-md p-5">
    <p class="text-center font-bold text-cyan-600 text-xl"> SET APPOINTMENT NOW!</p>
    <form id="make-appointment-form" class="" enctype="multipart/form-data">
      @csrf
      <p></p>
      <div class="flex space-x-5 mb-2">
        <div class="w-full">
          <input type="hidden" id="app-id" name="id">
          <p class="text-sm font-semibold text-gray-500">DATE</p>
        <input type="date" id="app-date" name="app_date" class=" shadow-md border-2 w-full border-gray-500 rounded-md px-5 py-2">
        </div>
        <div class="w-full">
          <p class="text-sm font-semibold text-gray-500" >TIME</p>
        <input type="time" id="app-time" name="app_time" class=" shadow-md border-2 w-full border-gray-500 rounded-md px-5 py-2">
        </div>
      </div>
      <div class=" w-full">
        <p class="text-sm font-semibold text-gray-500" >STATE YOUR PURPOSE OF APPOINTMENT</p>
        <textarea id="app-description" name="app_description" class=" shadow-md border-2 border-gray-500 rounded-md px-5 py-2 w-full" placeholder="Write here"  name="other-reasons" ></textarea>
      </div>
      <div class="w-full">
        <button type="submit" id="update-app" class="w-full bg-green-600 font-semibold text-gray-100 rounded-md py-2">SUBMIT</button>
        <div class="flex w-full justify-center pr-5 pt-5">
        <button type="button" id="close-make-appointment" class="font-semibold text-gray-600 hover:underline">CLOSE</button>
        </div>
      </div>
    
    </form>
  
  </div>
</div>


        {{-- MY APPOINTMENT HISTORY DETAILS MODAL  --}}
<div id="view-appointment-modal" class=" hidden fixed h-screen w-full bg-black bg-opacity-50 z-10">
  <div class=" sm:w-4/5 md:w-1/2 lg:w-1/2 xl:w-1/4 2xl:w-1/4 h-auto bg-white mx-auto mt-20 rounded-md p-5">
    <div id="my-appointment-details" class="">

    </div>
  </div>
</div>

        {{-- MY APPOINTMENT HISTORY DETAILS MODAL  --}}
<div id="view-scheduled-appointment-modal" class=" hidden fixed h-screen w-full bg-black bg-opacity-50 z-10">
  <div class=" sm:w-4/5 md:w-1/2 lg:w-1/2 xl:w-1/4 2xl:w-1/4 h-auto bg-white mx-auto mt-20 rounded-md p-5">
    <p class="text-xl font-bold text-cyan-600 text-center mb-5">SCHEDULED TIME</p>
    <table id="scheduled-appointment-details" class=" w-full text-center">
      <thead class="w-full text-gray-500">
        <tr>
          <th>TIME</th>
          <th>STATUS</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    <div class="flex justify-center"><button id="close-scheduled-appointments" class="hover:underline text-sm font-semibold bg-green-500 text-white px-3 py-1 rounded-md ">CLOSE</button></div>
  </div>
</div>





<script>
  $(document).ready(function () {
    Make_Appointment()
  });
  function Make_Appointment(){
    $('#make-appointment-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0]);
      $.ajax({
        type: "POST",
        url: "{{url('create-appointment')}}",
        data: formdata,
        contentType: false,
        processData: false,
        success: function (data) {
          if(data.success){
            $('#make-appointment-form')[0].reset();
            $('#make-appointment-modal').removeClass('block');
            $('#make-appointment-modal').addClass('hidden');
            window.alert(data.success)
            Appointments()

          }
          else{
            window.alert(data.failed)

          }
        }
      });
      
    });
  }
</script>



