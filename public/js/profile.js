
$(document).ready(function () {
  TabController()
  Appointments()
  AppointmentBtn()
  Membership()
  MemberhsipBtn()
  
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

        var membership="<div class='pt-10 w-full flex justify-center space-y-2  space-x-3 text-center'><div class=' bg-white w-3/4 opacity-5 p-10 rounded-xl'>"
        membership+="<p class='text-red-500 text-xl font-semibold' >NO MEMBERSHIP FOUND!<p>"
        membership+="<p class='text-blue-500' >You don't have any membership account found that match in your details but you can still avail one of this program.<p>"
        membership+="<p class='text-blue-500' >Just click the button bellow if you want to see more information  about this  membership program <p>"
        membership+="<p class='text-blue-500 mb-5' >or avail yours now!<p>"
        membership+="<div class='flex justify-center space-x-3'><a href='' class='font-semibold text-sm px-5 py-2 bg-red-600 rounded-xl shadow-md text-white hover:text-red-500 hover:bg-white hover:border-2 border-red-500 ' >Membership Details</a >"
        membership+=" <button id='register-program-btn' class='font-semibold text-sm px-5 py-2 bg-red-600 rounded-xl shadow-md text-white hover:text-red-500 hover:bg-white hover:border-2 border-red-500 ' >Register Now!</button > </div>"
        membership+="</div></div>"
        $('#membership-info').append(membership)
      }else{
        var details="<div class='p-5'><div><p class='font-semibold text-cyan-500 text-sm mt-5'>INSURANCE INFORMATION</div>"
        if(data.status==="ACTIVATED"|| data.status==="EXPIRED"){
   details+="<p><span class='font-semibold text-gray-500 text-xs'>MEMBERSHIP ID: </span><span class='font-semibold text-gray-600'>"+ data.mem_id+"</span></p>"

        }
   if(data.sname!==""){
    details+="<p><span class='font-semibold text-gray-500 text-xs'>NAME: </span><span class='font-semibold text-gray-600'>"+data.fname+" "+data.mname+ " "+data.lname+" "+data.sname+"</span></p>"
   }else{
    details+="<p><span class='font-semibold text-gray-500 text-xs'>NAME: </span><span class='font-semibold text-gray-600'>"+data.fname+" "+data.mname+ " "+data.lname+"</span></p>"
   }
   details+="<p><span class='font-semibold text-gray-500 text-xs'>AGE: </span><span class='font-semibold text-gray-600'>"+ data.age+"</span></p>"
   details+="<p><span class='font-semibold text-gray-500 text-xs'>BIRTHDAY: </span><span class='font-semibold text-gray-600'>"+ data.birthday+"</span></p>"
   details+="<p><span class='font-semibold text-gray-500 text-xs'>GENDER: </span><span class='font-semibold text-gray-600'>"+ data.gender+"</span></p>"
   details+="<p><span class='font-semibold text-gray-500 text-xs'>ADDRESS: </span><span class='font-semibold text-gray-600'>"+ data.address+"</span></p>"
   details+="<p><span class='font-semibold text-gray-500 text-xs'>LEVEL: </span><span class='font-semibold text-gray-600'>"+ data.level+"</span></p>"
   details+="<p><span class='font-semibold text-gray-500 text-xs'>PRICE: </span><span class='font-semibold text-gray-600'>"+ data.amount+"</span></p>"
if(data.status==="PENDING"){
  details+="<p><span class='font-semibold text-gray-500 text-xs'>STATUS: </span><span class='font-semibold  bg-gray-600 text-white rounded-md py-1 px-2'>"+ data.status+"</span></p>"

}
else if(data.status==="ACTIVATED"){
  details+="<p><span class='font-semibold text-gray-500 text-xs'>STATUS: </span><span class='font-semibold  bg-green-600 text-white rounded-md py-1 px-2'>"+ data.status+"</span></p>"
  details+="<p><span class='font-semibold text-gray-500 text-xs'>VALIDTIY: </span><span class='font-semibold '>"+ data.start_at+"-"+data.end_at+"</span></p>"

}
else if(data.status==="EXPIRED"){
  details+="<p><span class='font-semibold text-gray-500 text-xs'>STATUS: </span><span class='font-semibold  bg-red-600 text-white rounded-md py-1 px-2'>"+ data.status+"</span></p>"
  details+="<p><span class='font-semibold text-gray-500 text-xs'>VALIDTIY: </span><span class='font-semibold '>"+ data.start_at+"-"+data.end_at+"</span></p>"

}
        details+="</div>"
        $('#membership-info').append(details)
      }
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