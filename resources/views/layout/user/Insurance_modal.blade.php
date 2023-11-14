<div id="insurance-form-user"  class="hidden backdrop-blur-sm px-40 w-full py-20 h-full fixed z-20">
    <div class=" h-full border-2 border-green-600 rounded-xl w-full bg-gray-100 overflow-y-auto">
        <div class="w-full p-5 text-center">
            
            <p class="font-bold text-2xl"><span class="px-10 py-2 rounded-lg text-red-500">Insurance Form</span></p>
        </div>
        <form id="admin-create-insurance-form" enctype="multipart/form-data">
            @csrf
        <div class="flex w-full space-x-5  px-10">
        </div>
        <div class="flex w-full space-x-5  px-10">
        <div class="block">
            <label class="text-sm text-gray-600">First Name</label> <br>
            <input type="text" value="{{session('USER')['fname']}}"  name="fname" class="py-1">
        </div>
        <div class="block">
            <label class="text-sm text-gray-600">Middle Name</label> <br>
            <input type="text" value="{{session('USER')['mname']}}"  name="mname" class="py-1">
        </div>
        <div class="block">
            <label class="text-sm text-gray-600">Last Name</label> <br>
            <input type="text" value="{{session('USER')['lname']}}"  name="lname" class="py-1">
        </div>
        <div class="block">
            <label class="text-sm text-gray-600">Age</label> <br>
            <input type="number" value="{{session('USER')['age']}}"  name="age" class="py-1 w-14">

        </div>
    </div>
    <div class="flex w-full space-x-5  px-10">
    <div class="block w-1/2">
            <label class="text-sm text-gray-600">Address</label> <br>
            <input type="text"  name="address" class="py-1 w-full">

        </div>
    <div class="block w-1/2">
            <label class="text-sm text-gray-600">Email</label> <br>
            <input type="email" value="{{session('USER')['email']}}"  name="email" class="py-1 w-full">
        </div>
</div>
    <div class="flex w-full space-x-5  mt-5 px-10">
     
    <div class="block">
            <label class="text-sm text-gray-600">Blood Type</label> <br>
            <select name="blood_type" id="" class="py-1">
                <option value="">Select</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="A-">A-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>

        </div>
        <div class="">
        <label class="text-sm text-gray-600">Insurance Type</label> <br>
                    <select id="level-of-insurance" name="level" class="px-5 py-1">
                        <option value="">Select</option>
                        <option value="Classic">Classic</option>
                        <option value="Bronze">Bronze</option>
                        <option value="Silver">Silver</option>
                        <option value="Gold">Gold</option>
                        <option value="Platinum">Platinum</option>
                        <option value="Senior">Senior</option>
                        <option value="Senior Plus">Senior Plus</option>
                    </select>
        </div>
        <div class="block">
            <label class="text-sm text-gray-600">Type of Payment</label> <br>
            <select  name="level" class="px-5 py-1">
                        <option value="">Select</option>
                        <option value="GCASH">GCASH</option>
                        <option value="OVER THE COUNTER">OVER THE COUNTER</option>
        
                    </select>
        </div>
        <div class="block">
            <label class="text-sm text-gray-600">Amount</label> <br>
            <input type="number" id="exact-amount" name="amount" class="py-1 w-20">
        </div>
        <div class="block">
            <label class="text-sm text-gray-600">Proof of Payment</label> <br>
            <input type="file" name="proof_of_payment" class="py-1 w-40">
        </div>
        
    </div>
    <div class=" w-full py-10 flex justify-end  space-x-3 px-10">
    <button type="submit" class="bg-green-500 px-10 py-2 rounded-xl text-white hover:bg-green-600">Save</button>
    <button type="button" id="create-insurance-close-btn" class="bg-green-500 px-10 py-2 rounded-xl text-white hover:bg-green-600">Back</button>

    </div>

    </form>

    </div>
         

</div>


<script>
    $(document).ready(function () {
        SelectInsuranceLevel()
        Create_Insurance()
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
  $('#level-of-insurance').change(function() {
      // Get the selected product's value from the mapping
      var selectedProduct = $(this).val();
      var productValue = productValues[selectedProduct];
      $('#exact-amount').val(productValue);
  });

    });
      }

      function Create_Insurance(){
        $('#admin-create-insurance-form').submit(function (e) { 
            e.preventDefault();
            var formdata= new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "{{url('create-insurance')}}",
                data: formdata,
                contentType: false,
                 processData: false,
                success: function (response) {
                    console.log(response)
                }
            });
            
        });
      }







      
</script>