@extends('layout.admin.layout')
@section('donations')
<title>Donations</title>
<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Fundraising</p>
  <div class="flex justify-end">
    <button type="button" id="create-donation-record-btn" class="p-3 rounded-md bg-green-600 font-semibold text-white">Add Donation Record</button>
  </div>
</div>

<div class="py-10 px-10 h-auto">
<div>
  
  <div class="bg-white rounded-md w-full overflow-x-auto p-5 space-y-2">
  <div class="">
      <button id="verified-donation-table-btn" class="p-2 rounded-md text-white bg-blue-500">Donation</button>
      <button id="pending-donation-table-btn" class="p-2 rounded-md text-white bg-green-500">Submitted Donation</button>
      <button id="other-donation-table-btn" class="p-2 rounded-md text-white bg-red-500">Others</button>
    </div>
  <div id="donations-tables" class="block w-full">

</div>
<div class="h-10"></div>
  </div>
</div>


<div id="create-donation-record" class=" hidden fixed md:px-5  lg:px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg  ">
    <div id="decline-membership-note" class="w-full">
      <div class="sm:h-screen lg:h-20 sm:block lg:hidden md:hidden"></div>
      <p class="font-semibold">Add Records</p>
      <form id="create-donation-form">
        @csrf
     <div class="sm:block md:flex lg:flex md:space-x-2   lg:space-x-2">
     <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">First Name</label>
            <input  id="fname" name="fname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Middle Name</label>
            <input  id="mname" name="mname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Last Name</label>
            <input  id="lname" name="lname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>

     </div>
     <div class="sm:block md:flex lg:flex md:space-x-2   lg:space-x-2">
     <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Age</label>
            <input id="age" name="age" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Gender</label>
            <div class="relative">
              <select id="gender" name="gender" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Municipality/City</label>
            <div class="relative">
              <select id="municipality_city" name="municipality_city" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Baco">Baco</option>
                <option value="Bansud">Bansud</option>
                <option value="Bongabong">Bongabong</option>
                <option value="Bulalacao">Bulalacao</option>
                <option value="Calapan City">Calapan City</option>
                <option value="Gloria">Gloria</option>
                <option value="Mansalay">Mansalay</option>
                <option value="Naujan">Naujan</option>
                <option value="Pinamalayan">Pinamalayan</option>
                <option value="Pola">Pola</option>
                <option value="Puerto Galera">Puerto Galera</option>
                <option value="Roxas">Roxas</option>
                <option value="San Teodoro">San Teodoro</option>
                <option value="Socorro">Socorro</option>
                <option value="Victoria">Victoria</option>

              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>
     </div>
     <div class="sm:block md:flex lg:flex md:space-x-2   lg:space-x-2">
  


     <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Donated Amount</label>
            <input id="donated_amount" name="donated_amount" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>

          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Mode of Donation</label>
            <div class="relative">
              <select id="payment_type" name="  payment_type" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Gcash">GCash Express</option>
                <option value="Cash on hand">Cash on hand</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>

          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Donators Type</label>
            <div class="relative">
              <select id="donation_type" name="donation_type" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="Individual">Individual</option>
                <option value="Group">Group</option>
                <option value="Company/Organization">Company/Organization</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>
          <div class="mb-4 w-full ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Identity</label>
            <div class="relative">
              <select id="type" name="type" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select </option>
                <option value="0">Anonymous</option>
                <option value="1">Charity Funder</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" />
                </svg>
              </div>
            </div>
          </div>


     

     </div>
     
     <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Other Information</label>
            <input id="donator_info" name="donator_info" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
          </div>
     <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Proof of Donation</label>
            <input id="donation_proof" name="donation_proof" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file">
          </div>
        <div class="flex justify-end space-x-2">
          <button id="close-create-donation-record-btn" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Cancel</button>
          <button class="bg-green-500 font-semibold text-white p-2 rounded-md" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="show-donation-details-modal" class="fixed  hidden inset-0 flex items-center justify-center z-10  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-1/4  lg:w-1/4  rounded-lg shadow-lg mx-5 ">
    <div class="px-4 py-3">
      <p class="text-2xl text-center font-semibold text-green-500">Donation Information</p>
    </div>
    <div id="donation-details" class="block  px-10 py-3"></div>

  </div>
</div>

<div id="donation-proof-image" class="hidden  fixed md:px-5  lg:px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg  ">
  <div id="donation-image" class="block">
    
  </div>

  </div>
</div>
<div id="note-modal" class="hidden  fixed md:px-5  lg:px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg  ">
    <form id="donation-note-form">
      @csrf
    <input type="hidden" name="id" id="donation-id">
    <input type="hidden" name="status" id="donation-status">
    <div class="mb-4 w-full">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Add note</label>
            <textarea rows="2" cols="10"  name="note" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" ></textarea>
          </div>
          <div class="flex space-x-2 justify-end">
            <button class="px-2 py-1 rounded-md text-white  bg-green-500" type="submit">Proceed</button>
            <button id="close-note-modal" class="px-2 py-1 rounded-md text-white  bg-blue-500" type="button">Back</button>
          </div>
    </form>

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
    Donation_Btn()
    Verified_Donations()
    Donation_Tab_Controller()
  });
  function Donation_Btn(){
    $('#create-donation-record-btn').click(function (e) { 
      e.preventDefault();
      $('#create-donation-record').removeClass('hidden');
      
    });
    $('#close-create-donation-record-btn').click(function (e) { 
      e.preventDefault();
      $('#create-donation-record').addClass('hidden');
      $('#create-donation-form')[0].reset();
      
    });

    $(document).on('click','.show-donation-details-btn',function(){
      var id= $(this).data('id')
      $.ajax({
        type: "GET",
        url: "/donation-details/"+id,
        data: "data",
        dataType: "json",
        success: function (response) {
          var details="<div>"
          if(response.details.type==='0')
          {
            details+="<p> <span class='font-semibold'>Identity:</span>Anonymous</p>"
          }else{
            details+="<p> <span class='font-semibold'>Name:</span> "+response.details.fname+" "+response.details.lname+"</p>"
            details+="<p> <span class='font-semibold'>Municipality:</span> "+response.details.municipality_city+"</p>"
          }
          details+="<p> <span class='font-semibold'>Donated Amount:</span> "+response.details.donated_amount+"</p>"
          details+="<button class='donation-proof-btn' type='button' data-id="+response.details.id+">"
          details+="<div>"
          details+="<p> <span class='font-semibold'>Proof of donation:</span></p>"
          details+="<img class='h-20 ' src='data:image/jpeg;base64,"+response.details.donation_proof+"'>"
          details+="</div>"
          details+="</button>"

          details+="<p> <span class='font-semibold'>Donated at:</span> "+response.details.created_at+"</p>"

        details+="<div class='flex justify-center mt-3 space-x-2'>"
        if(response.details.status==="PENDING"){

          details+="<button type='button' id='approve-donation-btn' data-id="+response.details.id+" class=' px-2 py-1  rounded-md bg-green-500 text-white font-semibold'>Accept</button>"
          details+="<button type='button' id='decline-donation-btn' data-id="+response.details.id+" class=' px-2 py-1  rounded-md bg-red-500 text-white font-semibold'>Decline</button>"
        }
        details+="<button type='button' class='close-details-modal-btn close px-2 py-1  rounded-md bg-blue-500 text-white font-semibold'>Close</button>"
        
        details+="</div'>"
          details+="</div>"
          $('#donation-details').append(details)
          
          $('#show-donation-details-modal').removeClass('hidden')
        }
      });
    });
    $(document).on('click','.donation-proof-btn',function(){
     
      var id=$(this).data('id')
      $.ajax({
        type: "GET",
        url: "/donation-details/"+id,
        data: "data",
        dataType: "json",
        success: function (response) {
          console.log(response)
          var details="<div>"
       details+="<img class='h-screen' src='data:image/jpeg;base64,"+response.details.donation_proof+"'>"
       details+="</div>"
       details+="<div class='flex justify-end space-x-2'>"
        details+="<button type='button' class='close-donation-image-modal-btn close px-2 py-1 mt-2  rounded-md bg-blue-500 text-white font-semibold'>Close</button>"
        
        details+="</div'>"
      $('#donation-image').append(details)
      $('#donation-proof-image').removeClass('hidden')

        }
      });
    });

    $(document).on('click','.close-donation-image-modal-btn',function(){
      $('#donation-image').empty()
      $('#donation-proof-image').addClass('hidden')
    });
    $(document).on('click','.close-details-modal-btn',function(){
      $('#donation-details').empty()

      $('#show-donation-details-modal').addClass('hidden')
    });
    $(document).on('click','.approved-donation-btn',function(){
      var id=$(this).data('id')
      $.ajax({
        type: "GET",
        url: "/approve-donation/"+id,
        data: "data",
        dataType: "json",
        success: function (response) {
          console.log(response)
        }
      });
    });
    $(document).on('click','#approve-donation-btn',function(){
      var id=$(this).data('id')
      $('#donation-id').val(id);
      $('#donation-status').val('VERIFIED');
      $('#note-modal').removeClass('hidden');
    });
    $(document).on('click','#decline-donation-btn',function(){
      var id=$(this).data('id')
      $('#donation-id').val(id);
      $('#donation-status').val('DECLINED');
      $('#note-modal').removeClass('hidden');
    });
    $('#close-note-modal').click(function (e) { 
      e.preventDefault();
      $('#note-modal').addClass('hidden');
      
    });
    $(document).on('submit','#donation-note-form',function(){
      var formdata= new FormData($(this)[0])
      var submit = $(this);
    submit.prop('disabled', true)
    submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('change-donation-status')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          submit.prop('disabled', false)
        submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {
            $('#donation-note-form')[0].reset();
      $('#note-modal').addClass('hidden');
            alert(response.success)

          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
          submit.prop('disabled', false)
        submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });
    })

    $('#create-donation-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0])
      $.ajax({
        type: "POST",
        url: "{{url('add-donation-record')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log(response)
          if (response.success) {
            $('#create-donation-form')[0].reset();
            alert(response.success)

          } else {
            alert(response.failed)
          }

        },
        error: function(xhr, status, error) {
          // Handle errors, if any
          window.alert(xhr.responseText);
        }
      });
      
    });
  }
  function Verified_Donations() {
    var donation_records = "<table id ='donation-table' class='stripe hover w-full h-auto '>"
    donation_records += "<thead>"
    donation_records += "<tr>"
    donation_records += "<th>Name</th>"
    donation_records += "<th>Muncipality</th>"
    donation_records += " <th>Action</th>"
    donation_records += " </tr>"        
    donation_records += " </thead>"
    donation_records += " <tbody> "
    donation_records += " </tbody>"
    donation_records += " </table>"
    $('#donations-tables').append(donation_records)
    let others = new DataTable('#donation-table', {
      "responsive": true,
      "ajax": {
        "url": "/donation-records",
        "type": "GET",
        "dataSrc": "verified",
      },
      "columns": [{
          "data": null,
          "render": function(data, type, row) {
            return '<p class="text-gray-500 text-xs font-semibold">' + row.fname + ' '  + ' ' + row.lname + '</p>'
          }
        },
        {
          "data":"municipality_city"

        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<button class="show-donation-details-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Details</button>';
          }
        }
      ],
    });
   
  }
  function Pending_Donations() {
    var donation_records = "<table id ='donation-table' class='stripe hover w-full h-auto '>"
    donation_records += "<thead>"
    donation_records += "<tr>"
    donation_records += "<th>Name</th>"
    donation_records += "<th>Muncipality</th>"
    donation_records += " <th>Action</th>"
    donation_records += " </tr>"        
    donation_records += " </thead>"
    donation_records += " <tbody> "
    donation_records += " </tbody>"
    donation_records += " </table>"
    $('#donations-tables').append(donation_records)
    let others = new DataTable('#donation-table', {
      "responsive": true,
      "ajax": {
        "url": "/donation-records",
        "type": "GET",
        "dataSrc": "pending",
      },
      "columns": [{
          "data": null,
          "render": function(data, type, row) {
            return '<p class="text-gray-500 text-xs font-semibold">' + row.fname + ' '  + ' ' + row.lname + '</p>'
          }
        },
        {
          "data":"municipality_city"

        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<button class="show-donation-details-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Details</button>';
          }
        }
      ],
    });
   
  }
  function Decline_Donations() {
    var donation_records = "<table id ='donation-table' class='stripe hover w-full h-auto '>"
    donation_records += "<thead>"
    donation_records += "<tr>"
    donation_records += "<th>Name</th>"
    donation_records += "<th>Muncipality</th>"
    donation_records += " <th>Action</th>"
    donation_records += " </tr>"        
    donation_records += " </thead>"
    donation_records += " <tbody> "
    donation_records += " </tbody>"
    donation_records += " </table>"
    $('#donations-tables').append(donation_records)
    let others = new DataTable('#donation-table', {
      "responsive": true,
      "ajax": {
        "url": "/donation-records",
        "type": "GET",
        "dataSrc": "declined",
      },
      "columns": [{
          "data": null,
          "render": function(data, type, row) {
            return '<p class="text-gray-500 text-xs font-semibold">' + row.fname + ' '  + ' ' + row.lname + '</p>'
          }
        },
        {
          "data":"municipality_city"

        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<button class="show-donation-details-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Details</button>';
          }
        }
      ],
    });
  }

  function Donation_Tab_Controller(){
    $('#verified-donation-table-btn').click(function (e) { 
      e.preventDefault();
      $('#donations-tables').empty();
      Verified_Donations()
      
    });
    $('#pending-donation-table-btn').click(function (e) { 
      e.preventDefault();
      $('#donations-tables').empty();
      Pending_Donations()
      
    });
    $('#other-donation-table-btn').click(function (e) { 
      e.preventDefault();
      $('#donations-tables').empty();
      Decline_Donations()
      
    });
  }
</script>
@endsection