@extends('layout.admin.layout')
@section('accounts')

<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Accounts</p>
  <div class="flex justify-end">
  <button type="button" id="open-create-account-modal" class="p-3 rounded-md bg-green-600 font-semibold text-white">Create Account</button>
  </div>
</div>

<div class=" h-auto px-10">

  <div class="bg-white rounded-md w-full overflow-x-auto p-5">
    <table id="verified-accounts" class="stripe hover  w-full ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="">
      <p class="font-semibold text-gray-500">Role Legend</p>
      <div class="flex space-x-2">
        <div class="">
        <p>Administrator</p> <p class="p-2 bg-red-500"></p>
        </div>
        <div class="">
        <p>Staff</p> <p class="p-2 bg-yellow-500"></p>
        </div>
        <div class="">
        <p>User</p> <p class="p-2 bg-green-500"></p>
        </div>
      </div>
    </div>
  </div>

</div>

















<!-- MODALS  -->
<div id="create-account-modal" class="fixed inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50 hidden">
<div class="modal-container bg-white sm:w-full lg:w-3/5 mx-auto rounded-lg shadow-lg ">
    <header class="border-b-2 border-gray-500 relative bg-cover bg-center" style="background-image: url('https://t3.ftcdn.net/jpg/04/42/06/34/360_F_442063430_OjLo5sHK0twuUk2hCGWpjLphEHiLcamL.jpg');">

      <div class="container mx-auto p-2 text-center relative">
        <!-- Logo positioned on top center of the header -->
        <img src="https://redcross.org.ph/wp-content/themes/yootheme/cache/logo-968682b9.png" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-20">

        <h1 class="mt-6 text-xl text-white font-bold">PHILIPPINE RED CROSS</h1>
        <p class="text-white text-sm font-semibold">MINDORO ORIENTAL CHAPTER</p>
      </div>
    </header>

    <div class="h-96 p-4 overflow-y-auto">

            <h2 class="text-2xl font-semibold text-green-600">Create Account</h2>
            <!-- ERROR MESSAGE  -->
            <div class="p-2 border border-green-500 bg-green-500 bg-opacity-10 rounded-md hidden" id="success">
              <p id="success-message" class="text-center text-blue-500">Here</p>
            </div>

            <div class="p-2 border border-red-500 bg-red-500 bg-opacity-10 rounded-md hidden" id="failed">
              <p id="failed-message" class="text-center text-blue-500">Here</p>
            </div>
            
            <!-- FORM  -->
            <p class="text-gray-500  mb-2">Personal Information</p>
            <form id="create-account">
              @csrf
              <div class="flex space-x-2">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">First Name</label>
                    <input id="fname" name="fname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Middle Name</label>
                    <input id="mname" name="mname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Last Name</label>
                    <input id="lname" name="lname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
                </div>
              </div>

              <div class="flex space-x-2">

                <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Birthday</label>
                    <input id="bday" name="bday" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" placeholder="Your Email">
                </div>

                <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Age</label>
                    <input id="age" name="age" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
                </div>

                <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Gender</label>
                    <div class="relative">
                        <select id="gender" name="gender" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                          <option value="">Select </option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Contact Number</label>
                    <input id="phone_num" name="phone_num" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
                </div>
              </div>
              <p class="text-gray-500  mb-2">Account Creadentials</p>
              <div class="flex space-x-2">
                <div class="mb-4 w-full">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Email</label>
                      <input id="email" name="email" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
                  </div>

                <div class="mb-4 w-full">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Password</label>
                      <input id="password" name="password" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
                  </div>
              </div>
            

                <div class="flex space-x-2">
                  <div class="mb-4 w-full">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Account Type</label>
                      <div class="relative">
                          <select id="type" name="type" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                          <option value="">Select </option>
                          <option value="Admin">Admin</option>
                          <option value="Staff">Staff</option>
                          <option value="User">User</option>
                          </select>
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                          </div>
                      </div>
                  </div>
                  <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Account Status</label>
                    <div class="relative">
                        <select id="account_status" name="account_status" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                          <option value="">Select </option>
                          <option value="Pending">Pending</option>
                          <option value="Verified">Verified</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
                </div>

     

           

            <div class="mt-6 flex justify-end">
                <button id="close-create-account-modal" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Save</button>
            </div>
            </form>
        </div>
        </div>
</div>


<div id="account-profile-modal" class="fixed px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50 hidden ">
<div class="modal-container bg-white sm:w-full lg:w-3/5 mx-auto rounded-lg shadow-lg ">
    <header class="border-b-2 border-gray-500 relative bg-cover bg-center" style="background-image: url('https://t3.ftcdn.net/jpg/04/42/06/34/360_F_442063430_OjLo5sHK0twuUk2hCGWpjLphEHiLcamL.jpg');">

      <div class="container mx-auto p-2 text-center relative">
        <!-- Logo positioned on top center of the header -->
        <img src="https://redcross.org.ph/wp-content/themes/yootheme/cache/logo-968682b9.png" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-20">

        <h1 class="mt-6 text-xl text-white font-bold">PHILIPPINE RED CROSS</h1>
        <p class="text-white text-sm font-semibold">MINDORO ORIENTAL CHAPTER</p>
      </div>
    </header>

    <div class="h-96 p-4 overflow-y-auto">
    <div id="user-profile" class="flex">

    </div>
    <div id="user-profile-btns" class="" >

    </div>
  </div>
</div>
</div>




<script>
  $(document).ready(function () {
    Verified_Accounts()
    Accounts_Btns()
});
$('#open-create-account-modal').click(function (e) { 
  e.preventDefault();
  $('#create-account-modal').removeClass('hidden')
  $('#create-account-modal').addClass('block')
  
});
$('#close-create-account-modal').click(function (e) { 
  e.preventDefault();
    $('.form-inputs').removeClass('border-red-500')
    $('#create-account')[0].reset()
    $('#create-account-modal').removeClass('block')
    $('#create-account-modal').addClass('hidden')
    $('#failed').removeClass('block')
    $('#failed').addClass('hidden')
    $('#success').removeClass('block')
    $('#success').addClass('hidden')
  
});

function Create_Account(verified){
  $('#create-account').submit(function (e) { 
    var formdata= new FormData($(this)[0]);
    e.preventDefault();
    $('.form-inputs').removeClass('border-red-500')
    $('#failed').removeClass('block')
    $('#failed').addClass('hidden')
    $('#success').removeClass('block')
    $('#success').addClass('hidden')
    var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
    $.ajax({
    type: 'POST',
    url: '{{url("create-account")}}',
    data: formdata,
    processData: false,
    contentType: false,
    success: function(response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
        if(response.success){
          verified.ajax.reload()
          $('#create-account')[0].reset()
          alert(response.success)
        }else if(response.failed){
          alert(response.failed)

        
        }else if(response.errors.email){
          alert(response.errors.email)
          $.each(response.errors, function(field, errorMessage) {
                      
                      $('#'+field).addClass('border border-red-500');
         });

        }else{
          if(response.errors.email==="The email has already been taken."){
            alert(response.errors.email)
          }else{
            alert('All fields are required!')  
          }
          $.each(response.errors, function(field, errorMessage) {
                      
                        $('#'+field).addClass('border border-red-500');
           });
        }
    },
    error: function(xhr, status, error) {
        alert('An error occurred while submitting the form');
    }
});
    
  });
  
}
function Verified_Accounts(){
  let verified = new DataTable('#verified-accounts', {
        "responsive":true,
        "ajax": {
            "url": "/verified-accounts",
            "type": "GET",
            "dataSrc": "verified",
        },
        "columns": [
            { 
              "data": null ,
              "render":function(data,type,row){
                return '<p class="text-gray-500 text-xs font-semibold">'+row.fname+' '+row.mname+' '+row.lname+'</p>'
              }
            },
            {
              "data":"gender"
            },
            {
              "data":"bday"
            },
            {
              "data":"email"
            },
            {
              "data":null,
              "render": function(data,type,row){
                if(row.type==="USER"){
                  return '<span class="rounded-full text-white font-semibold text-xs bg-green-500 p-2 ">'+row.type+'</span>'
                }else if(row.type==="STAFF"){
                  return '<span class="rounded-full text-white font-semibold text-xs bg-yellow-500 p-2 ">'+row.type+'</span>'
                }else{
                  return '<span class="rounded-full text-white font-semibold text-xs bg-red-500 p-2 ">'+row.type+'</span>'
                }
              }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return '<button class="profile-modal-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Profile</button>';
                }
            }
        ],
    });
    Create_Account(verified)
    Reload_After_Delete(verified)
}
function Reload_After_Delete(verified){
  $(document).on('click','.delete-profile-btn',function () {

    var confirmation = confirm('Are you sure you want to continue?');

    // Check the user's choice
    if (confirmation) {
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      var id=$(this).data('id');
      $.ajax({
        type: "GET",
        url: "/delete-account/"+id,
        data: "data",
        dataType: "json",
        success: function (response) {
          submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
        verified.ajax.reload()
          $('#user-profile').empty()
          $('#user-profile-btns').empty()
          $('#account-profile-modal').removeClass('block')
          $('#account-profile-modal').addClass('hidden')
        }
      });
    } else {
        // The user clicked "Cancel" or closed the dialog, so no action is taken
    }




  });
}
function Accounts_Btns(){

  $(document).on('click','#close-profile-modal-btn',function () {
    $('#user-profile').empty()
        $('#user-profile-btns').empty()
    $('#account-profile-modal').removeClass('block')
        $('#account-profile-modal').addClass('hidden')
  });

  $(document).on('click','.profile-modal-btn',function () {
    $('#user-profile').empty()
        $('#user-profile-btns').empty()
    var id=$(this).data('id');
    var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
    $.ajax({
      type: "GET",
      url: "/account-profile/"+id,
      data: "data",
      dataType: "json",
      success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
        var left_details="<div class='w-full'>"

        left_details+="<p class='text-xl font-bold text-green-600 text-center'> "+response.user.fname+" Profile</p>"
       if(response.user.user_profile!==null){
        left_details+="<img class='p-3' src='data:image/jpeg;base64,"+response.user.user_profile+"' alt='image'>"
     " </div>"
       }else{
        left_details+="<img class='p-3' src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' alt='image'>"
     " </div>"
       }
    left_details+= " </div>"

     var right_details ="<div class='w-full space-y-3'>"
     right_details+="<p class='text-lg font-bold text-blue-400'>Information</p>"

       right_details += "<p class='font-semibold text-gray-400 text-xs'>NAME: <span class='text-gray-600  text-sm' id='profile-name'>"+response.user.fname+" "+response.user.mname+" "+response.user.lname+"</span></p>"
       right_details += "<p class='font-semibold text-gray-400 text-xs'>AGE: <span class='text-gray-600  text-sm' id='profile-age'>"+response.user.age+"</span></p>"
       right_details += "<p class='font-semibold text-gray-400 text-xs'>BIRTHDAY: <span class='text-gray-600  text-sm' id='profile-bday'>"+response.user.bday+"</span></p>"
       right_details += "<p class='font-semibold text-gray-400 text-xs'>GENDER: <span class='text-gray-600  text-sm' id='profile-gender'>"+response.user.gender+"</span></p>"
       right_details += "<p class='font-semibold text-gray-400 text-xs'>CONTACT NO. : <span class='text-gray-600  text-sm' id='profile-phone_num'>"+response.user.phone_num+"</span></p>"
       right_details += "<p class='font-semibold text-gray-400 text-xs'>EMAIL. : <span class='text-gray-600  text-sm' id='profile-email'>"+response.user.email+"</span></p>"
       right_details += "<p class='font-semibold text-gray-400 text-xs'>PASSWORD. : <span class='text-gray-600  text-sm' id='profile-password'>"+response.user.password+"</span></p>"
       
       if(response.user.account_status==='VERIFIED'){
        right_details += "<p class='font-semibold text-gray-400 text-xs'>ACCOUNT STATUS. : <span class='text-white  text-xs bg-green-500 px-2 py-1 rounded-full' id='profile-account_status'>"+response.user.account_status+"</span></p>"
       }else{
        right_details += "<p class='font-semibold text-gray-400 text-xs'>ACCOUNT STATUS. : <span class='text-white  text-xs bg-gray-500 px-2 py-1 rounded-full' id='profile-account_status'>"+response.user.account_status+"</span></p>"
       }
       if(response.user.type==="ADMIN"){
        right_details += "<p class='font-semibold text-gray-400 text-xs'>ROLE. : <span class='text-white  text-xs bg-red-500 px-2 py-1 rounded-full' id='profile-account_status'>"+response.user.type+"</span></p>"
       }else if(response.user.type==="STAFF"){
        right_details += "<p class='font-semibold text-gray-400 text-xs'>ROLE. : <span class='text-white  text-xs bg-yellow-500 px-2 py-1 rounded-full' id='profile-account_status'>"+response.user.type+"</span></p>"
       }else{
        right_details += "<p class='font-semibold text-gray-400 text-xs'>ROLE. : <span class='text-white  text-xs bg-green-500 px-2 py-1 rounded-full' id='profile-account_status'>"+response.user.type+"</span></p>"
       }
    right_details += " </div>"
    var details_btns="<div class='flex space-x-2 justify-end'>"
    details_btns+="<button id='close-profile-modal-btn' type='button' class='bg-gray-500 p-2 rounded-md text-white  font-semibold '>Close</button>"
    details_btns+="<button data-id="+response.user.id+"  type='button' class='delete-profile-btn bg-red-500 p-2 rounded-md text-white  font-semibold '>Delete</button>"
    details_btns+="<div>"

        $('#user-profile').append(left_details)
        $('#user-profile').append(right_details)
        $('#user-profile-btns').append(details_btns)
        $('#account-profile-modal').removeClass('hidden')
        $('#account-profile-modal').addClass('block')


      }
    });
    
  });
}



</script>
@endsection