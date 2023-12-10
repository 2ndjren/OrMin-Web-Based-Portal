@extends('layout.user.layout')
@section('volunteer')


<title>PRC ORMIN|Volunteer</title>
<div class="h-screen w-full overflow-y-auto ">
    <img class="object-cover w-full h-50" src="{{asset('static/user/home/volbg.jpg')}}" alt="apple watch photo" />

    <div class="w-full xl:px-20 lg:px-18 md:px-16 px-4">

        <div class="w-full mx-auto  py-20 justify-center md:pb-20 ">
            <h1 class="md:text-4xl  xl:text-6xl text-3xl font-bold mb-4 text-gray-900">
                UNITING FOR HUMANITY,<span class="text-red-700"><br>VOLUNTEERS STAND READY!</span>
            </h1>

            <p class="text-lg text-gray-600 ">
                Volunteer Service Office handles programs aim at encouraging people to become an army of volunteers of the Philippine Red Cross
                by sharing their resources, time, and efforts to alleviate human suffering.
                It takes active charge of the administration, development, growth, and effective mobilization of volunteers in all aspects of PRC
                services within the chapter jurisdiction in particular and/or the whole country. <br /><br />

                While this office delivers its service through recruitment, engagement and retention of volunteers,
                it also gives recognition to the outstanding individuals who rendered significant contribution to the organization.
                <br /><br />
                The delivery of essential services of the PRC is powered by the committed service of volunteers who unselfishly devotes time, energy, and resources in serving humanity.
                <br /><br />
                To become a member, fill up the form or just visit our Red Cross Office
            </p>
            <ul class='py-5'>
                <li>
                    <a href="{{url('register-volunteer')}}" class="mt-4 rounded-xl bg-gradient-to-b from-yellow-300 to-yellow-500 px-8 py-2 text-xl text-slate-900 font-bold hover:shadow-2xl">
                        REGISTER NOW!</a>
                </li>
            </ul>
        </div>


        <section class="bg-cover bg-no-repeat py-10 " style="background-image: url('static/user/home/vol.jpg')">

        <div class="w-full mx-auto pb-12 justify-center md:pb-20 ">
           
                <div class="flex">
                    <div class="w-auto">
                        <div class="w-full">
                            <h1 class="md:text-4xl xl:text-6xl text-4xl font-bold mb-4 text-blue-900">
                                RED CROSS<span class="text-red-800 "> 143 PROGRAM</span>
                            </h1>
                            <div class="text-gray-900 text-xl">
                                Red Cross 143 is a community-based volunteering program of the Philippine Red Cross where one leader and a minimum of forty three (43)
                                members form part of an active corps of capable, caring, and committed individuals. RC 143 promotes a culture of self-help in the
                                communities by developing a formidable network of Red Cross volunteers who will predict potential risk, plan, prepare, and practice
                                for effective community based disaster risk reduction. <br />

                                <!-- <ul class="mt-8">
                                    <li class="text-left">
                                        <a href="/auth/signin" class="bg-transparent hover:bg-yellow-500 text-red-600 font-bold hover:text-white py-2 px-4 border-4 border-red-600 hover:border-transparent rounded">
                                            REGISTER NOW!
                                        </a>


                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>



        </section>

        

        <div class="container mx-auto mt-8">
            <h1 class="md:text-4xl font-semibold text-red-600 mt-6 text-2xl">FAQs Volunteer Program</h1>
            <div class="mt-4">
                <!-- Accordion Item 1 -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                        <span>WHAT IS RED CROSS MEMBERSHIP PROGRAM?</span>
                        <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                        A form of donation to the Philippine Red Cross to sustain PRC's humanitarian operations and provide accidental assistance benefits to every individual donor.
                    </div>
                </div>
            </div>

            <div class="my-4">
                <!-- Accordion Item 1 -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                        <span>HOW MUCH IS THE MEMBERSHIP FEE?</span>
                        <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                        The membership fee is Php 60.00 to 1,000.00 depending on your age group and membership categories
                    </div>
                </div>
            </div>
        </div>

        </main>



    </div>
    @include('layout.user.footer')

    </body>
<script>
    $(document).ready(function () {
        // Create();

    });

    function Create(){

        $('#submit-form').submit(function (e) { 
      e.preventDefault();
    // $('.form-inputs').removeClass('border-red-500')
    // $('#create-spinner').removeClass('hidden')

      var formdata= new FormData($(this)[0])
      $.ajax({
      type: "POST",
      url: "{{url('submit-volunteer-form')}}",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (response) {
        if(response.success){
          $('#create-spinner').addClass('hidden')
        //   console.log(response)

          alert(response.success)

        $('#submit-form')[0].reset()
        
        }else if(response.errors){
        //   console.log(response)
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
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
    });
      
    });
    }
</script>
    </html>
    @endsection