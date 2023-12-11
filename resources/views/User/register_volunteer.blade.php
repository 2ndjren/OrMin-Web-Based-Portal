<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
</head>
<body>
<div class="font-semibold  text-gray-600 pl-14 pt-14"><a href="{{url('/profile')}}"> BACK</a></div>

    <div class="flex justify-center mx-auto">
<div class="relative mx-auto">
            <div class="max-w-6xl">
                <div class="py-20 px-2 border-y-2 border-gray`">
                    <!-- {{-- {/* Page header */} --}} -->
                    <div class="max-w-full mx-auto text-center pb-4 md:pb-8">
                        <h3 class="lg:text-6xl text-3xl font-bold text-blue-900">REGISTER NOW.</h3>
                    </div>
                    <form id="register-volunteer-form"  enctype="multipart/form-data">
                    @csrf
                        <p class='text-gray-800 pb-3'>PERSONAL INFORMATION</p>
                        <div class="grid md:grid-cols-1 md:gap-6">

                        <div class="relative z-0 w-full mb-6 group">
                                <label for="role" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Role</label>
                                <select name='role' autoComplete="on" id="role" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
                                <option value="First Aider">First Aider</option>
                          <option value="BLOOD">Blood</option>
                          <option value="WELFARE">Welfare</option>
                          <option value="WASH">Wash</option>
                          <option value="HEALTH">Health</option>
                          <option value="DMS">DMS</option>
                          <option value="RYC">RYC</option>
                                </select>
                                <span id="role_msg" class="text-sm text-red-500 ml-5 hidden"></span>
                            </div>
                            </div>

                        <div class="grid md:grid-cols-3 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="fname" id="floating_first_name" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900  rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    First Name</label>
                                <span id="fname_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="mname" id="floating_middle_name" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900  rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="floating_middle_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Middle Name</label>
                                <span id="mname_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="lname" id="floating_last_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="floating_last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Last name</label>
                                <span id="lname_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>
                         </div>

                        <div class="grid md:grid-cols-4 md:gap-6">

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="nationality" id="nationality" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />

                                <label for="nationality" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Nationality</label>
                                <span id="nationality_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="date" autoComplete="on" name="birthday" id="floating_bday" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_bday" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Birthday</label>
                                <span id="birthday_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="gender" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Gender</label>
                                <select name='gender' autoComplete="on" id="gender" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
                                <option value="Male">Male</option>
                                <option value='Female'>Female</option>
                                </select>
                                <span id="gender_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="civil_status" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                Civil Status</label>
                                <select name='civil_status' autoComplete="on" id="civil_status" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
                                <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Seperated">Seperated</option>
                                </select>
                                <span id="civil_status_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                        </div>
                        
                        <p class='text-gray-800 pb-3'>CONTACT INFORMATION</p>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" autoComplete="on" name="phone_no" id="floating_phone" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_phone" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Phone Number</label>
                                <span id="phone_no_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="email" autoComplete="on" name="email" id="floating_email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Email</label>
                                <span id="email_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                          
                        </div>

                        <p class='text-gray-800 pb-3'>ADDRESS</p>
                        <div class="grid md:grid-cols-4 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="barangay_street" id="floating_street" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_street" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Street</label>
                                <span id="barangay_street_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="barangay" id="floating_brgy" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_brgy" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Barangay</label>
                                <span id="barangay_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="municipality" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    City/Municipality</label>
                                <select name='municipal' autoComplete="on" id="municipality" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <option class='text-gray-400' disabled selected hidden>--- CHOOSE HERE ---</option>
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
                                <span id="municipal_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="postal_code" id="floating_zip" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_zip" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Zip Code</label>
                                <span id="postal_code_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>
                        </div>

                        <p class='text-gray-800 pb-3'>OTHER</p>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="occupation" id="floating_phone" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_phone" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Occupation</label>
                                <span id="occupation_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name=" occupation_address" id="floating_email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-100 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Occupation Address</label>
                                <span id="occupation_address_msg" class="text-sm text-red-500 ml-5 hidden"></span>

                            </div>

                          
                        </div>


                        <div class="grid md:grid-cols-2 md:gap-6">
                        <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full md:w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Apply my Information</button>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full md:w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit Application</button>

                        </div>

                       
                    </form>


                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function () {
                Register_Volunteer()
            });
            function Register_Volunteer(){
                $('#register-volunteer-form').submit(function (e) { 
                    e.preventDefault();
                    var submit = $(this);
      submit.prop('disabled', true)
      submit.addClass('opacity-50 cursor-not-allowed')
                    var formData=new FormData($(this)[0])
                    $.ajax({
                        type: "POST",
                        url: "/create-user-volunteer",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log()
                            if(response.success){
                                submit.prop('disabled', false)
                        submit.removeClass('opacity-50 cursor-not-allowed')
                        $('#register-volunteer-form')[0].reset()
                        window.location.href="register-volunteer"
                        alert(response.success)

                            }else if(response.errors){
                                submit.prop('disabled', false)
                        submit.removeClass('opacity-50 cursor-not-allowed')
                                console.log(response)
                                $('span').text('')
                                    $('span').addClass('hidden')
                                $.each(response.errors, function (index, field) {
                                   
                                     $('#'+index+'_msg').removeClass('hidden')
                                     $('#'+index+'_msg').text(field)

                                });
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
        </script>
</body>
</html>