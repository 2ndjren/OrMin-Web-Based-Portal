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
    
<div class="w-full flex px-10 pt-12">
<div class="w-full">
<form class=" border rounded-md border-gray-500 p-5" id="create-appointment-form">
        @csrf
        <p class="text-lg font-semibold text-center" >Make an appointment!</p>
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
          <button type="button"  class="close-set-app-modal p-2 bg-gray-500 text-white font-semibold rounded-md">Clear</button>
          <button type="submit" class="p-2 bg-blue-500 text-white font-semibold rounded-md">Submit</button>
        </div>
      </form>
</div>
<div class="w-full"></div>
</div>
    <script>
        $(document).ready(function () {
            Create_Appointment()
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
    </script>
</body>
</html>