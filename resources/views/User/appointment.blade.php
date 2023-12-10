<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <script src="{{asset('js/jquery.js')}}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

  <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">
</head>
<body>
<div class="font-semibold  text-gray-600"><a href="{{url('/profile')}}"> BACK</a></div>
    
<div class="px-10">
  <p class="text-2xl font-semibold text-blue-500 text-center ">Red Cross Oriental Mindoro Chapter Appointment Schedules</p>
</div>
<div class="w-full sm:block lg:flex px-10 pt-12 sm:h-auto lg:h-screen sm:space-x-0 sm:space-y-2 lg:space-x-2 lg:space-y-0">

<div class="w-full lg:h-4/5 border border-blue-500 sm:h-auto overflow-y-auto">
  <table id="schedule-appointments-table" class="w-full text-center ">
    <thead class="bg-blue-500 text-white">
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>
<div class="sm:w-full lg:w-full">
  <div id="user-existing-schedule" class="hidden px-2 "></div>
 <div id="set-appointment-now" class="hidden">
<form class=" border rounded-md border-gray-500 p-5" id="create-appointment-form">
        @csrf
        <p class="text-lg font-semibold text-center text-blue-500" >Make appointment!</p>
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
        </div>
        <div class="flex">
       
        </div>
        <input type="hidden" id="user-app-id" name="u_id" >
        <textarea class="form-inputs mt-2 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Description!"  name="app_description" id="" cols="30" rows="3"></textarea>
        <div class="flex justify-end space-x-2  mt-2"> 
          <button type="button"id="clear-form"  class="close-set-app-modal p-2 bg-gray-500 text-white font-semibold rounded-md">Clear</button>
          <button type="submit" class="p-2 bg-blue-500 text-white font-semibold rounded-md">Submit</button>
        </div>
      </form>
 </div>
 <div class="w-full mt-2 border border-green-500 lg:h-60 overflow-y-auto">
  <table id="today-schedules" class="w-full text-center">
    <thead class="bg-green-500 text-white">
      <tr>
        <th>No.</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
 </div>
</div>
</div>
    <script>
        $(document).ready(function () {
            Create_Appointment()
            Clear_Form()
            Scheduled_Appointments()
            Check_Exist_User_Appointment()
            TodaySchedule()
        });
        function Create_Appointment(){
            $('#create-appointment-form').submit(function (e) { 
                e.preventDefault();
                var formdata=new FormData($(this)[0])
                var submit = $(this);
                submit.prop('disabled', true)
                submit.addClass('opacity-50 cursor-not-allowed')
                $.ajax({
                    type: "POST",
                    url: "/create-user-appointment",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response)
                        if(response.success){
                            $('#create-appointment-form')[0].reset()
                            submit.prop('disabled', false)
                            Scheduled_Appointments()
                            Check_Exist_User_Appointment()
                    submit.removeClass('opacity-50 cursor-not-allowed')
                            alert(response.success)
                        }else{
                            submit.prop('disabled', false)
                    submit.removeClass('opacity-50 cursor-not-allowed')
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
        function Clear_Form(){
          $('#clear-form').click(function (e) { 
            e.preventDefault();
            $('#create-appointment-form')[0].reset()
            
          });
        }
        function Scheduled_Appointments(){
          $('#schedule-appointments-table tbody').empty()
          $.ajax({
            type: "GET",
            url: "/user-scheduled-appointments",
            data: "data",
            dataType: "json",
            success: function (response) {
              console.log(response)
              if(response.results){
                var schedules="<tr class='text-center h-20'>"
                schedules+="<td></td>"
                schedules+="<td>"+response.results+"</td>"
                schedules+="<td></td>"

                schedules+="<tr>"

                $('#schedule-appointments-table tbody').append(schedules)
              }else{
                $.each(response, function (index, field) { 
                  var start = new Date(field.app_date);

                  var day = start.getDate();
                  var month = start.getMonth() + 1;
                  var year = start.getFullYear();

                  var months = [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                  ];
                   var monthss = months[month - 1];

                  var schedules="<tr>"
                  schedules+="<td>"+monthss+" "+day+","+year+"</td>"
                  schedules+="<td>"+field.app_time+"</td>"
                  if(field.status==='PENDING'){
                  schedules+="<td><span class='text-white bg-gray-500 px-2 rounded-md'>"+field.status+"</span></td>"

                  }else if(field.status==='APPROVED'){
                  schedules+="<td><span class='text-white bg-yellow-500 px-2 rounded-md'>"+field.status+"</span></td>"
                    
                  }else if(field.status==="ONGOING"){
                    schedules+="<td><span class='text-white bg-green-500 px-2 rounded-md'>"+field.status+"</span></td>"
                  }
                  schedules+="<tr>"
                   $('#schedule-appointments-table tbody').append(schedules)
                });
              }
            }
          });
        }
        function Check_Exist_User_Appointment(){
          $.ajax({
            type: "GET",
            url: "/user-exist-check",
            data: "data",
            dataType: "json",
            success: function (response) {
              console.log(response)
              if(response.results){
                var user_data="<div>"
              user_data +="<p>"+response.results+"</p>"
              user_data +="<div>"
              $('#user-existing-schedule').addClass('hidden')
              $('#set-appointment-now').removeClass('hidden')

              }else{
                var user_data="<div>"
              user_data +="<p class='text-center font-semibold'> My Appointment</p>"
              user_data +="<div class='flex space-x-2'>"
              user_data +="<p class='w-full'> Date: <span class='ml-2'>"+response.app_date+"</span></p>"
              user_data +="<p class='w-full'> Time: <span class='ml-2'>"+response.app_time+"</span></p>"
              user_data +="</div>"
              user_data +="<p> Description: <span class='ml-2'>"+response.app_description+"</span></p>"
              if(response.note!==null){
                user_data +="<p> Note: <span class='ml-2'>"+response.note+"</span></p>"
              }
              if(response.status==='PENDING'){
                  user_data+="<td><span class='text-white bg-gray-500 px-2 rounded-md'>"+response.status+"</span></td>"

                  }else if(response.status==='APPROVED'){
                  user_data+="<td><span class='text-white bg-yellow-500 px-2 rounded-md'>"+response.status+"</span></td>"
                    
                  }else if(response.status==="ONGOING"){
                    user_data+="<td><span class='text-white bg-green-500 px-2 rounded-md'>"+response.status+"</span></td>"
                  }
              user_data +="<div>"
                $('#user-existing-schedule').append(user_data)
                $('#set-appointment-now').addClass('hidden')
                $('#user-existing-schedule').removeClass('hidden')

              }
            }
          });
        }
        function TodaySchedule(){
          $.ajax({
            type: "GET",
            url: "/user-today-schedule",
            data: "data",
            dataType: "json",
            success: function (response) {
              console.log(response)
              if(response.results){
                var schedules="<tr class='text-center h-20'>"
                schedules+="<td></td>"
                schedules+="<td>"+response.results+"</td>"
                schedules+="<td></td>"

                schedules+="<tr>"
                var cn=0;
                $('#today-schedules tbody').append(schedules)
              }else{
                $.each(response, function (index, field) { 
                  var start = new Date(field.app_date);

                  var day = start.getDate();
                  var month = start.getMonth() + 1;
                  var year = start.getFullYear();

                  var months = [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                  ];
                   var monthss = months[month - 1];

                  var schedules="<tr>"
                  schedules+="<td>"+field.app_time+"</td>"
                  if(field.status==='APPROVED'){
                  schedules+="<td><span class='text-white bg-yellow-500 px-2 rounded-md'>"+field.status+"</span></td>"
                    
                  }else if(field.status==="ONGOING"){
                    schedules+="<td><span class='text-white bg-green-500 px-2 rounded-md'>"+field.status+"</span></td>"
                  }
                  schedules+="<tr>"
                   $('#today-schedules tbody').append(schedules)
                });
              }
              
            }
          });
        }
        
    </script>
</body>
</html>