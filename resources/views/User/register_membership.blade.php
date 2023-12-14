<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRC ORMIN|Appointment</title>
    <script src="{{asset('js/jquery.js')}}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

  <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">
</head>
<body>
<div class="font-semibold  text-gray-600 pl-14 pt-14"><a href="{{url('/profile')}}"> BACK</a></div>

<div id="form-panel">
    
<div id="left-form-panel" class="pl-14 w-1/2 mx-auto">
        <div class="information">
    <p class="text-4xl text-center font-semibold text-blue-500">Membership Registration Form</p>
    <form id="create-membership-account" enctype="multipart/form-data">
      @csrf
      <p class="text-blue-500 text-sm bg-blue-500 bg-opacity-5 p-4">Note: Please complete the necessary details before you submit your mebership request form! Thanky you!</p>
   
      <div class="block space-y-2 p-3">  

      <div class="flex space-x-2">

      

          <div class="relative z-0 w-full mb-6 group">
                                <label for="role" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Blood Type</label>
                                <select name='blood_type' autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                                </select>
                                <span id="blood_type_msg" class="text-sm text-red-500 ml-5 hidden"></span>
                            </div>
          <div class="relative z-0 w-full mb-6 group">
                                <label for="role" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Municipality</label>
                                <select name='municipality' autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
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
                                <span id="municipality_msg" class="text-sm text-red-500 ml-5 hidden"></span>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="barangay" id="floating_first_name" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900  rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                Barangay</label>
                                <span id="barangay_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="barangay_street" id="floating_first_name" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900  rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                Street</label>
                                <span id="barangay_street_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>
      </div>

         <div class=" lg:flex sm:block space-x-2">
         <div class="relative z-0 w-full mb-6 group">
                                <label for="role" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Program</label>
                                <select name="level" id="program" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
                                <option value="Classic">Classic</option>
                            <option value="Bronze">Bronze</option>
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                            <option value="Platinum">Platinum</option>
                            <option value="Senior">Senior</option>
                            <option value="Senior Plus">Senior Plus</option>
                                </select>
                                <span id="level_msg" class="text-sm text-red-500 ml-5 hidden"></span>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="amount" id="exact-amount" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900  rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                Price</label>
                                <span id="amount_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>
   
   </div>
   <div class="flex space-x-2">
<div class="relative z-0 w-full mb-6 group">
                                <label for="role" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                Payment Method</label>
                                <select id="type_of_payment" name="type_of_payment" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
                                <option value="Gcash">Gcash Express </option>

                                </select>
                                <span id="type_of_payment_msg" class="text-sm text-red-500 ml-5 hidden"></span>
                            </div>
                            <div id="gcash_account" class=" hidden w-full border-2 text-center border-gray-100 p-2 rounded-md">
                                <p class="font-semibold text-blue-500">Mode of Payment GCash</p>
                                <div class="flex justify-center space-x-2 text-center w-full">
                                    <div class="text-left">
                                    <p class="text-blue-500">Name: </p>
                                <p class="text-blue-500">Account Number: </p>
                                    </div>
                                    <div class="text-left ">
                                        <p class="font-semibold text-center text-blue-500">Cha Honasan</p>
                                        <p class="font-semibold text-center text-blue-500">12345678900</p>
                                    </div>
                                </div>
                            </div>
                        

   </div>
    <div class="relative z-0 w-full mb-6 group">
                                <input type="file" accept=".jpeg,.jpg,.png" name="proof_of_payment" id="proof_of_payment" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900  rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                Proof of Payment(Upload here!)</label>
                                <span id="proof_of_payment_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

    </div>
    <div class="flex space-x-2 justify-center">
        <button type="button" id="back-form" class="p-2 rounded-md text-white bg-red-500" >Back</button>
        <button type="submit"  class="p-2 rounded-md text-white bg-green-500" >Submit</button>
    </div>

    </form>

    
        </div>

    </div>
    <div class="w-full">
    .   
                            <div class="p-5">
                                <p class="text-center text-blue-500">Payment Image Preview</p>
                            <div class="w-3/4 mx-auto text-center pl-20" class="" ">
                        <div id="payment_preview" class=""></div>
</div>
                            </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        SelectInsuranceLevel()
        Create_Membership_Account()
        Mode_Of_Payment()
        ImagePreview()
    });

function SelectInsuranceLevel(){
        $(document).ready(function () {
        var productValues = {
      "Classic": 65,
      "Bronze": 150,
      "Silver": 300,
      "Gold": 500,
      "Platinum": 1000,
      "Senior": 300,
      "Senior Plus": 350,
  };

  // Attach a change event listener to the select element
  $('#program').change(function() {
      // Get the selected product's value from the mapping
      var selectedProduct = $(this).val();
      var productValue = productValues[selectedProduct];
      $('#exact-amount').val(productValue);
  });

    });
      }
function Mode_Of_Payment(){
   var mode= $('#type_of_payment')
   var payment= $('#proof_of_payment')
   $(mode).change(function (e) { 
    e.preventDefault();
    if($(this).val()==="Gcash"){
        $('#gcash_account').removeClass('hidden')
        $('#form-panel').addClass('flex space-x-2')
        $('#left-form-panel').removeClass('w-1/2 mx-auto')
        $('#left-form-panel').addClass('w-full')
    }
    
   });
   $(payment).change(function (e) { 
    e.preventDefault();
    if($(this).val()!==""){
        $('#gcash_account').removeClass('hidden')
        $('#form-panel').addClass('flex space-x-2')
        $('#left-form-panel').removeClass('w-1/2 mx-auto')
        $('#left-form-panel').addClass('w-full')
    }else{
        $('#gcash_account').addClass('hidden')
        $('#form-panel').removeClass('flex space-x-2')
        $('#left-form-panel').addClass('w-1/2 mx-auto')
        $('#left-form-panel').removeClass('w-full')
    }
    
   });
}

     function Create_Membership_Account(){
        $('#create-membership-account').submit(function (e) { 
          e.preventDefault();
          var formdata = new FormData($(this)[0])
          var submit = $(this);
      submit.prop('disabled', true)
      submit.addClass('opacity-50 cursor-not-allowed')
      $.ajax({
        type: "POST",
        url: "{{url('create-user-membership')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {
            $('#membership-modal').addClass('hidden')
            $('#open-modal-form').addClass('hidden')
          $('#create-membership-account')[0].reset()
          window.location.href="/register-insurance "
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
        });
      }

      function ImagePreview() {
    // Function to display the selected image preview or remove if input is empty
    function displayImagePreview(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#payment_preview').html('<img src="' + e.target.result + '" alt="Payment Image" style="max-width: 500px; max-height:1000px;" />');
        }

        reader.readAsDataURL(input.files[0]);
      } else {
        // Remove the preview if no file is selected or input is empty
        $('#payment_preview').empty();
      }
    }

    // Trigger the displayImagePreview function when a file is selected or input changes
    $('#proof_of_payment').change(function() {
      displayImagePreview(this);
    });

    // Handle clearing the input (manually or via script)
    $('#proof_of_payment').on('click', function() {
      // Check if the input is empty when clicked
      if (!$(this).val()) {
        // Remove the preview if the input is empty
        $('#payment_preview').empty();
      }
    });

  }
</script>
 
</body>
</html>