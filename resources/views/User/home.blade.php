@extends('layout.user.layout')
@section('home')



<div class="h-screen w-full overflow-y-auto ">

  <div class="bg-video-container" style="position: relative;">
  <video autoplay loop muted playsinline preload="auto" class="w-full h-full object-cover absolute inset-0">
  <source src="static/user/animated.webm" type="video/webm">
  Your browser does not support the video tag.
</video>


    <!-- Content goes here -->
    <div class=" h-auto shadow-lg relative">

      <div class=" bg-white bg-opacity-50">
        <div class=" xl:p-8 xl:py-24 p-2">
          <div class="flex flex-col lg:flex-row">
            <!-- Larger left-side column (for screens larger than lg) -->
            <div class="lg:w-2/3  p-8 ">
              <!-- Content for the larger column goes here -->
              <div class="py-4">

                <div class="block text-center xl:text-left space-y-2 ">
                  <p class="text-gray-800 font-bold text-2xl xl:text-4xl text-shadow-sm">PHILIPPINE</p>
                  <p class="text-blue-800 font-bold text-4xl xl:text-6xl text-shadow-sm transition-transform ease-in-out transform hover:scale-110"><span class="text-red-700">RED CROSS</span> ASSOCIATION</p>
                  <p class="text-gray-800 text-2xl xl:text-5xl font-bold ">Oriental Mindoro Chapter</p>
                  <p class="text-gray-800 text-md font-italic justify-items-end">A portal can serve as a central hub for communication between you, the chapter, its members, volunteers, and the public. It allows for efficient sharing of important information, updates, and news related to your Red Cross activities and initiatives in the region.</p>

                  <button class="bg-blue-800 hover:bg-red-700 text-white font-bold mt-4 py-4 px-6 rounded transition-transform ease-in-out transform hover:scale-110">
                    Get Involved!
                  </button>

                </div>



              </div>
            </div>

            <!-- Smaller right-side column (for screens larger than lg) -->
            <div class="lg:w-1/3  p-8  xl:justify-start">
              <!-- Content for the smaller column goes here -->
              <div class="flex justify-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/2BIOHd5XK54?si=imGvb4OUJWLrE11D" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>

            </div>
          </div>

        </div>
      </div>


    </div>


  </div>





  <div class="h-screen bg-gray-400">
    <div class="p-20">
      <div class="flex justify-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pOmpSYs-SyE?si=j8MBaDVhgdBouwc8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </div>
  </div>


  <section class="bg-white" id="services">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
      <div class="py-12 md:py-20">

        {{-- {/* Section header */} --}}
        <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20" data-aos="fade-up">
          <h2 class="text-5xl font-bold text-black pb-4">Save Lives. Join the Red Cross.</h2>

          <p class="text-xl text-gray-500">We take pride in urging all Filipinos to take part in the
            heroism of the Philippine Red Cross by becoming a full-fledged member, volunteer, or donor.</p>
          <ul class="mt-4 p-3">
            <li>
              <a href="/auth/signin" class="btn text-white bg-red-500 hover:bg-red-800 px-6  py-3 rounded-xl">JOIN US</a>
            </li>
          </ul>


        </div>
      </div>
    </div>
  </section>

  <div class="max-w-full p-6 mx-auto bg-white rounded-md overflow-hidden shadow-md">
    <div class="p-6 ">
        <h2 class="text-2xl font-semibold mb-2 border-b-2 border-gray-300">View Latest Post from ORMIN Red Cross</h2>

        <div class="max-h-screen overflow-y-auto border-b-2 border-gray-300">
          
            <div class="bg-blue-100 border-x-4 border-red-500 text-gray-800 p-6 mb-2">
              <div class="flex justify-center">
                <iframe width="560" height="315" src="https://redcross.org.ph/wp-content/uploads/2023/09/373313159_677518164266726_5088723651220931343_n.mp4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>

                <p class="font-bold text-2xl mt-2">
                  ON #INTERNATIONALDAYOFTHEDISAPPEARED, LET'S ALL REMEMBER THOSE WHO ARE STILL MISSING UP TO THIS TIME. </p>
                <p class="text-xs text-gray-500">Posted on November 17, 2023 8:00 am</p>

                <p class="text-md mt-2">Philippine Red Cross continues to reconnect families through its Restoring Family Links — a program of the Red Cross and Red Crescent Movement, more specifically the International Committee of the Red Cross Philippines and National Red Cross and Red Crescent Societies — involving activities that aim to prevent separation and disappearance, look for missing persons, restore and maintain contact between family members and clarify the fate of persons reported missing.</p>
            
            </div>
            <div class="bg-blue-100 border-x-4 border-red-500 text-gray-800 p-4 mb-2">
              <p class="font-bold text-2xl ">Red Cross Blood Letting</p>
              <p class="text-sm">Here goes the announcement content. It could be a brief description or important information you want to highlight.</p>
              <p class="text-sm">Here goes the announcement content. It could be a brief description or important information you want to highlight.</p>
          </div>
          <div class="bg-blue-100 border-x-4 border-red-500 text-gray-800 p-4 mb-2">
            <p class="font-bold text-2xl ">Red Cross Blood Letting</p>
            <p class="text-sm">Here goes the announcement content. It could be a brief description or important information you want to highlight.</p>
            <p class="text-sm">Here goes the announcement content. It could be a brief description or important information you want to highlight.</p>
        </div>
       

            <!-- You can add more announcements as needed -->
        </div>
    </div>
</div>


  <div class="bg-cover bg-no-repeat h-screen py-6 md:py-12" style="background-image: url('static/user/home/BLOOD.jpg')">



    <div class="h-screen p-4 md:p-28 flex flex-col-reverse md:flex-row w-full">
      <div class="w-full md:w-1/3 pb-4 md:pb-0">
        <div class="py-4 transition-transform ease-in-out transform hover:scale-110">
          <iframe class="border-4 border-white" width="100%" height="200" src="https://www.youtube.com/embed/IogKmimow7g?si=9T8cCsdpdjjLj_wt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
      <div class="w-full md:w-2/3 space-y-4 md:space-y-6 px-4 md:px-10">
        <h1 class="text-4xl md:text-4xl xl:text-6xl font-bold mb-2 md:mb-4 text-white text-center md:text-right" data-aos="fade-up">
          SHARE LIFE,<span class="text-red-600 block md:inline"> GIVE BLOOD!</span>
        </h1>
        <div class="text-white text-center md:text-right md:text-xl">
          The National Blood Services is the Philippine Red Cross’ arm that delivers adequate, safe and quality blood supply to the most vulnerable. Through its 88 blood service facilities nationwide, the PRC has been the leading provider of blood and blood products in the country. The PRC continuously promotes voluntary non-remunerated blood donation to attain adequacy.
        </div>
        <div class="text-center md:text-right">
          <ul class="mt-4">
            <li>
              <a href="donate#blood" class="bg-yellow-600 hover:bg-white text-black font-bold hover:text-red-600 py-2 px-4 border-4 hover:border-transparent rounded">
                DONATE BLOOD!
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="h-screen bg-center bg-no-repeat bg-cover ease-in-out transition-opacity" style="background-image: url('https://redcross.org.ph/wp-content/themes/yootheme/cache/banner_inner-1966008c.jpeg');">
    <div class="p-4 md:p-28 bg-green-600 bg-opacity-75">
      <div class="flex flex-col-reverse md:flex-row w-full">
        <div class="w-full md:w-1/2 space-y-4 md:px-10 py-4 md:py-10">
          <p class="text-2xl md:text-4xl font-bold text-white">Be a Red Cross Member</p>
          <div class="space-y-2">
            <p class="text-white font-semibold">Joining the Philippine Red Cross Membership Program gives individuals a sense of self-worth as you extend help to the most vulnerable Filipinos.</p>
            <p class="text-white font-semibold">The Membership Fund Drive program grants you access to all services of the Philippine Red Cross during emergencies, sickness, and disasters.</p>
          </div>
          <p class="text-white font-semibold">GET THE NEW PLATINUM CARD FOR ONLY P1,200! THIS COMES WITH 2 NEW BENEFITS: FREE EMERGENCY AMBULANCE SERVICE AND 1 UNIT OF WHOLE BLOOD.</p>
          <div class="py-5">
            <a class="text-white bg-green-500 rounded-md shadow-md py-2 px-4 md:px-5" href="/membership">LEARN MORE...</a>
          </div>
        </div>
        <div class="w-full md:w-1/2 flex justify-center py-4 md:py-10">
          <img class="border-4 border-white shadow-md bg-center bg-cover bg-no-repeat h-48 md:h-1/2" src="https://redcross.org.ph/wp-content/themes/yootheme/cache/376370625_239587185277034_3826957384081035787_n-f265f1e7.jpeg" alt="">
        </div>
      </div>
    </div>
  </div>




  <div class="h-screen p-6 md:p-28  bg-center bg-cover ease-in-out transition-opacity" style="background-image: url('https://scontent.fmnl30-3.fna.fbcdn.net/v/t1.6435-9/86408136_894556941000320_5054492052813774848_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=8bfeb9&_nc_aid=0&_nc_eui2=AeE0bFobkl3UMSmE0zaa4gJgiaooucyjQMqJqii5zKNAylsYme4GubZ_M21UxmCNQau66HrZZBQG79Dnbx0ZM1V-&_nc_ohc=4FDyUWntYKkAX_Y9fa9&_nc_ht=scontent.fmnl30-3.fna&oh=00_AfCFqUKpI1VIQQI-4nSdTA0Wo1WxROSOjCjXFBWUp8OZzQ&oe=653371D0')">
    <div class="flex h-full w-full bg-white bg-opacity-75">
      <div class="md:w-1/2">
        <!-- Content for the left side (Image side) -->
      </div>
      <div class="text-white md:w-1/2 space-y-4">
        <div class="">
          <p class="font-bold text-4xl md:text-6xl text-red-600">TRAIN with US!</p>
        </div>
        <div class="text-black text-lg md:text-2xl">
          <p>Train your employees with the knowledge and skills they need for effective leadership in the event of an emergency. From First Aid and CPR training, to Lifeguard and EMT certification, The Philippine Red Cross has the emergency health and safety training and certification options available to suit your employees' needs.</p>
        </div>
      </div>
    </div>
  </div>


  <section class="h-screen bg-cover bg-no-repeat py-12 " style="background-image: url('static/user/home/vol.jpg')">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 relative">
      <div class="flex justify-start">
        <div class="px-15 py-24 lg:w-3/4">
          <div class="w-full">
            <h1 class="md:text-4xl  xl:text-6xl text-4xl font-bold mb-4 text-white" data-aos="fade-up">
              BE ONE OF US,<span class="text-red-600"> BE A VOLUNTEER!</span>
            </h1>
            <div class="text-white text-xl">
              Volunteer Service Office handles programs aim at encouraging people to become an army of volunteers of the Philippine Red Cross (PRC) by sharing their resources, time, and efforts to alleviate human suffering.
              It takes active charge of the administration, development, growth, and effective mobilization of volunteers in all aspects of PRC services within the chapter’s jurisdiction in particular and/or the whole country.
            </div>

            <ul class="mt-8">
              <li>
                <a href="/auth/signin" class="bg-blue-600 text-xl hover:bg-white text-white font-bold hover:text-black py-2 px-4 rounded">
                  REGISTER NOW!
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class='bg-gray-900' id="about">

    <div class="mx-auto max-w-5xl px-6 py-16 text-center">
      {{-- <div class="py-12 md:py-15 border-t border-gray-800"> --}}

      <div class="max-w-4xl mx-auto text-center">
        <div class="text-2xl font-architects-daughter text-red-600 mb-2">MISSION & VISION</div>
        <p class="text-xl text-gray-500">A Red Cross that</p>
        <h1 class="font-bold text-5xl text-red-600 mb-4 mt-6">Always FIRST, Always Ready, Always THERE.</h1>
        <p class="text-xl text-gray-200">Philippine Red Cross has truly become the premier humanitarian organization in the country,
          committed to provide quality life-saving services that protect the life and dignity especially of indigent Filipinos in vulnerable situations.</p>

        <ul class="mt-4">
          <li>
            <a href="/get-started" class="btn p-3 text-white bg-red-800 hover:bg-red-500 p-xl mt-10 rounded-xl w-60 h-12">READ MORE...</a>
          </li>
        </ul>
      </div>
    </div>

  </section>

  <section class="bg-white">
    <div class="mx-auto max-w-5xl px-6 py-16 text-center">
      <div class="flex flex-col items-center justify-center">
        <h2 class="text-3xl font-semibold text-gray-800">About Us</h2>
        <div class="w-24 border-b-4 border-red-400"></div>
      </div>
      <p class="mt-4 text-gray-600">

      <h2 class="text-red-600 text-xl font-bold">Philippine Red Cross Mindoro Oriental Chapter.</h2>
      <p> 2010: By virtue of Republic Act 10072, the organization is now known as the Philippine Red Cross (PRC). The humanitarian organization used to involved only in providing
        blood and disaster-related activities, as well as short-term remedies. Now it also focuses on holistic approcahes to uplift the condition of the most vulnerable, and provide a wider array of humanitarian services.</p><br>
      <p>The Philippine Red Cross (PRC) is a humanitarian organization in the Philippines that provides a wide range of services and assistance to those in need. It is a member of the International Red Cross and Red Crescent Movement, which is a global network of organizations dedicated to alleviating human suffering, protecting human dignity, and promoting peace.
        <br />
        <br />
        The Philippine Red Cross operates at both the national and local levels. At the local level, there are various chapters and branches of the organization spread across different cities and provinces in the Philippines. These local branches work closely with communities to deliver essential services and programs. They provide assistance during emergencies and disasters, conduct blood donation drives, offer first aid and healthcare training, conduct youth and volunteer programs, and provide various humanitarian services to vulnerable individuals and communities.
        <br />
        <br />
        The local Philippine Red Cross chapters play a crucial role in responding to local needs and implementing initiatives that are tailored to the specific requirements of their respective areas. They work in coordination with the national headquarters of the Philippine Red Cross to ensure effective and efficient delivery of services and support to those in need throughout the country.
      </p>

      </p>

      {{-- <img class="mt-16 h-80 w-full rounded-md object-cover object-center shadow" src="https://source.unsplash.com/collection/190727/300x300" /> --}}
    </div>
  </section>


  <section class="bg-gray-200 text-gray-200  py-10" id="contact">
    <div class="max-w-6xl mx-auto px-4 sm:px-6  ">
      <div class="relative bg-red-800 py-10 px-8 md:py-30 md:px-6" data-aos="fade-up">
        <div class="relative flex flex-col lg:flex-row justify-between items-center">
          <div class="mb-6 lg:mr-16 lg:mb-0 text-center lg:text-left lg:w-1/2">
            <h3 class="text-4xl font-bold text-white mb-2">SHARE YOUR FEEDBACK.</h3>
            <p class="text-xl text-purple-200">Help us improve our service by providing your feedback.</p>
          </div>
          <form id="create-feedback-form" class="w-full">
            @csrf
            <div>
              <textarea name="message" cols="10" rows="3" placeholder="message" class="mt-3 w-full rounded-xl border border-gray-300 p-3 shadow focus:outline-none focus:ring-2 focus:ring-purple-600"></textarea>
            </div>
            <div class="flex justify-center">
              <button type="submit" class="rounded-xl bg-yellow-400 px-8 py-2 text-white">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <div class="footer h-1/4  bg-gray-700">
    @include('layout.user.footer')
  </div>

</div>
<script>
  $(document).ready(function () {
    Create_Feedback()
  });
  
  function Create_Feedback(){
        $('#create-feedback-form').submit(function (e) { 
            e.preventDefault();
            var formdata= new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "{{url('share-feedback')}}",
                data: formdata,
                contentType: false,
                 processData: false,
                success: function (response) {
                    if(response.success){
                      $('#create-feedback-form')[0].reset()
                      alert(response.success)
                    }else if(response.failed){
                      alert(response.failed)
                    }else{
                      alert('Something went wrong!')
                    }
                },
        error: function(xhr, status, error) {
          // Handle errors, if any
          window.alert(xhr.responseText);
        }
            });
            
        });
      }
</script>
<script>
  // Initialization for ES Users

  import {
    Carousel,
    initTE,
  } from "tw-elements";

  initTE({
    Carousel
  });
</script>

module.exports = {
//...
plugins: [require("daisyui")],
}


@endsection