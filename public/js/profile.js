
$(document).ready(function () {
  TabController()
  Appointments()
  AppointmentBtn()
  Membership()
  MemberhsipBtn()
  Volunteer_Account()
  
});

function Appointments(){
  $.ajax({
    type: "GET",
    url: "/scheduled-appointments",
    data: "data",
    dataType: "json",
    success: function (data) {
      if(data){
        $("#Scheduled_Appointments").empty();
        $.each(data, function (index, data) { 
          var button = "<button data-id='"+data.app_date+"' class='scheduled-appointments w-32'><span class=' bg-cyan-500 shadow-sm h-auto font-semibold text-white px-5 py-2 rounded-sm'>"+data.app_date+"</span></button>";
        $("#Scheduled_Appointments").append(button);
        });
      }
      else{
        var result="<p class='text-gray-600 font-semibold'>NO SCHEDULED APPOINTMENTS</p>"
        
        $("#Scheduled_Appointments").append(result);
      }
    }
  });


$.ajax({
  type: "GET",
  url: "/my-appointment",
  data: "data",
  dataType: "json",
  success: function (data) {
    $('#My_Appointments').empty();
    if(data.results){
      var message="<button type='button' id='make-appointment' class='text-gray-600 font-semibold'>"+data.results+"</button>"
      $('#My_Appointments').append(message);
    }else{
      var details="<p class='text-gray-500'><span class='font-semibold text-gray-600'>DATE</span>: "+data.app_date+"</p>"
      details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>TIME</span>: "+data.app_time+"</p>"
      if(data.status==="PENDING"){
        details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>STATUS</span>: <span class='py-1 px-2 bg-gray-600 rounded-md text-white '> "+data.status+"</span></p>"
      }
      if(data.status==="APPROVED"){
        details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>STATUS</span>: <span class='py-1 px-2 bg-cyan-500 rounded-md text-white '> "+data.status+"</span></p>"
      }
      if(data.status==="ARRIVED"){
        details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>STATUS</span>: <span class='py-1 px-2 bg-yellow-500 rounded-md text-gray-600 '> "+data.status+"</span></p>"
      }
      if(data.status==="ONGOING"){
        details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>STATUS</span>: <span class='py-1 px-2 bg-green-600 rounded-md text-white '> "+data.status+"</span></p>"
      }
      details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>DESCRIPTION</span>: "+data.app_description+"</p>"
      if(data.note!==null)
      {
        details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>NOTE</span>: "+data.note+"</p>"
      }
    
      if(data.status==="PENDING"){
        details+="<button id='update-my-appointment' data-id='"+data.id+"' class='hover:underline float-right bg-yellow-500 text-gray-600 px-5 py-1 text-sm rounded-sm'>EDIT</button>"
      }
      $('#My_Appointments').append(details);

    }
    
  }
});


$.ajax({
  type: "GET",
  url: "/my-appointment-history",
  data: "data",
  dataType: "json",
  success: function (data) {
    $('#My_Appointments_History tbody').empty();

    if(data.results){

    }else{
      $.each(data, function (index, data) { 
        var row="<tr class='h-10'><td><button  data-id='"+data.id+"' class='view-my-appointment hover:underline'>"+data.app_date+"</button></td>"
        if(data.status==="DONE"){
          row+="<td><span class='px-2 py-2 bg-green-600 text-white rounded-md text-sm font-semibold'>"+data.status+"</td>"
        }else{
          row+="<td><span class='px-2 py-2 bg-red-600 text-white rounded-md text-sm font-semibold'>"+data.status+"</td>"
        }
        row+="</tr>"
       $('#My_Appointments_History tbody').append(row);
     });
    }
    
  }
});
  
}

function AppointmentBtn(){
  // OPEN CREATE APPOINTMENT 
  $(document).on('click','#make-appointment', function() {
    $('#make-appointment-modal').removeClass('hidden');
    $('#make-appointment-modal').addClass('block');
  });

  
  // CLOSE CREATE APPOINTMENT 
  $(document).on('click','#close-make-appointment', function() {
    $('#make-appointment-modal').removeClass('block');
    $('#make-appointment-modal').addClass('hidden');
    $('#make-appointment-form')[0].reset()
  });

  // CLOSE  APPOINTMENT DETAILS
  $(document).on('click','.close-appointment-details', function() {
    $('#view-appointment-modal').removeClass('block')
    $('#view-appointment-modal').addClass('hidden')
  });
  // CLOSE  APPOINTMENT DETAILS
  $(document).on('click','#close-scheduled-appointments', function() {
    $('#view-scheduled-appointment-modal').removeClass('block')
    $('#view-scheduled-appointment-modal').addClass('hidden')
  });
  // OPEN SCHEDULED  APPOINTMENT LIST
  $(document).on('click','.scheduled-appointments', function() {

    var app_date= $(this).data('id')
    $('#scheduled-appointment-details tbody').empty()
    
    $.ajax({
      type: "GET",
      url: "/scheduled-appointment-time/"+app_date,
      data: "data",
      dataType: "json",
      success: function (data) {
        $.each(data, function (index, data) { 
           var row="<tr class=' text-gray-600'><td>"+data.app_time+"</td>"
           row+="<td>"+data.status+"</td>"
           row+="</tr>"
          $('#scheduled-appointment-details tbody').append(row)
        });
        $('#view-scheduled-appointment-modal').removeClass('hidden')
        $('#view-scheduled-appointment-modal').addClass('block')
      }
    });
  });
  // EDIT BUTTON 
  $(document).on('click','#update-my-appointment', function() {
    var id= $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/my-appointment-details/"+id,
      data: "data",
      dataType: "json",
      success: function (data) {
        if(data!==""){
          $('#make-appointment-modal').removeClass('hidden');
          $('#make-appointment-modal').addClass('block');
          $('#app-date').val(data.app_date)
          $('#app-time').val(data.app_time)
          $('#app-description').val(data.app_description)
          $('#app-id').val(data.id)
          $('#update-app').text("UPDATE")
        }
        else{
          $('#update-app').text("SUBMIT")

        }
      }
    });
  });

  $(document).on('click','.view-my-appointment', function() {
    var id= $(this).data('id');
    $('#my-appointment-details').empty()
    $.ajax({
      type: "GET",
      url: "/my-appointment-details/"+id,
      data: "data",
      dataType: "json",
      success: function (data) {
      if(data!==""){
       
        var details="<div class='text-center mb-5'><p class='text-gray-500'><span class='font-semibold text-cyan-600 text-2xl text-center'>APPOINTMENT DETAILS</span></p></div>"
         details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>DATE</span>: "+data.app_date+"</p>"
         details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>DATE</span>: "+data.app_date+"</p>"
        details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>TIME</span>: "+data.app_time+"</p>"

        if(data.status==="DECLINED"){
          details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>STATUS</span>: <span class='py-1 px-2 bg-red-500 rounded-md font-semibold text-white '> "+data.status+"</span></p>"
        }
        if(data.status==="DONE"){
          details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>STATUS</span>: <span class='py-1 px-2 bg-green-600 rounded-md font-semibold text-white '> "+data.status+"</span></p>"
        }
        details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>DESCRIPTION</span>: "+data.app_description+"</p>"
        if(data.note!==null)
        {
          details+="<p class='text-gray-500'><span class='font-semibold text-gray-600'>NOTE</span>: "+data.note+"</p>"
        }
        details+="<div class='flex justify-center'><button class='close-appointment-details  px-5 py-2 text-white bg-green-500 rounded-md'>CLOSE</button></div>"
      

          $('#my-appointment-details').append(details)
          $('#view-appointment-modal').removeClass('hidden')
          $('#view-appointment-modal').addClass('block')

      }
    }
    });
  });


}


// MEMBERSHIP 
function Membership(){
  $.ajax({
    type: "GET",
    url: "/myinsurance",
    data: "data",
    dataType: "json",
    success: function (data) {
      console.log(data)
      $('#membership-info').empty()
      if(data.results){
        var results="<div class=''>"
        results+="<p>"+data.results+"</p>";
        results+="<button type='button' id='open-modal-form' class='p-2 bg-green-500 text-white rounded-md'>Get yours now!</button>";
        results+="</div>";
        $('#membership-info').append(results);
      }else if(data.ongoing.status==="PENDING"){
        var ongoing="<div class=' p-5 rounded-md bg-blue-500 bg-opacity-10'>"
        ongoing+="<p class='text-lg font-semibold text-blue-500'>Membership Account</p>";
        ongoing+="<p>Program to Avail: <span class='text-green font-semibold text-yellow-500 '>"+data.ongoing.level+"</span></p>";
        ongoing+="<p>Amount: ₱"+data.ongoing.amount+".00 </p>";
        ongoing+="<p>Status: <span class='px-2 py-1 rounded-full bg-yellow-500 text-sm font-semibold text-white'>"+data.ongoing.status+"</span></p>";
        ongoing += "<div class='flex justify-center h-72 w-96' style='background-image: url(" + data.classic + ")'>";
        
        ongoing+="</div >";
        ongoing+="</div>";
        $('#membership-info').append(ongoing);
      }else if(data.ongoing.status==="ACTIVATED"){
        var ongoing="<div class=' p-5 rounded-md bg-blue-500 bg-opacity-10'>"
        ongoing+="<p class='text-lg font-semibold text-blue-500'>Membership Account</p>";
        ongoing+="<p>Program to Avail: <span class='text-green font-semibold text-green-500 '>"+data.ongoing.level+"</span></p>";
        ongoing+="<p>Amount: ₱"+data.ongoing.amount+".00 </p>";
        ongoing+="<p>Status: <span class='px-2 py-1 rounded-full bg-green-500 text-sm font-semibold text-white'>Active</span></p>";
        var start = new Date(data.ongoing.start_at);

        var startday = start.getDate(); 
        var startmonth = start.getMonth() + 1; 
        var startyear = start.getFullYear(); 
        var end = new Date(data.ongoing.end_at);

        var endday = end.getDate(); 
        var endmonth = end.getMonth() + 1; 
        var endyear = end.getFullYear(); 
        var months = [
          "January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        var startmon = months[startmonth - 1];
        var endmon = months[endmonth - 1];
        ongoing+="<p>Validity: "+startmon+" "+startday+", "+startyear+"-"+endyear+"</p>";
        ongoing+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden classic-card' style='background-image:url("+data.classic+");'>";
        ongoing+="</div>";
        ongoing+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden bronze-card' style='background-image:url("+data.bronze+");'>";
        ongoing+="</div>";
        ongoing+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden silver-card' style='background-image:url("+data.silver+");'>";
        ongoing+="</div>";
        ongoing+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden gold-card' style='background-image:url("+data.gold+");'>";
        ongoing+="</div>";
        ongoing+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden platinum-card' style='background-image:url("+data.platinum+");'>";
        ongoing+="</div>";
        ongoing+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden senior-card' style='background-image:url("+data.senior+");'>";
        ongoing+="</div>";
        ongoing+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden plus-card' style='background-image:url("+data.plus+");'>";
        ongoing+="</div>";
        if(ongoing.level==="CLASSIC"){
          $('#classic-card').removeClass('hidden')
        }
   
        ongoing+="</div>";
        $('#membership-info').append(ongoing);
      }
      
    }
  });
}
function Volunteer_Account(){
  $.ajax({
    type: "GET",
    url: "/volunteer-details-card",
    data: "data",
    dataType: "json",
    success: function (response) {
      console.log(response)


      var noid="<div class='h-96 w-auto bg-no-repeat mt-5 hidden plus-card' style='background-image:url("+response.vol_card+");'>";
      noid+="</div>"
      noid+="<p>"+response.noid.fname+"</p>"
      $('#volunteer-details').append(noid)
      if(response.noid){
        var noid="<div>"

        noid+="<div class='h-96 w-auto bg-no-repeat mt-5 hidden plus-card' style='background-image:url("+response.vol_card+");'>";
        noid+="<p>"+response.noid.fname+"</p>"
        noid+="</div>";
        noid+="</div>"
        $('#volunteer-details').append(noid)
      }else if(response.withid){
        var withid="<div>"

        withid+="<p>"+response.withid+"</p>"
        withid+="</div>"
        $('#volunteer-details').append(withid)

      }else if(response.results){
        var results="<div>"

        results+="<p>"+response.results+"</p>"
        results+="</div>"
        $('#volunteer-details').append(results)
      }
      
    },  error: function (xhr, status, error) {
      // Handle errors, if any
      window.alert(xhr.responseText);
  }
  });
}

function MemberhsipBtn(){
  $(document).on('click','#register-program-btn', function() {
    $('#make-membership-account-modal').removeClass('hidden')
    $('#make-membership-account-modal').addClass('block')
  });
  $(document).on('click','#close-make-membership-btn', function() {
    $('#make-membership-account-modal').removeClass('block')
    $('#make-membership-account-modal').addClass('hidden')
    $('#make-membership-form')[0].reset()
  });
}









function TabController(){
  // buttons
 var appointmentbtn= $('#appointment-container-btn')
 var volunteerbtn= $('#volunteer-container-btn')
 var bloodbtn= $('#blood-container-btn')
 var membershipbtn= $('#membership-container-btn')
// container 
 var appointment_container=$('#appointment-container')
 var volunteer_container=$('#volunteer-container')
 var blood_container=$('#blood-container')
 var membership_container=$('#membership-container')

 $(appointmentbtn).click(function (e) { 
  e.preventDefault();
  appointmentbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  appointmentbtn.removeClass("bg-cyan-500 text-white ")
  volunteerbtn.addClass("bg-cyan-500 text-white ")
  volunteerbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.addClass("bg-cyan-500 text-white")
  bloodbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.addClass("bg-cyan-500 text-white")
  membershipbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")



  $(appointment_container).removeClass('hidden');
  $(appointment_container).addClass('block');
  $(volunteer_container).removeClass('block');
  $(volunteer_container).addClass('hidden');
  $(blood_container).removeClass('block');
  $(blood_container).addClass('hidden');
  $(membership_container).removeClass('block');
  $(membership_container).addClass('hidden');
 });
 $(volunteerbtn).click(function (e) { 
  e.preventDefault();
  volunteerbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  volunteerbtn.removeClass("bg-cyan-500 text-white")
  appointmentbtn.addClass("bg-cyan-500 text-white")
  appointmentbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.addClass("bg-cyan-500 text-white")
  bloodbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.addClass("bg-cyan-500 text-white")
  membershipbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")



  $(volunteer_container).removeClass('hidden');
  $(volunteer_container).addClass('block');
  $(appointment_container).removeClass('block');
  $(appointment_container).addClass('hidden');
  $(blood_container).removeClass('block');
  $(blood_container).addClass('hidden');
  $(membership_container).removeClass('block');
  $(membership_container).addClass('hidden');
 });
 $(bloodbtn).click(function (e) { 
  e.preventDefault();

  bloodbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.removeClass("bg-cyan-500 text-white")
  appointmentbtn.addClass("bg-cyan-500 text-white ")
  appointmentbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  volunteerbtn.addClass("bg-cyan-500 text-white")
  volunteerbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.addClass("bg-cyan-500 text-white")
  membershipbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")

  $(blood_container).removeClass('hidden');
  $(blood_container).addClass('block');
  $(appointment_container).removeClass('block');
  $(appointment_container).addClass('hidden');
  $(volunteer_container).removeClass('block');
  $(volunteer_container).addClass('hidden');
  $(membership_container).removeClass('block');
  $(membership_container).addClass('hidden');
 });
 $(membershipbtn).click(function (e) { 
  e.preventDefault();

  membershipbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.removeClass("bg-cyan-500 text-white")
  appointmentbtn.addClass("bg-cyan-500 text-white")
  appointmentbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  volunteerbtn.addClass("bg-cyan-500 text-white")
  volunteerbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.addClass("bg-cyan-500 text-white")
  bloodbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")

  $(membership_container).removeClass('hidden');
  $(membership_container).addClass('block');
  $(appointment_container).removeClass('block');
  $(appointment_container).addClass('hidden');
  $(volunteer_container).removeClass('block');
  $(volunteer_container).addClass('hidden');
  $(blood_container).removeClass('block');
  $(blood_container).addClass('hidden');
 });
}