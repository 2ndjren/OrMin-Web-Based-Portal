
<div id="Blood-Donation-Form-Modal"   class=" hidden backdrop-blur-sm w-full h-full xl:px-96  sm:px-10  md:px-40 lg:px-96 sm:py-20 fixed z-20">
    <div class=" bg-yellow-50  w-full shadow-xl border-2 border-yellow-500 p-5 " >
      <p class="text-2xl text-center font-bold text-green-500">Blood Donation Form</p>
      
      <div id="create-blood-donation-message" class="hidden h-20 mb-5 w-full bg-green-400 border-2 bg-opacity-50 border-green-600 p-5">
        <p id="create-donation-text-message" class="text-blue-500 text-center "></p>
      </div>
      <form  id="create-blood-donation-form" >
        @csrf
        <input type="text" id="donation-fname" class="m-1 py-1 w-1/4" placeholder="First Name" name="fname">
        <input type="text" id="donation-mname" class="m-1 py-1 w-1/4" placeholder="Middle Name" name="mname">
        <input type="text" id="donation-lname" class="m-1 py-1 w-1/4" placeholder="Last Name" name="lname">
        <input type="text" id="donation-sname" class="m-1 py-1 w-20" placeholder="Suffix Name" name="sname">
        <div class="flex">

        <div class="">
          <div class=" flex">     
          <input type="text"  class="m-1 py-1 w-16" placeholder="Age" name="age">
          <div class="">
        <label >Birthday:</label>
          <input type="date"  class="m-1 py-1 w-40"  name="birthday">
        </div>
        <div class="">
          <label class="py-1" >Gender:</label>
        <select class="m-1 py-1" id="donation-gender" name="gender">
          <option value="">Select</option>
          <option value="MALE">Male</option>
          <option value="FEMALE">Female</option>
        </select>
      </div>
        </div>
    
        </div>
        </div>
        <div class="block">
          <label >Complete Address:</label>
          <input class="py-1 m-1 w-full" id="donation-municipality_city" name="address" >
        </div>

      <div class=" flex space-x-2">
        
        <div class="">
        <label class="py-1">Blood type:</label>
      <select class="py-1 w-44" id="donation-donation_type" name="blood_type">
                <option value="">Select</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
               
              </select>
        </div>
              <div class="block">
          <label >Date Donated</label>
          <input type="date" class="py-1 w-full" id="donation-municipality_city" name="donated_at" >
        </div>
        <label >No of Blood Bag:</label>
          <input class="py-1 m-1 w-full" name="bag_count" >
        </div>
      </div>
        <div class="flex w-full space-x-2 justify-end mt-3">
        <button type="submit" class="bg-green-500 text-white px-5 py-1 hover:bg-green-600 rounded-md">Save</button>
        <button type="button" id="close-create-blood-donation-btn" class="bg-red-500 text-white hover:bg-red-600 px-5 py-1 rounded-md">Back</button>

        </div>
      </form>
      
    </div>
</div>


<script>
  $(document).ready(function () {
    Create_Blood_Donors()
  });

  function Create_Blood_Donors(){
    $('#create-blood-donation-form').submit(function (e) { 
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
           type: 'POST',
             url: "{{url('create-blood-donation-information')}}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) 
     {
      if(data.success){
        $('#create-blood-donation-form')[0].reset()
          window.alert(data.success)
          Blood_Overview()
      }
      else{
        window.alert(data.failed)

      }
        }
      });
      
    });
  }
</script>