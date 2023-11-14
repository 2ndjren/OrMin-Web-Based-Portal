
<div id="Donation-Form-Modal"   class=" hidden backdrop-blur-sm w-full h-full xl:px-96  sm:px-10  md:px-40 lg:px-96 sm:py-20 fixed z-20">
    <div class=" bg-yellow-50  w-full shadow-xl border-2 border-yellow-500 p-5 " >
      <p class="text-2xl text-center font-bold text-green-500">Donation Form</p>
      <p class=" text-gray-400"><span class="text-blue-500">Note:</span> Please complete the form and put N/A if fields is not necessary to your infomration.</p>
      <div id="create-donation-message" class="hidden h-20 mb-5 w-full bg-green-400 border-2 bg-opacity-50 border-green-600 p-5">
        <p id="create-donation-text-message" class="text-blue-500 text-center "></p>
      </div>
      <form  id="create-donation-form" enctype="multipart/form-data">
        @csrf
        <input type="text" id="donation-fname" class="m-1 py-1 w-1/4" placeholder="First Name" name="fname">
        <input type="text" id="donation-mname" class="m-1 py-1 w-1/4" placeholder="Middle Name" name="mname">
        <input type="text" id="donation-lname" class="m-1 py-1 w-1/4" placeholder="Last Name" name="lname">
        <input type="text" id="donation-sname" class="m-1 py-1 w-20" placeholder="Suffix Name" name="sname">
        <div class="flex">
        <div class="">
          <label >Municipality/City:</label>
        <select class="py-1 m-1" id="donation-municipality_city" name="municipality_city" id="muniselect">
          
          </select>
        </div>
        <input type="text" id="donation-age" class="m-1 py-1 w-16" placeholder="Age" name="age">
        <div class="">
          <label >Gender:</label>
        <select class="m-1 py-1" id="donation-gender" name="gender">
          <option value="">Select</option>
          <option value="MALE">Male</option>
          <option value="FEMALE">Female</option>
        </select>
        </div>
        </div>

      <div class="flex space-x-2">
    <div class="flex w-1/2 space-x-1">
    <label class="py-1">Donation type:</label>
      <select class="py-1 w-44" id="donation-donation_type" name="donation_type">
                <option value="">Select</option>
                <option value="INDIVIDUAL DONATION">Individual Donation</option>
                <option value="GROUP DONATION">Group Donation</option>
                <option value="COMPANY/ORGANIZATION DONATION">Company/Organization Donation</option>
              </select>
    </div>
    <div class="flex w-1/2 space-x-1">
    <label class="py-1">Payment type:</label>
      <select class="py-1" id="donation-payment_type" name="payment_type">
                <option value="">Select</option>
                <option value="GCASH">Gcash</option>
                <option value="BANK TRANSFER">Bank Transfer</option>
                <option value="OVER THE COUNTER">Over the counter</option>
              </select>
    </div>
      </div>
        <input type="text" id="donation-company_name" class="m-1 py-1 w-full" placeholder="Please Specify your group or company name(optional)" name="company_name">
        <input type="file" id="donation-donation_proof" class="py-1" name="donation_proof">
        <input type="text" class="py-1" id="donation-donation_amount" placeholder="Donated amount" name="donated_amount">
        <div class="flex w-full space-x-2 justify-end mt-3">
        <button type="submit" class="bg-green-500 text-white px-5 py-1 hover:bg-green-600 rounded-md">Save</button>
        <button type="button" id="create-donation-btn" class="bg-red-500 text-white hover:bg-red-600 px-5 py-1 rounded-md">Back</button>

        <!-- <div class="border-b-2 border-r-2 border-red-600  h-40 w-40 animate-spin rounded-full"></div> -->
        
        <!-- <i class="fa-solid fa-check text-3xl animate-pulse"></i> -->
        </div>
      </form>
      
    </div>
</div>
<script src="{{asset('js/jquery.js')}}"></script>

<script>
  $(document).ready(function () {
    Municipalities()
    Donation_Buttons()
    Create_Doantion()
  
  });
  function Municipalities(){
    $.ajax({
      type: "GET",
      url: "{{url('municipalites')}}",
      data: "data",
      dataType: "json",
      success: function (data) {
        var select = $('#donation-municipality_city');
         select.append(new Option('Select',''))
                $.each(data, function(index, data) {
                    select.append(new Option(data.name, data.muni_id));
                });
      }
    });
  }

  function Donation_Buttons()
  {
    $('#create-donation-btn').click(function (e) { 
      e.preventDefault();
      $('#Donation-Form-Modal').removeClass('block')
      $('#Donation-Form-Modal').addClass('hidden')
      
    });
    $('#open-create-donation-form-btn').click(function (e) { 
      e.preventDefault();
      $('#Donation-Form-Modal').removeClass('hidden')
      $('#Donation-Form-Modal').addClass('block')
      
    });
  }
  function Create_Doantion()
  {
    $('#create-donation-form').submit(function (e) { 
      e.preventDefault();
      var formData = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            url: "{{url('create-donation')}}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                // Handle the response (e.g., display a success message or update the UI)
                if(data.success){
                  window.alert(data.success)
               $('#create-donation-form')[0].reset()
                Validated_Donation()
                }
                else{
                  window.alert(data.failed)
          
                }
               
          
            },
            error: function (xhr, status, error) {
                // Handle errors (e.g., display an error message)
                console.error(error);
            }
        });
      
    });
  }



</script>