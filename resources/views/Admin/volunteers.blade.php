@extends('layout.admin.layout')
@section('volunteers')
<title>Volunteers</title>
<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Volunteers</p>
  <div class="flex justify-end">
    <button type="button" id="open-create-volunteer-modal" class="p-3 rounded-md bg-green-600 font-semibold text-white"> Create Volunteer</button>
  </div>
</div>
<div class="h-auto  px-10">


  <div class="bg-white rounded-md w-full overflow-x-auto p-5 space-y-2">
  <div class="">
    <button id="validated-volunteers-btn" class="p-2 rounded-md text-white bg-green-500" >Active Volunteers</button>
    <button id="pending-volunteers-btn" class="p-2 rounded-md text-white bg-green-500" >Pending Applications</button>
    <button id="others-volunteers-btn" class="p-2 rounded-md text-white bg-green-500" >Others</button>
  </div>
  <div id="volunteers-table" class="block w-full">

  </div>
  <div class="">

      <div class=" flex justify-end">

      <button id="open-import-volunteer-modal-btn" class="p-2 rounded-lg bg-blue-500 text-white font-semibold " type="button">Import Data</button>

        <button id="open-export-volunteer-modal-btn" class="p-2 rounded-lg bg-green-500 text-white font-semibold " type="button">Export Data</button>
      </div>

    </div>
  </div>
</div>



<div id="export-data-form-modal" class="fixed   hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/4 mx-auto rounded-lg p-4 shadow-lg ">
    <div id="membership-account-payment" class="block  p-3">
      <form id="volunteer-export-data-form">
        @csrf
        <div class="mb-4 w-full ">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Municipality</label>
                <div class="relative">
                    <select id="municipal" name="municipal" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                      <option value="">Select </option>
                      <option value="PUERTO GALERA">PUERTO GALERA</option>
                      <option value="SAN TEODORO">SAN TEODORO</option>
                      <option value="BACO">BACO</option>
                      <option value="CALAPAN CITY">CALAPAN CITY</option>
                      <option value="NAUJAN">NAUJAN</option>
                      <option value="VICTORIA">VICTORIA</option>
                      <option value="SOCCORO">SOCCORO</option>
                      <option value="POLA">POLA</option>
                      <option value="PINAMALAYAN">PINAMALAYAN</option>
                      <option value="GLORIA">GLORIA</option>
                      <option value="BANSUD">BANSUD</option>
                      <option value="BONGABONG">BONGABONG</option>
                      <option value="ROXAS">ROXAS</option>
                      <option value="MANSALAY">MANSALAY</option>
                      <option value="BULALACAO">BULALACAO</option>
        
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                    </div>
              </div>

        </div>
        <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Barangay</label>
          <input id="barangay" name="barangay" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
        <div class="mb-4 w-full ">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Profile Status</label>
                <div class="relative">
                    <select id="status" name="status" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                      <option value="">Select </option>
                      <option value="VALIDATED">VALIDATED</option>
                      <option value="EXPIRED">EXPIRED</option>
                      <option value="PENDING">PENDING</option>
                      <option value="DECLINED">DECLINED</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                    </div>
              </div>

        </div>
        <div class="mb-4 w-full ">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Year</label>
                <div class="relative">
                    <select id="year" name="year" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                      <option value="">Select </option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>

                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                    </div>
              </div>
              

        </div>

        <div class="flex justify-end space-x-2">
        <button id="close-export-volunteer-modal-btn" class="bg-gray-500 font-semibold text-white p-2 rounded-md" type="button">Back</button>
        <button  class="bg-green-500 font-semibold text-white p-2 rounded-md" type="submit">Export</button>
        </div>
        
      </form>
    </div>

  </div>
</div>




<div id="view-consent-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50 ">
  <div class="modal-container bg-white sm:w-full h-5/6  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg overflow-y-auto ">
    <div id="view-consent"></div>
  </div>
</div>


<div id="create-volunteer-records-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50 ">
  <div class="modal-container bg-white sm:w-full h-5/6  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg overflow-y-auto ">
  <h2 class="text-2xl font-semibold text-green-600">Volunteer Profile Form</h2>
  <div class="p-2 border border-green-500 bg-green-500 bg-opacity-10 rounded-md hidden" id="success">
              <p id="success-message" class="text-center text-blue-500"></p>
            </div>

            <div class="p-2 border border-red-500 bg-red-500 bg-opacity-10 rounded-md hidden" id="failed">
              <p id="failed-message" class="text-center text-blue-500"></p>
            </div>

  <form id="create-volunteer-record-form"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="account_id"  id="account_id">
    <input id="id" name="id" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="hidden" >
    
 <div class="flex space-x-2">
 <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Volunteer ID</label>
          <input id="vol_id" name="vol_id" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">ID Picture(Optional)</label>
          <input id="vol_profile" name="vol_profile" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" >
      </div>

 </div>
 <div class="flex space-x-2">
 <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Role</label>
                    <div class="relative">
                        <select id="role" name="role" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                          <option value="">Select </option>
                          <option value="First Aider">First Aider</option>
                          <option value="BLOOD">Blood</option>
                          <option value="WELFARE">Welfare</option>
                          <option value="WASH">Wash</option>
                          <option value="HEALTH">Health</option>
                          <option value="DMS">DMS</option>
                          <option value="RYC">RYC</option>


                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
 <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Expiration Date</label>
          <input id="expiration_date" name="expiration_date" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" >
      </div>
 </div>
    <div class="flex space-x-2">
      <div class="mb-4 w-full ">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">First Name</label>
          <input id="fname" name="fname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Middle Name</label>
          <input id="mname" name="mname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Last Name</label>
          <input id="lname" name="lname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
    </div>
    <div class="flex space-x-2">

      <div class="mb-4 w-full ">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Birthday</label>
          <input id="birthday" name="birthday" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" >
      </div>
    
      <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Gender</label>
                    <div class="relative">
                        <select id="gender" name="gender" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
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
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nationality</label>
          <input id="nationality" name="nationality" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Civil Status</label>
                    <div class="relative">
                        <select id="civil_status" name="civil_status" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                          <option value="">Select </option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Seperated">Seperated</option>
         

                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
    </div>
<div class="flex space-x-2"> 
<div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Occupation</label>
          <input id="occupation" name="occupation" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Occupation Addres</label>
          <input id="occupation_address" name="occupation_address" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
</div>
    <div class="flex space-x-2">
    <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Municipality/City</label>
                    <div class="relative">
                        <select id="municipality" name="municipality" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                          <option value="">Select </option>
                          <option value="Puerto Galera">Puerto Galera</option>
                          <option value="San Teodoro">San Teodoro</option>
                          <option value="Baco">Baco</option>
                          <option value="Calapan City">Calapan City</option>
                          <option value="Naujan">Naujan</option>
                          <option value="Victoria">Victoria</option>
                          <option value="Socorro">Socorro</option>
                          <option value="Pola">Pola</option>
                          <option value="Pinamalayan">Pinamalayan</option>
                          <option value="Gloria">Gloria</option>
                          <option value="Bansud">Bansud</option>
                          <option value="Bongabong">Bongabong</option>
                          <option value="Roxas">Roxas</option>
                          <option value="Mansalay">Mansalay</option>
                          <option value="Bulalacao">Bulalacao</option>


                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
      <div class="mb-4 w-full ">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Barangay</label>
          <input id="barangay" name="barangay" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Street</label>
          <input id="barangay_street" name="barangay_street" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">ZIP Code</label>
          <input id="postal_code" name="postal_code" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
  
    </div>
 
<div class="flex space-x-2">
<div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Contact Number</label>
          <input id="phone_no" name="phone_no" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" >
      </div>
    <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Email</label>
          <input id="email" name="email" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" >
      </div>
</div>
   
    <div class="mt-6 flex justify-end">
                <button id="close-create-volunteer-modal" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
                <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg"><div>Save </div><div id="create-spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div></button>
            </div>
            </form>
       
    </div>
  </div>




  <div id="edit-volunteer-records-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50 ">
  <div class="modal-container bg-white sm:w-full h-5/6  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg overflow-y-auto ">
  <h2 class="text-2xl font-semibold text-green-600">Update Profile Form</h2>
  <div class="p-2 border border-green-500 bg-green-500 bg-opacity-10 rounded-md hidden" id="success">
              <p id="success-message" class="text-center text-blue-500"></p>
            </div>

            <div class="p-2 border border-red-500 bg-red-500 bg-opacity-10 rounded-md hidden" id="failed">
              <p id="failed-message" class="text-center text-blue-500"></p>
            </div>
  <form id="edit-volunteer-record-form"  enctype="multipart/form-data">
    @csrf
    <input id="edit_id" name="edit_id" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="hidden" >
 <div class="flex space-x-2">
 <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Volunteer ID</label>
          <input id="edit_vol_id" name="edit_vol_id" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">ID Picture(Optional)</label>
          <input id="edit_vol_profile" name="edit_vol_profile" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" >
      </div>

 </div>
 <div class="flex space-x-2">

 <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Role</label>
                    <div class="relative">
                        <select id="edit_role" name="edit_role" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                          <option value="">Select </option>
                          <option value="FIRST AIDER">First Aider</option>
                          <option value="BLOOD">Blood</option>
                          <option value="WELFARE">Welfare</option>
                          <option value="WASH">Wash</option>
                          <option value="HEALTH">Health</option>
                          <option value="DMS">DMS</option>
                          <option value="RYC">RYC</option>


                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
 <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Expiration Date</label>
          <input id="edit_expiration_date" name="edit_expiration_date" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" >
      </div>
 </div>
    <div class="flex space-x-2">
      <div class="mb-4 w-full ">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">First Name</label>
          <input id="edit_fname" name="edit_fname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Middle Name</label>
          <input id="edit_mname" name="edit_mname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Last Name</label>
          <input id="edit_lname" name="edit_lname" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
    </div>
    <div class="flex space-x-2">

      <div class="mb-4 w-full ">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Birthday</label>
          <input id="edit_birthday" name="edit_birthday" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" >
      </div>
    
      <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Gender</label>
                    <div class="relative">
                        <select id="edit_gender" name="edit_gender" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
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
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nationality</label>
          <input id="edit_nationality" name="edit_nationality" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Civil Status</label>
                    <div class="relative">
                        <select id="edit_civil_status" name="edit_civil_status" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country">
                          <option value="">Select </option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Seperated">Seperated</option>
         

                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
    </div>
<div class="flex space-x-2"> 
<div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Occupation</label>
          <input id="edit_occupation" name="edit_occupation" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Occupation Addres</label>
          <input id="edit_occupation_address" name="edit_occupation_address" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
</div>
    <div class="flex space-x-2">
    <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Municipality/City</label>
                    <div class="relative">
                        <select id="edit_municipality" name="edit_municipality" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                          <option value="">Select </option>
                          <option value="Baco">Baco</option>
                <option value="Bansud">Bansud</option>
                <option value="Bongabong">Bongabong</option>
                <option value="Bulalacao">Bulalacao</option>
                <option value="Calapan">Calapan</option>
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
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>
      <div class="mb-4 w-full ">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Barangay</label>
          <input id="edit_barangay" name="edit_barangay" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Street</label>
          <input id="edit_barangay_street" name="edit_barangay_street" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
      <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">ZIP Code</label>
          <input id="edit_postal_code" name="edit_postal_code" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" >
      </div>
  
    </div>
 
<div class="flex space-x-2">
<div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Contact Number</label>
          <input id="edit_phone_no" name="edit_phone_no" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" >
      </div>
    <div class="mb-4 w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Email</label>
          <input id="edit_email" name="edit_email" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email">
      </div>
</div>
   
    <div class="mt-6 flex justify-end">
                <button type="button" id="close-update-volunteer-modal" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg mr-4">Close</button>
                <button type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg"><div>Update </div><div id="edit-spinner" class=" hidden  border-b-2 w-5 h-5 border-white rounded-full animate-spin"></div></button>
            </div>
            </form>
       
    </div>
  </div>


  <div id="volunteer-account-profile-modal" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-20  bg-black bg-opacity-50  ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg">
    <div id="volunteer-account-profile" class="flex space-x-2"></div>
    <div id="volunteer-account-profile-btn" class="flex justify-end"></div>

  </div>
</div>

  <div id="volunteer-request-decline-modal" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-20  bg-black bg-opacity-50  ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/4 mx-auto rounded-lg p-4 shadow-lg">
  <div id="volunteer-request-decline-expiration" >
      <form id="decline-request-volunteer-form">
        @csrf
        <input type="hidden" name="decline_id" id="decline-id">
        <div class="mb-4 w-full ">
          <p class="text-blue-500 font-semibol">Add note</p>
        <textarea name="note" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" cols="0" rows=""></textarea>
      </div>
      <div class="flex justify-end">
        <div class="">
                <button type="button" id="close-decline-volunteer-request-modal" class="font-semibold p-2 text-white bg-gray-500 rounded-md">Close</button>
                <button type="submit"  class="font-semibold p-2 text-white bg-green-500 rounded-md">Proceed</button>


        </div>      
      </div>
      </form>
    </div>

  </div>
</div>


<div id="volunteer-request-approve-modal" class="fixed  hidden px-5 inset-0 flex items-center justify-center z-30  bg-black bg-opacity-50  ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/4 mx-auto rounded-lg p-4 shadow-lg">
    <form id="approve-request-volunteer-form">
    <div id="volunteer-request-approve-expiration" >
        @csrf
        <input type="hidden" name="approve_id" id="approve-id">
        <div class="mb-4 w-full ">
          <p class="text-blue-500 font-semibol text-center">Set expiration date</p>
          <input id="expiration_date" name="expiration_date" class="form-inputs appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" >
      </div>
      <div class="flex justify-end">
        <div class="">
                <button type="button" id="close-approve-volunteer-request-modal" class="font-semibold p-2 text-white bg-gray-500 rounded-md">Close</button>
                <button type="submit"  class="font-semibold p-2 text-white bg-green-500 rounded-md">Proceed</button>


        </div>      
      </div>
      </form>
    </div>

  </div>








<script>
  $(document).ready(function () {
    Volunteer_Btn()
    Registered_Volunteers()
    Volunteer_Profile()
    Update_Profile()
    Update_User_Profiel()
    Export_Data()
  });
  function toUpperCaseFirst(str) {
            return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }

  function Export_Data(){
    $('#close-export-volunteer-modal-btn').click(function (e) { 
      e.preventDefault();
      $('#export-data-form-modal').addClass('hidden');
      $('#volunteer-export-data-form')[0].reset();
      
    });
    $('#open-export-volunteer-modal-btn').click(function (e) { 
      e.preventDefault();
      $('#export-data-form-modal').removeClass('hidden');
      
    });
    $('#volunteer-export-data-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
    $.ajax({
      type: "POST",
      url: "{{url('post-volunteer')}}",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
        if(response.success){
          alert(response.success)
          window.location.href="{{url('export-volunteer')}}"

        }else {
          alert(response.failed)

        }
      },
      error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
    });
      
    });
  }

  function Volunteer_Btn(){
    $('#open-create-volunteer-modal').click(function (e) { 
      e.preventDefault();
      $('#create-volunteer-records-modal').removeClass('hidden')
    });
    $('#close-create-volunteer-modal').click(function (e) { 
      e.preventDefault();
      $('#create-volunteer-record-form')[0].reset()
      $('#create-volunteer-records-modal').addClass('hidden')
    });
    $('#create-volunteer-record-form').submit(function (e) { 
      e.preventDefault();
    $('.form-inputs').removeClass('border-red-500')
    var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      var formdata= new FormData($(this)[0])
      $.ajax({
      type: "POST",
      url: "{{url('create-volunteer-record')}}",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
        if(response.success){
          $('#create-spinner').addClass('hidden')
          console.log(response)

          alert(response.success)

        $('#create-volunteer-record-form')[0].reset()
        
        }else if(response.errors){
          console.log(response)
          $.each(response.errors, function(field, errorMessage) {
                      
                      $('#'+field).addClass('border border-red-500');
          });
          $('#create-spinner').addClass('hidden')

          alert('All fields are required')
        }else{
          $('#create-spinner').addClass('hidden')
          alert('Network error!')
        }
      },
      error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
    });
      
    });
    
    $('#validated-volunteers-btn').click(function (e) { 
      e.preventDefault();
      $('#volunteers-table').empty()
      Registered_Volunteers()
    });
    $('#pending-volunteers-btn').click(function (e) { 
      e.preventDefault();
      $('#volunteers-table').empty()
      Pending_Volunteer_Applications()
    });
    $('#others-volunteers-btn').click(function (e) { 
      e.preventDefault();
      $('#volunteers-table').empty()
      Other_Volunteer_table()
    });
    $(document).on('click','#close-volunteer-profile',function () {
      $('#volunteer-account-profile').empty();
  $('#view-consent').empty()

          $('#volunteer-account-profile-btn').empty();
      $('#volunteer-account-profile-modal').addClass('hidden');

    });
    $(document).on('click','#close-update-volunteer-modal',function () {
      $('#edit-volunteer-records-modal').addClass('hidden')
      $('#edit-volunteer-record-form')[0].reset()
    });



    $('#approve-request-volunteer-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('approve-volunteer-request')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          if(response.success){
            $('#volunteer-account-profile').empty();
            $('#volunteer-account-profile-btn').empty();
            $('#volunteer-account-profile-modal').addClass('hidden');
            $('#volunteer-request-approve-modal').addClass('hidden')
            window.alert(response.success)
          }else{
            alert(response.failed)

          }
        },
        error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
      });
    });


    $('#decline-request-volunteer-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0])
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('decline-volunteer-request')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          if(response.success){
            $('#volunteer-account-profile').empty();
            $('#volunteer-account-profile-btn').empty();
            $('#volunteer-account-profile-modal').addClass('hidden');
            $('#volunteer-request-decline-modal').addClass('hidden')
            window.alert(response.success)
          }else{
            alert(response.failed)

          }
        },
        error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
      });
    });




    
  }
  function Update_User_Profiel()
  {
    
    $('#edit-volunteer-record-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0])
      $('.form-inputs').removeClass(' border-red-500')
    $('#edit-spinner').removeClass('hidden')
    var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
    
      $.ajax({
        type: "POST",
        url: "{{url('update-volunteer-record')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          if(response.success){
          $('#edit-spinner').addClass('hidden')
          $('#edit-volunteer-records-modal').addClass('hidden')
         $('#volunteer-account-profile-modal').addClass('hidden')
          alert(response.success)

        $('#edit-volunteer-record-form')[0].reset()
        
        }else if(response.errors){
          $.each(response.errors, function(field, errorMessage) {
                      
                      $('#edit_'+field).addClass(' border-red-500');
          });
          $('#edit-spinner').addClass('hidden')
          alert('All fields are required')
        }else{
          $('#edit-spinner').addClass('hidden')
          alert(response.failed)
        }
      },
      error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
      });
    });
  }

  function Registered_Volunteers(){
  var validated_table ="<table id='validated-accounts' class='stripe hover  w_full '>"
      validated_table +="<thead>"
      validated_table+="<tr>"
      validated_table+="<th>Name</th>"
      validated_table+="<th>Address</th>"
      validated_table+="<th>Role</th>"
      validated_table+=" <th>Action</th>"
      validated_table+=" </tr>"
      validated_table+=" </thead>"
      validated_table+=" <tbody> "
      validated_table+=" </tbody>"
      validated_table+=" </table>"
      $('#volunteers-table').append(validated_table)
  let validated = new DataTable('#validated-accounts', {
        "responsive":true,
        "ajax": {
            "url": "/volunteers_table",
            "type": "GET",
            "dataSrc": "validated",
        },
        "columns": [
            { 
              "data": null ,
              "render":function(data,type,row){
                return '<p class="text-gray-500 text-xs font-semibold">'+row.fname+' '+row.mname+' '+row.lname+'</p>'
              }
            },
            {
              "data":null,
              "render": function(data,type,row){
                return '<span class=" font-semibold text-xs  ">'+row.barangay_street+' '+row.barangay+' '+row.municipal+','+row.province+'</span>'
              }
            },
            {
              'data':'role'
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return '<button class="volunteer-profile-modal-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Profile</button>';
                }
            }
        ],
    });
$(document).on('click','#approve-volunteer-request-btn',function () {

  $('#volunteer-request-approve-modal').removeClass('hidden')
  
});
$(document).on('click','#close-approve-volunteer-request-modal',function () {
  $('#volunteer-request-approve-modal').addClass('hidden')
  $('approve-request-volunteer-form')[0].reset()
  
});
$(document).on('click','#decline-volunteer-request-btn',function () {

  $('#volunteer-request-decline-modal').removeClass('hidden')
  
});
$(document).on('click','#close-decline-volunteer-request-modal',function () {
  $('#volunteer-request-decline-modal').addClass('hidden')
  $('#decline-request-volunteer-form')[0].reset()
  
});
$(document).on('click','#close-view-consent',function () {
  $('#view-consent').empty()
  
          $('#view-consent-modal').addClass('hidden')
  
});
$(document).on('click','#delete_volunteer_declined_profile',function () {
  var id= $(this).data('id')
  var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
  $.ajax({
    type: "GET",
    url: "/delete-volunteer-profile/"+id,
    data: "data",
    dataType: "json",
    success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
      if(response.success){
        $('#volunteer-account-profile').empty();
          $('#volunteer-account-profile-btn').empty();
      $('#volunteer-account-profile-modal').addClass('hidden');
        alert(response.success)

      }else{
        alert(response.failed)
      }
      
    },
    error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
  });
  
});
$(document).on('click','#delete_volunteer_validated_profile',function () {
  var id= $(this).data('id')
  var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
  $.ajax({
    type: "GET",
    url: "/delete-volunteer-profile/"+id,
    data: "data",
    dataType: "json",
    success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
      if(response.success){
        $('#volunteer-account-profile').empty();
          $('#volunteer-account-profile-btn').empty();
      $('#volunteer-account-profile-modal').addClass('hidden');
        alert(response.success)

      }else{
        alert(response.failed)
      }
      
    },
    error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
  });
  
});


$(document).on('click','.consent-view-btn',function () {
  $('#view-consent').empty()
       var id=$(this).data('id');
       var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')

       $.ajax({
        type: "GET",
        url: "/volunteer_profile/"+id,
        data: "data",
        dataType: "json",
        success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          var consent="<div>"
          consent +="<img src='data:image/jpeg;base64,"+response.consent+"'>"
          consent+="<div class='flex justify-end my-2'>"
          consent+="<button type='button' id='close-view-consent' class='p-2 bg-gray-500 text-white rounded-md'>Close</button>"
          consent+="</div>"

          $('#view-consent').append(consent)
          $('#view-consent-modal').removeClass('hidden')
        },
        error: function (xhr, status, error) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
                window.alert(xhr.responseText);
            }
       });
  });



}

function Update_Profile(){
  $(document).on('click','#edit-volunteer-profile',function () {
       var id=$(this).data('id');
       var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
       $.ajax({
        
        type: "GET",
        url: "/volunteer_profile/"+id,
        data: "data",
        dataType: "json",
        success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          $('#edit_id').val(response.id)
          $('#edit_vol_id').val(response.vol_id)
          $('#edit_fname').val(response.fname)
          $('#edit_mname').val(response.mname)
          $('#edit_lname').val(response.lname)
          $('#edit_occupation').val(response.occupation)
          $('#edit_birthday').val(response.birthday)
          $('#edit_gender').val(response.gender)
          $('#edit_civil_status').val(response.civil_status)
          $('#edit_nationality').val(response.nationality)
          $('#edit_municipality').val(response.municipal)
          $('#edit_barangay').val(response.barangay)
          $('#edit_barangay_street').val(response.barangay_street)
          $('#edit_postal_code').val(response.barangay_street)
          $('#edit_role').val(response.barangay_street)
          $('#edit_expiration_date').val(response.expiration_date)
          $('#edit_occupation_address').val(response.occupation_address)
          $('#edit_phone_no').val(response.phone_no)
          $('#edit_email').val(response.email)
          $('#edit-volunteer-records-modal').removeClass('hidden')
        },
        error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
       });
       

  });
}
  function Pending_Volunteer_Applications(){
  var validated_table ="<table id='validated-accounts' class='stripe hover  w_full '>"
      validated_table +="<thead>"
      validated_table+="<tr>"
      validated_table+="<th>Name</th>"
      validated_table+="<th>Address</th>"
      validated_table+="<th>Role</th>"
      validated_table+=" <th>Action</th>"
      validated_table+=" </tr>"
      validated_table+=" </thead>"
      validated_table+=" <tbody> "
      validated_table+=" </tbody>"
      validated_table+=" </table>"
      $('#volunteers-table').append(validated_table)
  let validated = new DataTable('#validated-accounts', {
        "responsive":true,
        "ajax": {
            "url": "/volunteers_table",
            "type": "GET",
            "dataSrc": "pending",
        },
        "columns": [
            { 
              "data": null ,
              "render":function(data,type,row){
                return '<p class="text-gray-500 text-xs font-semibold">'+row.fname+' '+row.mname+' '+row.lname+'</p>'
              }
            },
            {
              "data":null,
              "render": function(data,type,row){
                return '<span class=" font-semibold text-xs  ">'+row.barangay_street+' '+row.barangay+' '+row.municipal+','+row.province+'</span>'
              }
            },
            {
              'data':'role'
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return '<button class="volunteer-profile-modal-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Profile</button>';
                }
            }
        ],
    });

}
  function Other_Volunteer_table(){
  var validated_table ="<table id='validated-accounts' class='stripe hover  w_full '>"
      validated_table +="<thead>"
      validated_table+="<tr>"
      validated_table+="<th>Name</th>"
      validated_table+="<th>Address</th>"
      validated_table+="<th>Role</th>"
      validated_table+=" <th>Action</th>"
      validated_table+=" </tr>"
      validated_table+=" </thead>"
      validated_table+=" <tbody> "
      validated_table+=" </tbody>"
      validated_table+=" </table>"
      $('#volunteers-table').append(validated_table)
  let validated = new DataTable('#validated-accounts', {
        "responsive":true,
        "ajax": {
            "url": "/volunteers_table",
            "type": "GET",
            "dataSrc": "declined",
        },
        "columns": [
            { 
              "data": null ,
              "render":function(data,type,row){
                return '<p class="text-gray-500 text-xs font-semibold">'+row.fname+' '+row.mname+' '+row.lname+'</p>'
              }
            },
            {
              "data":null,
              "render": function(data,type,row){
                return '<span class=" font-semibold text-xs  ">'+row.barangay_street+' '+row.barangay+''+row.municipal+''+row.province+'</span>'
              }
            },
            {
              'data':'role'
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return '<button class="volunteer-profile-modal-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Profile</button>';
                }
            }
        ],
    });

}


function Volunteer_Profile(){

  $(document).on('click','.volunteer-profile-modal-btn',function () {
    var id = $(this).data('id')
    $('#volunteer-account-profile').empty();
    $('#volunteer-account-profile-btn').empty();
    var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
    var profile_details=$.ajax({
      type: "GET",
      url: "/volunteer_profile/"+id,
      data: "data",
      dataType: "json",
      success: function (response) {
      submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
      var left_details="<div class='w-full'>"
          if(response.vol_profile!==null){
            left_details+="<div class='mx-auto h-auto w-full border'><img src='data:image/jpeg;base64,"+response.vol_profile+"'></div>"
          }else{
            left_details+="<div class='mx-auto h-w-20 h-full border'><img src='https://cdn-icons-png.flaticon.com/512/3106/3106921.png'></div>"
          }
          left_details +="<div>"
          var right_details ="<div class='w-full p-5 border'>"
          right_details+="<p class='text-3xl text-red-500 font-semibold text-center mb-3'>Volunteer Profile</p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>ID : <span class='text-gray-600  text-sm' id='profile-password'>"+response.vol_id+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>EXPIRATION DATE  : <span class='text-gray-600  text-sm' id='profile-password'>"+response.expiration_date+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>NAME : <span class='text-gray-600  text-sm' id='profile-password'>"+response.fname+" "+response.mname+" "+response.lname+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>BIRTHDAY : <span class='text-gray-600  text-sm' id='profile-password'>"+response.birthday+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>GENDER : <span class='text-gray-600  text-sm' id='profile-password'>"+response.gender+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>NATIONALITY : <span class='text-gray-600  text-sm' id='profile-password'>"+response.nationality+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>CIVIL STATUS : <span class='text-gray-600  text-sm' id='profile-password'>"+response.civil_status+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>ADDRESS : <span class='text-gray-600  text-sm' id='profile-password'>"+response.barangay_street+" "+response.barangay+", "+response.municipal+" "+response.province+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>ROLE : <span class='text-gray-600  text-sm' id='profile-password'>"+response.role+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>OCCUPATION : <span class='text-gray-600  text-sm' id='profile-password'>"+response.occupation+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>WORK ADDRESS : <span class='text-gray-600  text-sm' id='profile-password'>"+response.occupation_address+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>PHONE NO. : <span class='text-gray-600  text-sm' id='profile-password'>"+response.phone_no+"</span></p>"
          right_details+="<p class='font-semibold text-gray-400 text-xs'>EMAIL : <span class='text-gray-600  text-sm' id='profile-password'>"+response.email+"</span></p>"
          if(response.consent!==null){
            right_details+="<p class='font-semibold text-gray-400 text-xs'>CONSENT : <button  data-id="+response.id+" class='consent-view-btn  text-white bg-gray-500 font-semibold rounded-md p-2'>Show</button></p>"
          }
          right_details +="</div>"
          var volunteer_profile_btn ="<div class='space-x-2 mt-2'>"
          volunteer_profile_btn +="<button id='close-volunteer-profile' class='text-white bg-gray-500 font-semibold rounded-md p-2'>Close</button>"
          if(response.status==="PENDING"){
            $('#approve-id').val(response.id);
            $('#decline-id').val(response.id);
            volunteer_profile_btn +="<button id='approve-volunteer-request-btn' data-id="+response.id+" class='text-white bg-green-500 font-semibold rounded-md p-2'>Approve</button>"
            volunteer_profile_btn +="<button id='decline-volunteer-request-btn' data-id="+response.id+" class='text-white bg-red-500 font-semibold rounded-md p-2'>Decline</button>"
          }else if(response.status==="VALIDATED"){
            volunteer_profile_btn +="<button type='button'  data-id="+response.id+" id='edit-volunteer-profile' class=' text-white bg-yellow-500 font-semibold rounded-md p-2'>Edit</button>"
            volunteer_profile_btn +="<button type='button'  data-id="+response.id+" id='delete_volunteer_validated_profile' class=' text-white bg-red-500 font-semibold rounded-md p-2'>Delete</button>"
          }else{
            volunteer_profile_btn +="<button  data-id="+response.id+" id='delete_volunteer_declined_profile'  class=' text-white bg-red-500 font-semibold rounded-md p-2'>Delete</button>"

          }
          volunteer_profile_btn +="<div>"

          $('#volunteer-account-profile').append(left_details);
          $('#volunteer-account-profile').append(right_details);
          $('#volunteer-account-profile-btn').append(volunteer_profile_btn);
      $('#volunteer-account-profile-modal').removeClass('hidden');
      }
    });
  });

}
</script>



@endsection