<div id="create-volunteer-modal-form"  class="hidden w-5/6 h-full fixed z-20  ">
    <div class=" h-full w-full bg-gray-100 overflow-y-auto">
        <div class="w-full text-center">
            <p class="text-2xl py-5">Volunteer Form</p>
        </div>
        <div class="w-full h-full px-20">
            <div class=" h-full">
                <form id="volunteer-form-modal" method="POST" action="{{url('create-volunteer')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="">
                    <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                    <div class="">
                                <p>Upload Photo</p>
                                <input type="file" class="border-gray-600 border rounded-md py-1 px-2" name="vol_profile">
                            </div>
                    <div class="">
                                <p>Volunteer ID:</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="vol_id">
                            </div>
                 
                    </div>

                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                            <div class="">
                                <p>First Name</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="fname">
                            </div>
                            <div class="">
                                <p>Middle Name</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="mname">
                            </div>
                            <div class="">
                                <p>Last Name</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="lname">
                            </div>
                            <div class="">
                                <p>Suffix Name</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="sname">
                            </div>
                        </div>


                        <div class="flex border-b-gray-400 shadow-sm space-x-4 w-full pb-2 px-10 pt-2">
                            <div class="">
                                <p>Age</p>
                                <input type="text" class="border-gray-600 w-20 border rounded-md py-1 px-2" name="age">
                            </div>
                            <div class="">
                                <p>Birthday</p>
                                <input type="date" class="border-gray-600 border rounded-md py-1 px-2" name="birthday">
                            </div>
                            <div class="">
                                <p>Nationality</p>
                                <input type="text" class="border-gray-600 w-40 border rounded-md py-1 px-2" name="nationality">
                            </div>
                            <div class="">
                                <p>Civil Status</p>
                                <select name="gender" class="border-gray-600 border py-2 px-2 rounded-md">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="">
                                <p>Civil Status</p>
                                <select name="civil_status" class="border-gray-600 border py-2 px-2 rounded-md">
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="">
                                <p>Blood Type</p>
                                <select class=" py-2 px-2 w-24 rounded-md border border-gray-600" name="blood_type">
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



                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                            <div class="">
                                <p>Municipal</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="municipal">
                            </div>
                            <div class="">
                                <p>Barangay</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="barangay">
                            </div>
                            <div class="">
                                <p>House No.</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="house_no">
                            </div>
                            <div class="">
                                <p>Postal Code</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="postal_code">
                            </div>
                        </div>



                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                            <div class="">
                                <p>Landline</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="landline">
                            </div>
                            <div class="">
                                <p>Phone No.</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="phone_no">
                            </div>
                            <div class="">
                                <p>Email</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="email">
                            </div>
                    
                        </div>




                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                            <div class="">
                                <p>Guardian</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="guardian">
                            </div>
                            <div class="">
                                <p>Relationship</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="relationship">
                            </div>
                            <div class="">
                                <p>Guardian Phone No.</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="guardian_phone_no">
                            </div>
                    
                        </div>

                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                            <div class="">
                                <p>Educational Attainment</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="education_att">
                            </div>
                            <div class="">
                                <p>Still Studying?</p>
                                <select name="studying" class="border-gray-600 border py-2 px-2 rounded-md">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                
                            </div>
                    
                        </div>




                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                        <div class="">
                                <p>School</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="school">
                            </div>
                            <div class="">
                                <p>Course</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="course">
                            </div>
                            <div class="">
                                <p>Year Level</p>
                                <input type="text" class="border-gray-600 border rounded-md py-1 px-2" name="year_level">
                            </div>
                            
                    
                        </div>




                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                        <div class=" w-1/2">
                                <p>When you been volunteer?</p>
                                <input type="text" class=" w-full border-gray-600 border rounded-md py-1   px-2" name="been_volunteer">
                            </div>
                            <div class="">
                                <p>Have you completed any of Red Cross Seminars?</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="been_completed_redcross_seminar">
                            </div>
                   
                            
                    
                        </div>
                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                        <div class="w-1/2">
                                <p>What services you would like to be involved?</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="services_like_to_involve">
                            </div>
                            <div class="">
                                <p>Are you willing to donate blood?</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="willing_to_donate_blood">
                            </div>
                   
                            
                    
                        </div>



                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                        <div class="w-1/2">
                                <p>What days you are free?</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="day_your_free">
                            </div>
                        <div class="w-1/2">
                                <p>What time you are free?</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="time_your_free">
                            </div>
                            <div class="">
                                <p>How long you intend to go in Philippine Red Cross</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="long_intend_in_prc">
                            </div>
                   
                            
                    
                        </div>
                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                        <div class="w-1/2">
                                <p>Where did you know volunteering?</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="where_get_to_know_volunteering">
                            </div>
                            <div class="">
                                <p>Tell us your reason why you want to be a volunteer?</p>
                                <input type="text" class="w-full border-gray-600 border rounded-md py-1 px-2" name="reason_why_become_volunteer">
                            </div>
                   
                            
                    
                        </div>
                        <div class="flex border-b-gray-400 shadow-sm w-full pb-2 space-x-4 px-10 pt-2">
                        <div class="w-full flex justify-center space-x-4">
                            <button type="submit" class="bg-green-500 px-10 rounded-md text-white font-semibold py-2">Saved</button>
                            <button type="button" id="create-volunteer-modal-form-btn" class="bg-green-500 px-10 rounded-md text-white font-semibold py-2">Back</button>
                            </div>
    
                   
                            
                    
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="h-screen"></div>


    </div>
         

</div>



<script>
    $(document).ready(function () {
        Volunteer_Form()
        Volunteer_Btn()
    });

    function Volunteer_Btn(){
        $('#create-volunteer-modal-form-btn').click(function (e) { 
            e.preventDefault();
            $('#create-volunteer-modal-form').removeClass('block')
            $('#create-volunteer-modal-form').addClass('hidden')
            $('#volunteer-form-modal')[0].reset()
            
        });
    }
    function Volunteer_Form(){
        $('#volunteer-form-modal').submit(function (e) { 
            e.preventDefault();
            var formdata= new FormData($(this)[0])
            $.ajax({
            type: 'POST',
            url: "{{url('create-volunteer')}}",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (data){
                if(data.success){
                    window.alert(data.success)
                    $('#volunteer-form-modal')[0].reset()
                    Validated_Volunteers()

                }else{
                    window.alert(data.failed)
                }
              }
            
        });
    });
}

</script>