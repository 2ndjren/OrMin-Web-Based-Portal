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
      <span class="text-green-500 font-bold text-4xl text-center">Jared Philipps Baren</span>
    </div>
  <div class="sm:block md:flex lg:flex">
    <div class="w-full"><div class="font-semibold text-blue-500  text-center">
    <span class="text-green-500 font-bold text-lg text-center">Jared Philipps Baren</span>

    </div></div>
  <div class="flex justify-center space-x-2 w-full ">
      <button type="button" class="px-2 py-1 rounded-md bg-yellow-500 text-white font-semibold ">New</button>
      <button type="button" class="px-2 py-1 rounded-md bg-green-500 text-white font-semibold ">Next</button>
    </div>
  </div>
  </div>

  <div class=" sm:block md:flex lg:flex  max-h-screen lg:space-x-2">
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



<div id="create-donation-record" class="  fixed md:px-5  lg:px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/4 h-96 mx-auto rounded-lg p-4 shadow-lg  ">
    <div id="decline-membership-note" class="w-full">
      <div class="sm:h-screen lg:h-20 sm:block lg:hidden md:hidden"></div>
      <p class="font-semibold">Create Appointment</p>
      <div class="p-4 border-b">
        <input type="text" id="search" placeholder="Search..." class="w-full px-4 py-2 border rounded-full">
        <div  id="users" class="mt-1 hidden z-50">
          <div  id="search-loading-spinner" class='hidden p-4 border-b-gray-200 border-l border-r border-t border-red-500 rounded-full animate-spin h-5 w-5'> </div>
          <div id="results" class="rounded-md">

           

          </div>

        </div>
      </div>
   
    </div>
    <form id="create-donation-form">
        @csrf

        



  


        <div class="flex justify-end space-x-2">
          <button id="close-create-donation-record-btn" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Cancel</button>
          <button class="bg-green-500 font-semibold text-white p-2 rounded-md" type="submit">Save</button>
        </div>
      </form>
  </div>
</div>

<div id="show-donation-details-modal" class="fixed  hidden inset-0 flex items-center justify-center z-10  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg shadow-lg ">
    <div id="donation-details" class="block  p-10"></div>

  </div>
</div>



<div id="decline-form-modal" class="fixed hidden inset-0 flex items-center justify-center z-10  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full md:w-1/2  lg:w-1/2 mx-auto rounded-lg shadow-lg ">
    <div id="donation-" class="block  p-10">
      <form action="">
        @csrf
        <p>Add note:</p>
        <textarea class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="" id="" cols="30" rows="10"></textarea>
        <div class="flex justify-center space-x-2"> 
          <button type="button" class="p-2 bg-green-500 text-white font-semibold rounded-md">Cancel</button>
          <button type="submit" class="p-2 bg-red-500 text-white font-semibold rounded-md">Proceed</button>
        </div>
      </form>
    </div>

  </div>
</div>


<script>
  $(document).ready(function () {
    Search_User()
    HandleSearch()
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
            var results="<button type='button' data-id="+field.id+"  class='get-user chat_head_button p-3 w-full rounded-full h-16 mb-1 bg-gray-400 text-white'>"
            results+="<div class='flex space-x-2'>"
            results+="<div>"
            if(field.vol_profile!==""){
              results+="<img src="+field.user_profile+" class='h-10 w-10 rounded-full border-2 border-blue-500'>"
            }else{
              results+="<img src="+field.user_profile+" class='h-10 w-10 rounded-full border-2 border-blue-500'>"

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
</script>
@endsection