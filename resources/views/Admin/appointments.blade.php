@extends('layout.admin.layout')
@include('layout.admin.modals.appointment')

@section('appointments')
<title>Appointments</title>
<div class="py-10 px-10 h-auto ">

  <p class="text-3xl font-medium mb-5"><i class="fa-regular fa-calendar-check"></i>  Appointments</p>
  <div class=" sm:block md:block lg:flex xl:flex 2xl:flex">
     <button id="appointmentsbtn" class=" px-10 py-2 bg-white hover:bg-green-600 hover:text-white text-green-600 m-2 shadow-sm" type="button">Appointments</button>
     <button id="requestbtn" class=" px-10 py-2 bg-white hover:bg-green-600 hover:text-white text-green-600 m-2 shadow-sm" type="button">Request</button>
     <button id="historybtn" class=" px-10 py-2 bg-white hover:bg-green-600 hover:text-white text-green-600 m-2 shadow-sm" type="button">History</button>
  </div>
<div class="h-auto">
  <div id="appointments" class="sm:block md:block lg:block xl:block 2xl:block ">
    <div class=" sm:block md:flex lg:block xl:flex 2xl:flex xl:w-full 2xl:w-full">
      <div class=" flex-auto p-3 h-32 sm:w-full md:w-96  m-3 lg:w-full  xl:w-full 2xl:w-full shadow-lg bg-white rounded-sm">
      <table id="appointment-ongoing-table" class="w-full">
          <thead class=" ">
            <tr class="text-white border-b border-gray-400 ">
              <th class="text-left text-blue-500"><i class="fa-regular fa-handshake"></i>  ONGOING MEETING</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <div class=" sm:block md:block lg:flex xl:flex 2xl:flex lg:w-full xl:w-full 2xl:w-full">
      <div class=" flex-auto p-3 h-96 sm:w-full md:w-full  m-3   lg:w-1/2  xl:w-full 2xl:w-1/3 shadow-lg bg-white rounded-sm ">
        <div class=" h-72 border-b border-gray-400 shadow-sm mb-2">
          <p class="text-lg text-left font-bold text-gray-800"><i class="fa-solid fa-list"></i>   WAITING LIST</p>
    @include('layout.admin.datatables.appointments.appointments')
        </div>
        <div class="w-full flex justify-end">
          <a type="button" href="{{url('print-waiting-list')}}" class="px-5 py-2 shadow-sm bg-green-500 text-white rounded-md"><i class="fa-solid fa-download"></i> Export</a>
        </div>
        
      </div>

    </div>
  </div>
  <div id="request" class=" sm:hidden md:hidden lg:hidden xl:hidden 2xl:hidden">
    <div class=" sm:block md:block lg:flex xl:flex 2xl:flex 2xl:w-full">
      <div class=" flex-auto p-3 h-96 sm:w-full md:w-full  m-3   lg:w-full  xl:w-full 2xl:w-full shadow-lg bg-white rounded-sm">
      <p class="text-lg text-left my-5 font-bold text-gray-800"><i class="fa-solid fa-list"></i>  PENDING APPOINTMENT REQUEST LIST</p>
    @include('layout.admin.datatables.appointments.request')
     
      </div>
    </div>

  </div>
  <div id="history" class= "sm:hidden md:hidden lg:hidden xl:hidden 2xl:hidden">
    <div class=" sm:block md:block lg:flex xl:flex 2xl:flex 2xl:w-full">
      <div class=" flex-auto p-3 h-96 sm:w-full md:w-full    lg:w-full  xl:w-full 2xl:w-full shadow-lg bg-white rounded-sm">
      <p class="text-lg text-left my-5 font-bold text-gray-800"><i class="fa-solid fa-list"></i> APPOINTMENT HISTORY</p>
      @include('layout.admin.datatables.appointments.history')

     
      </div>
    </div>
  </div>
  
</div>
<div class="h-screen">
<div id="approvedlist" class= "sm:block md:block lg:block xl:block 2xl:block">
    <div class=" h-full sm:block md:block lg:flex xl:flex 2xl:flex 2xl:w-full ">
      <div class=" flex-auto h-96 sm:w-full md:w-full   lg:w-full  xl:w-full 2xl:w-full shadow-lg bg-white rounded-sm p-5">
        <div class="h-72 border-b border-gray-600 mb-2">
        <p class="text-lg text-left my-2 font-bold text-gray-800"><i class="fa-regular fa-square-check"></i>   APPROVED APPOINTMENTS LIST</p>
      <div class="flex justify-end w-full">
            <form class="search-input">
            <input type="text"  class="py-0 rounded-sm w-72 my-2" placeholder="Search here..." name="search">
            </form>
        </div>
      <table id="appointment-approved-ongoing-table" class="w-full border border-gray-600">
          <thead class="bg-green-500">
            <tr class="text-white border border-gray-600">
              <th class="border border-gray-600">ID</th>
              <th class="border border-gray-600">Name</th>
              <th class="border border-gray-600">Status</th>
              <th class="border border-gray-600 w-32">Show Details</th>

            </tr>
          </thead>
          <tbody></tbody>
        </table>
        
      </div>
             <div class="w-full flex justify-end">
          <a type="button" href="{{url('print-approved-list')}}" class="px-5 py-2 shadow-sm bg-green-500 text-white rounded-md"><i class="fa-solid fa-download"></i> Export</a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<div id="table-container"></div>


<script>
    $(document).ready(function () {
      ActiveAppointmentsButton()
      // ONGOING 
      Ongoing_Appointments()
      Finish_Ongoing_Appointments()
      Ongoing_Appointments_Btn()

      AppointmentOnhHoverButtons()
      // APPROVE ONGOING
      Ongoing_Approved_Appointments()
      Approve_Ongoing_User_Profile_Modal_Btn()
      ProceedOngoing()

      
      Pending_Appointments()
      // HISTORY 
      Decline_Done_Appointments()
      History_Profile_Modal_Btn()

      // WAITING 
      Waiting_Appointments()
      ProceedWaiting()
      Proceed_Waiting_On_Going()
      Waiting_Close_Profile_Modal_Btn()


      // PENDING
      Pending_Appointment_Close_Btn()
      Open_Appointment_Decline_Form_Modal()
      Submit_Decline_Appointment_Form()
      Submit_Approved_Appointment_Form()


      // PRINT 
      PrintBtn()
  });
  // ONGOING 
  function Ongoing_Appointments(){
    $.ajax({
        type: "GET",
        url: "{{url('ongoing-appointments')}}",
        data: "data",
        dataType: "json",
        success: function (all) {
          $('#appointment-ongoing-table tbody').empty()
          if(all.status==="ONGOING"){

            $.ajax({
              type: "GET",
              url: "/ongoing-user-appointment/"+all.u_id,
              data: "data",
              dataType: "json",
              success: function (user) {

                var row = "<tr class='text-center '>";
          row += "<td class=''><button type='button' class='ongoing-appointment-modal-btn text-3xl text-green-500' data-id='"+user.id+"'>"+user.fname+" "+user.mname+" "+user.lname+"</button> </br><p>"+all.app_date+"</br> "+all.app_time+"</p></td>";
          row += "</tr>";
          
          $("#appointment-ongoing-table tbody").append(row);

   

              }
            });



          
          }
          else{
            var row = "<tr class='text-center '>";
          row += "<td class=''><p class='text-gray-400  text-center text-lg'>No Ongoing Appointments</p></td>";
          row += "</tr>";
          
          $("#appointment-ongoing-table tbody").append(row);
    
          }
        }
      });
    }

    $(document).on('click', '.ongoing-appointment-modal-btn', function() {
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/ongoing-inforamtion-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (request) {
       $.ajax({
        type: "GET",
        url: "/ongoing-user-appointment/"+id,
        data: "data",
        dataType: "json",
        success: function (profile) {
       
        $('#appointment-ongoing-profile-modal').removeClass('hidden');
        $('#appointment-ongoing-profile').attr('src',profile.user_profile);
          $('#appointment-ongoing-fullname').text(profile.fname+" "+profile.mname+" "+profile.lname);
          $('#appointment-ongoing-date').text(request.app_date);
          $('#appointment-ongoing-time').text(request.app_time);
          $('#appointment-ongoing-status').text(request.status);
          $('#appointment-ongoing-description').text(request.app_description);
          $('#appointment-done-appointment-btn').attr('data-id',request.id);
        }
       });
      }
    });
});

function Finish_Ongoing_Appointments(){
  $('#appointment-done-appointment-btn').click(function (e) { 
  e.preventDefault();
  var id=$(this).data('id');
  $.ajax({
    type: "GET",
    url: "/finish-ongoing-appointment/"+id,
    data: "data",
    dataType: "json",
    success: function (data) {
      console.log(data)
      Ongoing_Appointments()
      Decline_Done_Appointments()

      $('#appointment-ongoing-profile-modal').removeClass('block');
 $('#appointment-ongoing-profile-modal').addClass('hidden');
 window.alert(data.success)


    }
  });
  
});
}

function Ongoing_Appointments_Btn(){
  $('#ongoing-appointment-modal-form-close-btn').click(function(){
 $('#appointment-ongoing-profile-modal').removeClass('block');
 $('#appointment-ongoing-profile-modal').addClass('hidden');
  });
}




  function Ongoing_Approved_Appointments(){
    $('#appointment-approved-ongoing-table tbody').empty();

    $.ajax({
        type: "GET",
        url: "{{url('approved-ongoing-appointments')}}",
        data: "data",
        dataType: "json",
        success: function (all) {
          $("#appointment-approved-ongoing-table tbody").empty();

          $.each(all, function (index, all) {
            $.ajax({
              type: "GET",
              url: "/approved-ongoing-user-appointment/"+all.u_id,
              data: "data",
              dataType: "json",
              success: function (user) {


                var row = "<tr class='text-center border border-gray-600 '>";
          row += "<td class='border border-gray-600'>"+all.id+"</td>";
          row += "<td class='border border-gray-600'>" + user.fname +" "+ user.mname +" "+user.lname+ "</td>";
          row += "<td class='border border-gray-600'>"+all.status+"</td>";
          row += "<td class='border border-gray-600'><button class='approve-appointment-profile-modal-btn' type='button' data-id='"+all.id+"'><i class='fa-solid fa-eye'></i></button></td>";
          row += "</tr>";
          $('#appointment-waiting-ongoing-appointment-btn').data('id',all.id)
                    $("#appointment-approved-ongoing-table tbody").append(row);

              }
            });
      }); 
        }
      });
    }

    $(document).on('click', '.approve-appointment-profile-modal-btn', function() {
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/approve-ongoing-information-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (request) {
        console.log(request)
       $.ajax({
        type: "GET",
        url: "/approve-ongoing-user-appointment/"+request.u_id,
        data: "data",
        dataType: "json",
        success: function (profile) {
          console.log(profile)
       
        $('#appointment-ongoing-approve-profile-modal').removeClass('hidden');
        $('#appointment-approve-ongoing-profile').attr('src',profile.user_profile);
          $('#appointment-approve-ongoing-fullname').text(profile.fname+" "+profile.mname+" "+profile.lname);
          $('#appointment-approve-ongoing-date').text(request.app_date);
          $('#appointment-approve-ongoing-time').text(request.app_time);
          $('#appointment-approve-ongoing-status').text(request.status);
          $('#appointment-approve-ongoing-description').text(request.app_description);
          $('#appointment-proceed-ongoing-appointment-btn').attr('data-id',request.id);
          $('#appointment-waiting-ongoing-appointment-btn').attr('data-id',request.id);
        }
       });
      }
    });
});

function ProceedOngoing(){
  $('#appointment-proceed-ongoing-appointment-btn').click(function(){
    var id =$(this).data('id');
    $.ajax({
      type: "GET",
      url: "/proceed-ongoing-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (data) {
        console.log(data)
        if(data.success){
          Pending_Appointments()
          Ongoing_Approved_Appointments()
          window.alert(data.success)
      Ongoing_Appointments();
        $('#appointment-ongoing-approve-profile-modal').addClass('hidden');
        $('#appointment-ongoing-approve-profile-modal').removeClass('block');
        }else{
          window.alert(data.failed)

        }
      }
    });
  });
}
function ProceedWaiting(){
  $('#appointment-waiting-ongoing-appointment-btn').click(function(){
    var id =$(this).data('id');
    $.ajax({
      type: "GET",
      url: "/proceed-waiting-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (data) {
        console.log(data)
        if(data.success){
          Waiting_Appointments()
          Ongoing_Approved_Appointments()
          Ongoing_Appointments();
          $('#appointment-ongoing-approve-profile-modal').addClass('hidden');
          $('#appointment-ongoing-approve-profile-modal').removeClass('block');
          window.alert(data.success)
        }else{
          window.alert(data.failed)

        }
      }
    });
  });
}

function Approve_Ongoing_User_Profile_Modal_Btn(){
  $('#approve-ongoing-appointment-modal-form-close-btn').click(function (e) { 
    e.preventDefault();
    $('#appointment-ongoing-approve-profile-modal').addClass('hidden');
    $('#appointment-ongoing-approve-profile-modal').removeClass('block');

    
  });
}

    // ONGOING PROFILE  MODAL 




    // PENDING REQUEST 
    
  function Pending_Appointments(){
      $.ajax({
        type: "GET",
        url: "{{url('pending-appointments')}}",
        data: "data",
        dataType: "json",
        success: function (all) {
          $("#appointment-pending-table tbody").empty()
          $.each(all, function (index, all) {
            $.ajax({
              type: "GET",
              url: "/pending-user-appointment/"+all.u_id,
              data: "data",
              dataType: "json",
              success: function (user) {
                var row = "<tr class='text-center border border-gray-600 '>";
          row += "<td class='border border-gray-600'>"+all.id+"</td>";
          row += "<td class='border border-gray-600'>" + user.fname +" "+ user.mname +" "+user.lname+ "</td>";
          row += "<td class='border border-gray-600'>"+all.app_date+"</td>";
          row += "<td class='border border-gray-600'>"+all.app_time+"</td>";
          row += "<td class='border border-gray-600'><button type='button' class='pending-request-view-btn'  data-id='"+user.id+"'><i class='fa-solid fa-eye'></i></button></td>";
          row += "</tr>";
          $("#appointment-pending-table tbody").append(row);

              }
            });
      }); 
        }
      });
    }
    $(document).on('click', '.pending-request-view-btn', function() {
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/pending-user-inforamtion-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (request) {
       $.ajax({
        type: "GET",
        url: "/pending-inforamtion-appointment/"+id,
        data: "data",
        dataType: "json",
        success: function (profile) {
          $('#appointment-pending-request-profile-modal').removeClass('hidden');
          $('#appointment-pending-request-fullname').text(profile.fname+" "+profile.mname+" "+profile.lname);
          $('#appointment-pending-request-date').text(request.app_date);
          $('#appointment-pending-request-time').text(request.app_time);
          $('#appointment-pending-request-status').text(request.status);
          $('#appointment-pending-request-description').text(request.app_description);
          $('#app-form-id').val(request.id);
          $('#appointment-pending-request-profile').attr('src',profile.user_profile);
          $('#appointment-open-decline-form-btn').attr('data-id',request.id);
          $('#appointment-approve-appointment-request-btn').attr('data-id',request.id);
        }
       });
      }
    });
});

function Submit_Approved_Appointment_Form(){
  $('#appointment-approve-appointment-request-btn').click(function (e) { 
    e.preventDefault();
    var id= $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/approved-user-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (data) {
        if(data.success){
          $('.appointment-decline-info-modal-form').removeClass('block');
          $('.appointment-decline-info-modal-form').addClass('hidden');
          $('#appointment-pending-request-profile-modal').removeClass('block');
          $('#appointment-pending-request-profile-modal').addClass('hidden');
         Pending_Appointments()
         Decline_Done_Appointments()
         Ongoing_Approved_Appointments()
         
          window.alert(data.success)
        }else{
          window.alert(data.failed)
          
        }
      }
    });


  });
}
function Submit_Decline_Appointment_Form(){
  $('#decline-appointment-info-modal-form').submit(function (e) { 
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "{{url('submit-decline-appointment-request')}}",
      data: $(this).serialize(),
      dataType: "json",
      success: function (data) {
        if(data.success){
          $('.appointment-decline-info-modal-form').removeClass('block');
          $('.appointment-decline-info-modal-form').addClass('hidden');
          $('#appointment-pending-request-profile-modal').removeClass('block');
          $('#appointment-pending-request-profile-modal').addClass('hidden');
          Decline_Done_Appointments()
         Pending_Appointments()
          
          window.alert(data.success)
        }
        else{
          window.alert(data.failed)

        }

      }
    });
    
  });
}

function Open_Appointment_Decline_Form_Modal(){
  $('#appointment-open-decline-form-btn').click(function(){
    $('.appointment-decline-info-modal-form').removeClass('hidden');
    $('.appointment-decline-info-modal-form').addClass('block');
  });
}

function Pending_Appointment_Close_Btn(){
  $('#appointment-decline-modal-form-close-btn').click(function (e) { 
    e.preventDefault();
    $('#appointment-pending-request-profile-modal').removeClass('block');
    $('#appointment-pending-request-profile-modal').addClass('hidden');
    
  });
  $('#appointment-decline-info-modal-close-btn').click(function (e) { 
    e.preventDefault();
    $('.appointment-decline-info-modal-form').removeClass('block');
    $('.appointment-decline-info-modal-form').addClass('hidden');
  });

  $('#appointment-cancenl-decline-info-modal-close-btn').click(function (e) { 
    e.preventDefault();
    $('.appointment-decline-info-modal-form').removeClass('block');
    $('.appointment-decline-info-modal-form').addClass('hidden');
  });
}


// DECLINE DONE 
  function Decline_Done_Appointments(){
    $.ajax({
        type: "GET",
        url: "{{url('decline-done-appointments')}}",
        data: "data",
        dataType: "json",
        success: function (all) {
          $("#decline-done-pending-table tbody").empty();
          $.each(all, function (index, all) {
            $.ajax({
              type: "GET",
              url: "/decline-done-user-appointment/"+all.u_id,
              data: "data",
              dataType: "json",
              success: function (user) {
                var row = "<tr class='text-center border border-gray-600 '>";
          row += "<td class='border border-gray-600'>"+all.id+"</td>";
          row += "<td class='border border-gray-600'>" + user.fname +" "+ user.mname +" "+user.lname+ "</td>";
          row += "<td class='border border-gray-600'>"+all.app_date+"</td>";
          row += "<td class='border border-gray-600'>"+all.app_time+"</td>";
          row += "<td class='border border-gray-600'><button type='button' class='history-profile-show-modal-btn' data-id='"+all.id+"'><i class='fa-solid fa-eye'></i></button></td>";
          row += "</tr>";
          $("#decline-done-pending-table tbody").append(row);

              }
            });
      }); 
        }
      });
    
    }
    $(document).on('click', '.history-profile-show-modal-btn', function() {
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/history-appointment-information/"+id,
      data: "data",
      dataType: "json",
      success: function (request) {
       $.ajax({
        type: "GET",
        url: "/history-user-appointment-information/"+request.u_id,
        data: "data",
        dataType: "json",
        success: function (profile) {

          $('#appointment-history-profile-modal').removeClass('hidden');
          $('#appointment-history-fullname').text(profile.fname+" "+profile.mname+" "+profile.lname);
          $('#appointment-history-date').text(request.app_date);
          $('#appointment-history-time').text(request.app_time);
          $('#appointment-history-status').text(request.status);
          $('#appointment-history-description').text(request.app_description);
          $('#app-form-id').val(request.id);
          $('#appointment-history-profile').attr('src',profile.user_profile);
        }
       });
      }
    });
});
function History_Profile_Modal_Btn(){
  $('#history-appointment-modal-form-close-btn').click(function (e) { 
    e.preventDefault();
    $('#appointment-history-profile-modal').addClass('hidden');
    $('#appointment-history-profile-modal').removeClass('block');
  });
}
   




    // WAITING 
  function Waiting_Appointments(){
    $.ajax({
        type: "GET",
        url: "{{url('waiting-appointments')}}",
        data: "data",
        dataType: "json",
        success: function (all) {
          $("#appointment-waiting-table tbody").empty();
          $.each(all, function (index, all) {
            $.ajax({
              type: "GET",
              url: "/waiting-user-appointment/"+all.u_id,
              data: "data",
              dataType: "json",
              success: function (user) {
                var row = "<tr class='text-center border border-gray-600 '>";
                row += "<td class='border border-gray-600'><button type='button' data-id='"+user.id+"'>"+user.fname+" "+user.lname+"</button></td>";
                row += "<td class='border border-gray-600'>"+all.app_date+"</td>";
                row += "<td class='border border-gray-600'>"+all.app_time+"</td>";
          row += "<td class='border border-gray-600'><button type='button' class='waiting-appointment-open-profile-modal-btn' data-id='"+all.id+"'><i class='fa-solid fa-eye'></i></button></td>";

          row += "</tr>";
          $("#appointment-waiting-table tbody").append(row);

              }
            });
      }); 
        }
      });
    }

    $(document).on('click', '.waiting-appointment-open-profile-modal-btn', function() {
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/proceed-waiting-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (request) {
       $.ajax({
        type: "GET",
        url: "/proceed-watiting-to-appointment/"+request.u_id,
        data: "data",
        dataType: "json",
        success: function (profile) {
          $('#appointment-waiting-profile-modal').removeClass('hidden');
          $('#appointment-waiting-fullname').text(profile.fname+" "+profile.mname+" "+profile.lname);
          $('#appointment-waiting-date').text(request.app_date);
          $('#appointment-waiting-time').text(request.app_time);
          $('#appointment-waiting-status').text(request.status);
          $('#appointment-waiting-description').text(request.app_description);
          $('#app-form-id').val(request.id);
          $('#appointment-waiting-profile').attr('src',profile.user_profile);
          $('#waiting-proceed-ongoing-appointment-btn').attr('data-id',request.id);
        }
       });
      }
    });
});
function Proceed_Waiting_On_Going(){
  $('#waiting-proceed-ongoing-appointment-btn').click(function (e) { 
    var id=$(this).data('id');
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: "/waiting-proceed-ongoing-appointment/"+id,
      data: "data",
      dataType: "json",
      success: function (data) {
        $('#appointment-waiting-profile-modal').removeClass('block');
        $('#appointment-waiting-profile-modal').addClass('hidden');
        Ongoing_Appointments()
        Waiting_Appointments()
        window.alert(data.success)

      }
    });
    
  });
}


function Waiting_Close_Profile_Modal_Btn(){
  $('#waiting-appointment-modal-form-close-btn').click(function (e) { 
    e.preventDefault();
    $('#appointment-waiting-profile-modal').removeClass('block');
    $('#appointment-waiting-profile-modal').addClass('hidden');
    
  });
}
    

  function AppointmentOnhHoverButtons(){
    $('#appointmentsbtn').removeClass('bg-white text-green-600')
    $('#appointmentsbtn').addClass('bg-green-600 text-white')
    $('#appointmentsbtn').click(function (e) { 
      e.preventDefault();
      $('#appointmentsbtn').removeClass('bg-white text-green-600')
      $('#appointmentsbtn').addClass('bg-green-600 text-white')
      $('#appointments').show();
      $('#request').hide();
      $('#history').hide();

      $('#approvedlist').removeClass('hidden')
      $('#approvedlist').addClass('block')

      $('#requestbtn').removeClass('bg-green-600 text-white')
      $('#requestbtn').addClass(' bg-white text-green-600')

      $('#historybtn').removeClass('bg-green-600 text-white')
      $('#historybtn').addClass('bg-white text-green-600')
      
    });

    $('#requestbtn').click(function (e) { 
      e.preventDefault();
      $('#requestbtn').removeClass('bg-white text-green-600')
      $('#requestbtn').addClass('bg-green-600 text-white')
      $('#appointments').hide();
      $('#request').show();
      $('#history').hide();

      $('#approvedlist').removeClass('block')
      $('#approvedlist').addClass('hidden')

      $('#appointmentsbtn').removeClass('bg-green-600 text-white')
      $('#appointmentsbtn').addClass(' bg-white text-green-600')

      $('#historybtn').removeClass('bg-green-600 text-white')
      $('#historybtn').addClass('bg-white text-green-600')

      
    });

    $('#historybtn').click(function (e) { 
      e.preventDefault();
      $('#historybtn').removeClass('bg-white text-green-600')
      $('#historybtn').addClass('bg-green-600 text-white')
      $('#appointments').hide();
      $('#request').hide();
      $('#history').show();
      
      $('#approvedlist').removeClass('block')
      $('#approvedlist').addClass('hidden')

      $('#appointmentsbtn').removeClass('bg-green-600 text-white')
      $('#appointmentsbtn').addClass(' bg-white text-green-600')

      $('#requestbtn').removeClass('bg-green-600 text-white')
      $('#requestbtn').addClass('bg-white text-green-600')
      
    });
  }
  function ActiveAppointmentsButton(){
    $('#appointments-btn').addClass('bg-gray-400 text-lg indent-6');    
    }



    function PrintBtn(){
      $('#waitinglist-print-btn').click(function (e) { 
        e.preventDefault();
        $.ajax({
          type: "GET",
          url: "{{url('print-waiting-list')}}",
          data: "data",
          dataType: "json",
          success: function (data) {
            console.log('ehllo')
            window.location.href="{url('print-waiting-list')}}"
          }
        });
        
      });
    }





</script>
@endsection'