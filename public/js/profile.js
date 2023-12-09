
$(document).ready(function () {
  TabController()

  ImagePreview()
});

function ImagePreview(){
      // Function to display the selected image preview or remove if input is empty
      function displayImagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" alt="Profile Image" style="max-width: 200px; max-height: 200px;" />');
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            // Remove the preview if no file is selected or input is empty
            $('#imagePreview').empty();
        }
    }
    
    // Trigger the displayImagePreview function when a file is selected or input changes
    $('#user_profile').change(function() {
        displayImagePreview(this);
    });
    
    // Handle clearing the input (manually or via script)
    $('#user_profile').on('click', function() {
        // Check if the input is empty when clicked
        if (!$(this).val()) {
            // Remove the preview if the input is empty
            $('#imagePreview').empty();
        }
    });
  
}

function TabController(){
  // buttons
 var appointmentbtn= $('#appointment-container-btn')
 var volunteerbtn= $('#volunteer-container-btn')
 var bloodbtn= $('#blood-container-btn')
 var membershipbtn= $('#membership-container-btn')
// container 
 var appointment_container=$('#appointment-container')
 var volunteer_container=$('#volunteer-container')
 var blood_container=$('#blood-container')
 var membership_container=$('#membership-container')

 $(appointmentbtn).click(function (e) { 
  e.preventDefault();
  appointmentbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  appointmentbtn.removeClass("bg-cyan-500 text-white ")
  volunteerbtn.addClass("bg-cyan-500 text-white ")
  volunteerbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.addClass("bg-cyan-500 text-white")
  bloodbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.addClass("bg-cyan-500 text-white")
  membershipbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")



  $(appointment_container).removeClass('hidden');
  $(appointment_container).addClass('block');
  $(volunteer_container).removeClass('block');
  $(volunteer_container).addClass('hidden');
  $(blood_container).removeClass('block');
  $(blood_container).addClass('hidden');
  $(membership_container).removeClass('block');
  $(membership_container).addClass('hidden');
 });
 $(volunteerbtn).click(function (e) { 
  e.preventDefault();
  volunteerbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  volunteerbtn.removeClass("bg-cyan-500 text-white")
  appointmentbtn.addClass("bg-cyan-500 text-white")
  appointmentbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.addClass("bg-cyan-500 text-white")
  bloodbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.addClass("bg-cyan-500 text-white")
  membershipbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")



  $(volunteer_container).removeClass('hidden');
  $(volunteer_container).addClass('block');
  $(appointment_container).removeClass('block');
  $(appointment_container).addClass('hidden');
  $(blood_container).removeClass('block');
  $(blood_container).addClass('hidden');
  $(membership_container).removeClass('block');
  $(membership_container).addClass('hidden');
 });
 $(bloodbtn).click(function (e) { 
  e.preventDefault();

  bloodbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.removeClass("bg-cyan-500 text-white")
  appointmentbtn.addClass("bg-cyan-500 text-white ")
  appointmentbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  volunteerbtn.addClass("bg-cyan-500 text-white")
  volunteerbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.addClass("bg-cyan-500 text-white")
  membershipbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")

  $(blood_container).removeClass('hidden');
  $(blood_container).addClass('block');
  $(appointment_container).removeClass('block');
  $(appointment_container).addClass('hidden');
  $(volunteer_container).removeClass('block');
  $(volunteer_container).addClass('hidden');
  $(membership_container).removeClass('block');
  $(membership_container).addClass('hidden');
 });
 $(membershipbtn).click(function (e) { 
  e.preventDefault();

  membershipbtn.addClass("bg-white text-cyan-500  border-b-4 border-white ")
  membershipbtn.removeClass("bg-cyan-500 text-white")
  appointmentbtn.addClass("bg-cyan-500 text-white")
  appointmentbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  volunteerbtn.addClass("bg-cyan-500 text-white")
  volunteerbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")
  bloodbtn.addClass("bg-cyan-500 text-white")
  bloodbtn.removeClass("bg-white text-cyan-500  border-b-4 border-white ")

  $(membership_container).removeClass('hidden');
  $(membership_container).addClass('block');
  $(appointment_container).removeClass('block');
  $(appointment_container).addClass('hidden');
  $(volunteer_container).removeClass('block');
  $(volunteer_container).addClass('hidden');
  $(blood_container).removeClass('block');
  $(blood_container).addClass('hidden');
 });
}