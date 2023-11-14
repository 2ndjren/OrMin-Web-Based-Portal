<div id="make-membership-account-modal" class=" hidden fixed h-screen w-full bg-black bg-opacity-50 z-10">
  <div class=" sm:w-4/5 md:w-1/2 lg:w-1/2 xl:w-1/2 2xl:w-1/4 mx-auto h-auto bg-white mt-20 rounded-md p-5">
    <div id="my-appointment-details" class=" ">

      <form id="make-membership-form" class="space-y-2" enctype="multipart/form-data">
        @csrf
        <p>COMPLETE THE FORM TO REGISTER</p>
        <div id="message" class=""></div>
        <div class="w-full flex space-x-2">
         <div class="border-2 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">FIRST NAME</p>
          <input type="text" name="fname" class=" p-2 sm:w-full md:w-32 lg:w-40 xl:w-full 3xl:w-full">
         </div>
         <div class="border-2 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">MIDDLE NAME</p>
          <input type="text  "name="mname" class=" p-2 sm:w-full md:w-32 lg:w-40 xl:w-full 3xl:w-full">
         </div>
         <div class="border-2 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">LAST NAME</p>
          <input type="text"  name="lname" class=" p-2 sm:w-full md:w-32 lg:w-40 xl:w-full 3xl:w-full">
         </div>
         <div class="border-2 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">SUFFIXES</p>
          <select  name="sname" class=" p-2 sm:w-full md:w-32 lg:w-40 xl:w-full 3xl:w-full">
            <option value="">OPTIONAL</option>
            <option value="JR.">JR.</option>
            <option value="SR.">SR.</option>
            <option value="II.">II.</option>
            <option value="III.">III.</option>
            <option value="IV.">IV.</option>
            <option value="V.">V.</option>
            <option value="VI.">VI.</option>
            <option value="VII.">VII.</option>
          </select>
         </div>
        </div>
        <div class="sm:w-40 md:w-52 lg:w-full flex space-x-2">
         <div class="border-2 sm:w-24 md:w-20 lg:w-32 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">AGE</p>
          <input type="number" name="age" class="sm:w-14 md:w-14 lg:w-full p-2">
         </div>
         <div class="border-2 w-40 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">BIRTHDAY</p>
          <input type="date" name="birthday" class=" md:w-28 p-2">
         </div>
         <div class="border-2 lg:w-40 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">GENDER</p>
          <select name="gender"class="p-2">
            <option value="">SELECT</option>
            <option value="MALE">MALE</option>
            <option value="FEMALE">FEMALE</option>
          </select>
         </div>
         <div class="border-2 rounded-md p-1 ">
          <p class=" text-xs font-semibold text-gray-600 ">BLOOD TYPE</p>
          <select class="py-1 w-20"   id="donation-donation_type" name="blood_type">
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
        </div>
        <div class="sm:w-full md:w-full lg:w-full 2xl:w-full flex space-x-2">
          <div class="border-2 sm:w-full md:w-full lg:w-32 xl:w-full 2xl:w-full rounded-md p-1 ">
            <p class=" text-xs font-semibold text-gray-600 ">ADDRESS</p>
            <input type="text" name="address" class="sm:w-full md:w-full lg:w-full xl:w-full 2xl:w-full p-2">
           </div>
        </div>
        <div class="sm:w-full md:w-full lg:w-full 2xl:w-full flex space-x-2">
          <div class="border-2 sm:w-full md:w-full lg:w-32 xl:w-full 2xl:w-full rounded-md p-1 ">
            <p class=" text-xs font-semibold text-gray-600 ">EMAIL</p>
            <input type="email" name="email" class="sm:w-full md:w-full lg:w-full xl:w-full 2xl:w-full p-2">
           </div>
        </div>
        <div class="sm:w-full md:w-full lg:w-full 2xl:w-full flex space-x-2">
         
          <div class="border-2 sm:w-full md:w-full lg:w-32 xl:w-full 2xl:w-full rounded-md p-1 ">
            <p class=" text-xs font-semibold text-gray-600 ">MEMBERSHIP LEVEL</p>
            <select id="membershiplevel" name="level" class="sm:w-full md:w-full lg:w-full xl:w-full 2xl:w-full p-2">
              <option value="">SELECT</option>
              <option value="CLASSIC">CLASSIC</option>
              <option value="BRONZE">BRONZE</option>
              <option value="SILVER">SILVER</option>
              <option value="GOLD">GOLD</option>
              <option value="PLATINUM">PLATINUM</option>
              <option value="SENIOR">SENIOR</option>
              <option value="SENIOR PLUS">SENIOR PLUS</option>
            </select>
           </div>
           <div id="amount" class="  border-2 sm:w-full md:w-full lg:w-32 xl:w-full 2xl:w-full rounded-md p-1 ">
            <p class=" text-xs font-semibold text-gray-600 ">PRICE</p>
            <input type="hidden" name="amount"  placeholder="0" id="exactamount" class="sm:w-full md:w-full lg:w-full xl:w-full 2xl:w-full p-2">
            <p id="showamount" class="sm:w-full md:w-full lg:w-full xl:w-full 2xl:w-full p-2">0</p>
           </div>
        </div>
        <div class="sm:w-full md:w-full lg:w-full 2xl:w-full flex space-x-2">
          <div class="border-2 sm:w-full md:w-full lg:w-32 xl:w-full 2xl:w-full rounded-md p-1 ">
            <p class=" text-xs font-semibold text-gray-600 ">TYPE OF PAYMENT</p>
            <select id="type-of-payment" name="type_of_payment" class="sm:w-full md:w-full lg:w-full xl:w-full 2xl:w-full p-2">
              <option value="">SELECT</option>
              <option value="GCASH">GCASH</option>
            </select>
           </div>
          <div id="account-details" class="border-2 hidden sm:w-full md:w-full lg:w-32 xl:w-full 2xl:w-full rounded-md p-1 ">

           </div>
        </div>
        <div class="sm:w-full md:w-full lg:w-full 2xl:w-full flex space-x-2">
          <div class="border-2 sm:w-full md:w-full lg:w-32 xl:w-full 2xl:w-full rounded-md p-1 ">
            <p class=" text-xs font-semibold text-gray-600 ">PROOF OF PAYMENT</p>
            <input type="file" name="proof_of_payment" class="sm:w-full md:w-full lg:w-full xl:w-full 2xl:w-full p-2">
           </div>
        </div>
        <div class="sm:w-full md:w-full lg:w-full 2xl:w-full flex justify-center space-x-2">
          <button type="submit" class="font-semibold text-white w-full bg-green-500 px-5 py-2 rounded-md hover:bg-green-600">SUBMIT</button>
        </div>
        <div class="sm:w-full md:w-full lg:w-full 2xl:w-full flex justify-center space-x-2">
          <button id="close-make-membership-btn" type="button" class="font-semibold hover:underline">CLOSE</button>
        </div>
      

      </form>

    </div>
  </div>
</div>


<script>

  $(document).ready(function () {
    MebershipLevel()
    Payment()
    Make_Membership()
  });
  function Make_Membership(){
    $('#make-membership-form').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0]);
      $.ajax({
                type: "POST",
                url: "{{url('create-insurance')}}",
                data: formdata,
                contentType: false,
                 processData: false,
                success: function (data) {
                  console.log(data)
               if(data.success){
                Membership()
                  $('#make-membership-account-modal').removeClass('block')
                  $('#make-membership-account-modal').addClass('hidden')
                  $('#make-membership-form')[0].reset()
                  window.alert(data.success)
               }else{
                  window.alert(data.failed)

                }
              
                }
            });
      
    });
  }


  function MebershipLevel(){
    var productValues = {
          "CLASSIC":65,
          "BRONZE":150,
          "SILVER":300,
          "GOLD":500,
          "PLATINUM":1000,
          "SENIOR":300,
          "SENIOR PLUS":350,
      };

      $('#membershiplevel').change(function (e) { 
        e.preventDefault();
        var selected=$(this).val()

        var product_val= productValues[selected]
        $('#exactamount').val(product_val)
        $('#showamount').text(product_val)
        
      });

  }
    function Payment(){
      $('#type-of-payment').change(function (e) { 
        e.preventDefault();
        var selected=$(this).val();
        
        if(selected==="GCASH"){
          $('#account-details').removeClass('hidden')
          $('#account-details').addClass('block')
          var details="<p class=' text-xs font-semibold text-cyan-600'>GCASH ACCOUNT</p>"
           details+="<p class=' text-xs font-semibold text-gray-600'>NAME: TEST</p>"
           details+="<p class=' text-xs font-semibold text-gray-600'>ACCOUNT NUMBER: 09108707822</p>"
          $('#account-details').append(details)
        }else{
          $('#account-details').removeClass('block')
          $('#account-details').addClass('hidden')
          $('#account-details').empty()

        }
        
      });
    }
</script>