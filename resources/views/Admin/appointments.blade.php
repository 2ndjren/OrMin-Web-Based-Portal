@extends('layout.admin.layout')
@include('layout.admin.modals.appointment')

@section('appointments')
<title>Appointments</title>

<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Appointments</p>
  <div class="flex justify-end">
  </div>

  <div class="bg-white w-full rounded-md p-5 mb-2 mt-2">
    <p class="font-semibold text-yellow-500 text-lg">Ongoing</p>
    <div id="ongoing-appointment" class="text-center"> 
   
    </div>
  </div>

  <div class=" sm:block md:flex lg:flex  max-h-screen lg:space-x-2 sm:space-y-2 lg:space-y-0 lg:mb-2">
    <div class="w-full bg-white rounded-md p-5  ">
    <p class="font-semibold text-yellow-500 text-lg">Next</p>
    <div class="w-full">
      <div id="next-app-user" class="font-semibold text-blue-500  text-center">
   

    </div>
  </div>
    </div>
    <div class="sm:w-full lg:w-96 bg-white rounded-md p-5 ">
    <div class="flex justify-center lg:space-x-2 w-full ">
      <button type="button" id="open-create-app-modal" class="px-2 py-1 rounded-md bg-yellow-500 text-white font-semibold ">Create</button>
      <button type="button" class="px-2 py-1 rounded-md bg-green-500 text-white font-semibold ">Next</button>
    </div>
    </div>
  </div>
  <div class=" sm:block md:flex lg:flex  max-h-screen sm:space-y-2 lg:space-y-0 lg:space-x-2 sm:mt-2">
    <div class="w-full bg-white rounded-md p-5  ">
      <p class="font-semibold text-lg text-green-500 text-center">Appointment List</p>
      <div id="app-list"></div>
    </div>
    <div class="w-full bg-white rounded-md p-5 ">
      <p class="font-semibold text-lg text-green-500 text-center">Incomming Request</p>
      <div id="app-request">

      </div>
    </div>
  </div>

</div>



<div id="create-appointment-modal" class=" hidden  fixed md:px-5  lg:px-5 inset-0 flex items-center justify-center z-10  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/4 h-auto mx-auto rounded-lg p-4 shadow-lg  ">
    <div id="decline-membership-note" class="w-full">
      <div class="sm:h-screen lg:h-20 sm:block lg:hidden md:hidden"></div>
      <p class="font-semibold text-center">Create Appointment</p>
      <div class="p-4 border-b">
        <input type="text" id="search" placeholder="Search..." class="w-full px-4 py-2 border rounded-full">
        <div  id="users" class="mt-1 hidden z-50">
          <div  id="search-loading-spinner" class='hidden p-4  border-t border-red-500 rounded-full animate-spin h-5 w-5'> </div>
          <div id="results" class="rounded-md h-72 overflow-y-auto">
          </div>

        </div>
      </div>
   
    </div>
    <form class="hidden" id="create-app-form">
        @csrf


        <div class="flex justify-end space-x-2">
          <button id="close-create-donation-record-btn" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Cancel</button>
          <button class="bg-green-500 font-semibold text-white p-2 rounded-md" type="submit">Save</button>
        </div>
      </form>
     <div class="flex justify-center">
     <button class="close-create-app-btn bg-gray-500 mt-2 font-semibold text-white p-2 rounded-md" type="button">Back</button>
     </div> 
  </div>
</div>

<div id="show-donation-details-modal" class="fixed  hidden inset-0 flex items-center justify-center z-10  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg shadow-lg ">
    <div id="donation-details" class="block  p-10"></div>

  </div>
</div>


<div id="set-appointment-modal" class="hidden fixed inset-0 flex items-center justify-center z-20  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full md:w-1/2  lg:w-screen  lg:h-screen mx-auto shadow-lg ">
  <div class="flex">
    <div id="existing-appointment" class="h-auto p-10 hidden w-full"></div>
    <div id="appointment" class="hidden  p-10">
      <form id="create-appointment-form">
        @csrf
        <p>Set now!</p>
        <div  id="app-user-data"></div>
        <div class="flex lg:space-x-2 sm:space-y-2 lg:space-y-0">
            <div class="">
              <p>Date</p>
              <input type="date"  class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="app_date" id="">
          </div>
            <div class="">
              <p>Time</p>
              <select  class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="app_time" id="">
              <option value="">Select</option>
              <option value="8:30 AM">8:30 AM</option>
              <option value="9:30 AM">9:30 AM</option>
              <option value="10:30 AM">10:30 AM</option>
              <option value="11:30 AM">11:30 AM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>      
            </select>
          </div>
          <div class="">
            <p>Status</p>
            <select  class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="status" id="">
            <option value="">Select</option>
            <option value="Pending">Pending</option>
            <option value="Approved">Approve</option>
            <option value="Ongoing">Ongoing</option>
          </select>
        </div>
        </div>
        <div class="flex">
       
        </div>
        <input type="hidden" id="user-app-id" name="u_id" >
        @if(session('ADMIN'))
        <input type="hidden"  name="e_id"  value="{{session('ADMIN')['id']}}">
        @elseif(session('STAFF'))
        <input type="hidden"  name="e_id"  value="{{session('STAFF')['id']}}">
        @endif
        <textarea class="form-inputs mt-2 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Description!"  name="app_description" id="" cols="30" rows="3"></textarea>
        <textarea class="form-inputs mt-2 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Add note(optional)!"  name="note" id="" cols="30" rows="3"></textarea>
        <div class="flex justify-center space-x-2  mt-2"> 
          <button type="button"  class="close-set-app-modal p-2 bg-green-500 text-white font-semibold rounded-md">Cancel</button>
          <button type="submit" class="p-2 bg-red-500 text-white font-semibold rounded-md">Save</button>
        </div>
      </form>
    </div>
    <div class="w-full p-10">
      <div id="scheduled-appointment">

      </div>
    </div>
    
  </div>
  <div id="close-modal-app"  class=" hidden flex justify-center space-x-2  mt-2"> 
          <button type="button"  class="close-set-app-modal  p-2 bg-green-500 text-white font-semibold rounded-md">Back</button>
    </div>
  <div id="close-user-app-details" class=" hidden flex justify-center space-x-2  mt-2"> 
          <button type="button"  class="close-user-details p-2 bg-green-500 text-white font-semibold rounded-md">Back</button>
    </div>

  </div>
</div>


<script>
  $(document).ready(function () {
    Search_User()
    HandleSearch()
    Appointment_Btn()
    Submitted_Appointments()
    Approved_Pending()
  });
  function Search_User(){
    $('#search').on('input', function () {
      var search_user=$(this).val()
      if(search_user!=="")
      {

        $('#users').removeClass('hidden')
        $('#inboxThreads').addClass('hidden')
        HandleSearch(search_user)
      }else{
        $('#results').empty()
        $('#inboxThreads').removeClass('hidden')
        $('#users').addClass('hidden')
      }
    });
  }
  function HandleSearch(search_user)
  {
    $('#results').empty()
   
    $.ajax({
        type: "GET",
        url: "/search-user-appointment/"+search_user,
        data: "data",
        dataType: "json",
        success: function (data) {
          $('#results').empty()
          if(data.match){
            $.each(data.match, function (index, field) { 
            var results="<button type='button' data-id="+field.id+"  class='get-user set-app-user-details show-user-details p-3 w-full rounded-full h-16 mb-1 bg-gray-400 text-white'>"
            results+="<div class='flex space-x-2'>"
            results+="<div>"
            if(field.vol_profile!==""){
              results+="<img src=data:image/jpeg;base64,"+field.user_profile+" class='h-10 w-10 rounded-full border-2 border-blue-500'>"
            }else{
              results+="<img src=data:image/jpeg;base64,"+field.user_profile+" class='h-10 w-10 rounded-full border-2 border-blue-500'>"

            }
            results+="</div>"
            results+="<div class='pt-2'>"
            results+="<p>"+field.fname+" "+field.lname+"</p>"

            results+="</div>"
            results+="</div>"
            results+="</button>"
             $('#results').append(results)
          });
          }else if(data.results){
            var results="<p class='text-center'>"+data.results+"<p>"
          $('#results').append(results)
          }
         
        },
        error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
      });
  }
  function Appointment_Btn(){
    $('#open-create-app-modal').click(function (e) { 
      e.preventDefault();
      $('#create-appointment-modal').removeClass('hidden')
      
    });
    $('.close-create-app-btn').click(function (e) { 
      e.preventDefault();
      $('#create-appointment-modal').addClass('hidden')
      $('#create-app-form').addClass('hidden')
      
      $('#search').val("")
      $('#results').empty()
        $('#inboxThreads').removeClass('hidden')
        $('#users').addClass('hidden')
      $('#create-app-form')[0].reset()
      
    });
    $(document).on('click','.set-app-user-details',function(){
      var id=$(this).data('id')
      $('#scheduled-appointment').empty()
      $.ajax({
        type: "GET",
        url: "/set-user-app-details/"+id,
        data: "data",
        dataType: "json",
        success: function (user) {
          console.log(user)  
          if(user.check>0){
            var existing="<div>"
            existing+="<p><span>Name: </span>"+user.user.fname+" "+user.user.lname+"</p>"
            existing+="<p><span>Age: </span>"+user.user.age+"</p>"
            var bday = new Date(user.user.bday);
          var day = bday.getDate(); 
          var month = bday.getMonth() + 1; 
          var year = bday.getFullYear(); 
          var months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
          ];

var monthss = months[month - 1];
            existing+="<p><span>Birthday: </span>"+monthss+" "+day+", "+year+"</p>"
            existing+="<p><span>Gender: </span>"+user.user.gender+"</p>"
            existing+="<p><span>Email: </span>"+user.user.email+"</p>"
            existing+="<p><span>Date: </span>"+user.exist.app_date+"</p>"
            existing+="<p><span>Time: </span>"+user.exist.app_time+"</p>"
            existing+="<p><span>Status: </span>"+user.exist.status+"</p>"

            existing+="</div>"
           
            $('#existing-appointment').append(existing); 
              $('#set-appointment-modal').removeClass('hidden')
              $('#close-modal-app').removeClass('hidden')
              $('#close-user-app-details').addClass('hidden')

            $('#create-appointment-modal').addClass('hidden')
            
          }else if(user.check===0){
            $('#app-user-data').empty(); 
            $('#scheduled-appointment').empty()
            var existing="<div>"
            existing+="<p><span>Name:</span>"+user.user.fname+" "+user.user.lname+"</p>"
            existing+="<p><span>Age:</span>"+user.user.age+"</p>"
            var bday = new Date(user.user.bday);
          var day = bday.getDate(); 
          var month = bday.getMonth() + 1; 
          var year = bday.getFullYear(); 
          var months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
          ];

var monthss = months[month - 1];
            existing+="<p><span>Birthday: </span>"+monthss+" "+day+", "+year+"</p>"
            existing+="<p><span>Gender: </span>"+user.user.gender+"</p>"
            existing+="<p><span>Email: </span>"+user.user.email+"</p>"

            existing+="</div>"
            $('#app-user-data').append(existing); 
            $('#appointment').removeClass('hidden')
            $('#user-app-id').val(user.user.id);
            
          }
          
          var schedules="<div class='columns:3'>"
          $.each(user.group_sched, function (index, sched_date) { 
            var bday = new Date(sched_date.app_date);
            var day = bday.getDate(); 
            var month = bday.getMonth() + 1; 
            var year = bday.getFullYear(); 
            var months = [
              "January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"
            ];
            var monthss = months[month - 1];

         
            schedules+="<div>"
            schedules+="<div>"
            schedules+="<p>"+monthss+" "+day+", "+year+"</p>"
            $.each(user.sched, function (index, field) { 
              if(sched_date.app_date===field.app_date){
               schedules+="<div class='pl-10'>"
              schedules+="<p>"+field.app_time+"</p>"
              schedules+="</div>"
            }
            schedules+="</div>"
             
            });
             
            schedules+="</div>"
         
          });
          schedules+="</div>"
            $('#scheduled-appointment').append(schedules)
          
          $('#set-appointment-modal').removeClass('hidden')
        $('#create-appointment-modal').addClass('hidden')
        }
      });
    });
    $(document).on('click','.ongoing-app-user-details',function(){
      var id=$(this).data('id')
      $('#scheduled-appointment').empty()
      $.ajax({
        type: "GET",
        url: "/set-user-app-details/"+id,
        data: "data",
        dataType: "json",
        success: function (user) {
          console.log(user)  
          if(user.check>0){
            var existing="<div>"
            existing+="<p><span>Name: </span>"+user.user.fname+" "+user.user.lname+"</p>"
            existing+="<p><span>Age: </span>"+user.user.age+"</p>"
            var bday = new Date(user.user.bday);
          var day = bday.getDate(); 
          var month = bday.getMonth() + 1; 
          var year = bday.getFullYear(); 
          var months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
          ];

var monthss = months[month - 1];
            existing+="<p><span>Birthday: </span>"+monthss+" "+day+", "+year+"</p>"
            existing+="<p><span>Gender: </span>"+user.user.gender+"</p>"
            existing+="<p><span>Email: </span>"+user.user.email+"</p>"
            existing+="<p><span>Date: </span>"+user.exist.app_date+"</p>"
            existing+="<p><span>Time: </span>"+user.exist.app_time+"</p>"
            existing+="<p><span>Status: </span>"+user.exist.status+"</p>"

            existing+="</div>"
           
            $('#existing-appointment').append(existing); 
              $('#set-appointment-modal').removeClass('hidden')
              $('#close-modal-app').addClass('hidden')
              $('#close-user-app-details').removeClass('hidden')

            $('#create-appointment-modal').addClass('hidden')
            
          }else if(user.check===0){
            $('#app-user-data').empty(); 
            $('#scheduled-appointment').empty()
            var existing="<div>"
            existing+="<p><span>Name:</span>"+user.user.fname+" "+user.user.lname+"</p>"
            existing+="<p><span>Age:</span>"+user.user.age+"</p>"
            var bday = new Date(user.user.bday);
          var day = bday.getDate(); 
          var month = bday.getMonth() + 1; 
          var year = bday.getFullYear(); 
          var months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
          ];

var monthss = months[month - 1];
            existing+="<p><span>Birthday: </span>"+monthss+" "+day+", "+year+"</p>"
            existing+="<p><span>Gender: </span>"+user.user.gender+"</p>"
            existing+="<p><span>Email: </span>"+user.user.email+"</p>"

            existing+="</div>"
            $('#app-user-data').append(existing); 
            $('#appointment').removeClass('hidden')
            $('#user-app-id').val(user.user.id);
            
          }
          
          var schedules="<div class='columns:3'>"
          $.each(user.group_sched, function (index, sched_date) { 
            var bday = new Date(sched_date.app_date);
            var day = bday.getDate(); 
            var month = bday.getMonth() + 1; 
            var year = bday.getFullYear(); 
            var months = [
              "January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"
            ];
            var monthss = months[month - 1];

         
            schedules+="<div>"
            schedules+="<div>"
            schedules+="<p>"+monthss+" "+day+", "+year+"</p>"
            $.each(user.sched, function (index, field) { 
              if(sched_date.app_date===field.app_date){
               schedules+="<div class='pl-10'>"
              schedules+="<p>"+field.app_time+"</p>"
              schedules+="</div>"
            }
            schedules+="</div>"
             
            });
             
            schedules+="</div>"
         
          });
          schedules+="</div>"
            $('#scheduled-appointment').append(schedules)
          
          $('#set-appointment-modal').removeClass('hidden')
        $('#create-appointment-modal').addClass('hidden')
        }
      });
    });
    $('.close-set-app-modal').click(function (e) { 
      e.preventDefault();
      $('#app-user-data').empty(); 
      $('#existing-appointment').empty(); 
      $('#set-appointment-modal').addClass('hidden')
      $('#create-appointment-modal').removeClass('hidden')
    });
    $('.close-user-details').click(function (e) { 
      e.preventDefault();
      $('#app-user-data').empty(); 
      $('#existing-appointment').empty(); 
      $('#set-appointment-modal').addClass('hidden')
      // $('#create-appointment-modal').removeClass('hidden')
    });
    $('#create-appointment-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0])
      $.ajax({
        type: "POST",
        url: "{{url('create-appointment')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(response)
          if(response.success){
        $('#appointment').addClass('hidden')
        $('#app-user-data').empty()
        $('#create-appointment-form')[0].reset()
        $('#set-appointment-modal').addClass('hidden')
        $('#create-appointment-modal').removeClass('hidden')
            alert(response.success)
          }else if(response.failed){
            alert(response.failed)
          }
          
        }
      });
      
    });
  }
  function Submitted_Appointments(){
    $.ajax({
      type: "GET",
      url: "/submitted-appointments",
      data: "data",
      dataType: "json",
      success: function (app) {
        console.log(app)
      if(app.ongoing!==null){
        var on_meeting="<button class='ongoing-app-user-details' data-id="+app.ongoing.u_id+"  type='button' id='ongoing-appointment'>"
        on_meeting+="<p id='ongoing-appointment-user' class='text-green-500 font-bold text-4xl text-center'>"+app.ongoing_user.fname+" "+app.ongoing_user.lname+"</p>"
        on_meeting+="<p id='ongoing-appointment-time' class='text-green-500 font-bold text-lg text-center'>"+app.ongoing.app_date+", "+app.ongoing.app_time+"</p>"
        on_meeting+="</button>"
        $('#ongoing-appointment').append(on_meeting)
      }else{
        var on_meeting="<button class='set-app-user-details'  type='button'>"
        on_meeting+="<p id='ongoing-appointment-user' class='text-green-500 font-bold text-4xl text-center'>...</p>"
        on_meeting+="<p id='ongoing-appointment-time' class='text-green-500 font-bold text-lg text-center'>...</p>"
        on_meeting+="</button>"
        $('#ongoing-appointment').append(on_meeting)

      }
      if(app.next!==null){
        var next_meeting="<button class='set-app-user-details' data-id="+app.next.u_id+"  type='button' id='ongoing-appointment'>"
        next_meeting+="<p id='next-app-user' class='text-green-500 font-bold text-lg text-center'>"+app.next_user.fname+" "+app.next_user.lname+"</p>"
        next_meeting+="<p id='ongoing-appointment-time' class='text-green-500 font-bold text-sm text-center'>"+app.next.app_date+", "+app.next.app_time+"</p>"
        next_meeting+="</button>"
        $('#next-app-user').append(next_meeting)
      }else{
        var on_meeting="<button class='set-app-user-details' type='button'>"
        on_meeting+="<p id='next-app-user' class='text-green-500 font-bold text-md text-center'>...</p>"
        $('#next-app-user').append(on_meeting)
        
      }
      if(app.pending){

      }
        
        
      },
      error: function(xhr, status, error) {
        // Handle error response here
        console.log(xhr.responseText);
      }
    });
  }
  function Approved_Pending(){
    $.ajax({
      type: "GET",
      url: "/submitted-appointments",
      data: "data",
      dataType: "json",
      success: function (app) {
        console.log(app)
        if(app.approved>0){
          $.each(app.approved, function (index, field) { 
          var app_list="<div class='text-center'>"
        app_list+="<p>"+field.app_time+"</p>"
        app_list+="</div>"
        $('#app-list').append(app_list)
        });
        }else{
          var app_list="<div class='text-center'>"
        app_list+="<p>No results found!</p>"
        app_list+="</div>"
        $('#app-list').append(app_list)
        }
        if(app.pending>0){
        $.each(app.pending, function (index, field) { 
                  var app_list="<div class='text-center'>"
                app_list+="<p>No results found!</p>"
                app_list+="</div>"
                $('#app-request').append(app_list)
                });
        }else{
          var app_list="<div class='text-center'>"
                app_list+="<p>No results found!</p>"
                app_list+="</div>"
                $('#app-request').append(app_list)
        }
        
      }
    });
  }

</script>
@endsection