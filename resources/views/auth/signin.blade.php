<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

  <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">


</head>
<body class="flex justify-center items-center h-auto">


<div class="h-auto bg-cover bg-no-repeat bg-opacity-50" style="background-image: url('static/user/home.png')">
  <div class="mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-4">
        <!-- First Column -->
        <div class="flex items-center w-full justify-center h-auto p-4">
          <div class="w-full text-center">
          <!-- <div class="w-full flex justify-center">

          <a href="{{url('/')}}" class="flex">
              <img src="https://redcross.org.ph/wp-content/themes/yootheme/cache/logo-968682b9.png" alt="">
            </a>
        </div> -->

            <p class="text-white font-normal text-sm md:text-xl pb-5">Connecting Hearts, Saving Lives</p>
            <p class="text-white font-bold text-2xl md:text-6xl">PRC MINDORO ORIENTAL CHAPTER</p>
            <p class="text-gray-500 font-lighter text-xs md:text-lg py-5"><i>The Philippine Red Cross Oriental Mindoro Chapter is a vital humanitarian organization dedicated to serving the needs of the local community and beyond. Nestled in the heart of Oriental Mindoro, this chapter is a beacon of hope and support during times of crisis and a pillar of assistance in times of need.</i></p>
          </div>
        </div>


        <!-- Second Column -->
        <div class="w-full md:my-10 md:px-10">
        <div class="bg-opacity-50 bg-gray-900 rounded-md p-6">
            <div class="block mb-5">
              <p class="text-white">Welcome, Let's go!</p>
              <p class="text-white text-2xl">Sign in now</p>
            </div>
            <div class="block">
              @if(session('success'))
              <span class="text-green-500 p-2">{{session('success')}}</span>
              @elseif(session('failed'))
              <span class="text-red-700">{{session('failed')}}</span>
              @endif
            </div>

            <form action="{{url('login')}}" method="post">
              @csrf
              <div class="block" id="signin-email">
                <label class="text-sm text-white" for="">Email <br></label>
                <input name="email" type="email" class="text-gray-900 p-2 w-full text-md rounded-sm @error('email') is-invalid @enderror">
                <div>@error('email')
                  <p class="text-left text-red-700 text-sm"><sup>{{$message}}</sup></p>
                  @enderror
                </div>
              </div>
              <div class="block pt-4" id="signin-password">
                <label class="text-sm text-white" for="">Password <br></label>
                <input name="password" type="password" class="text-gray-900 p-2 w-full text-md rounded-sm @error('password') is-invalid @enderror">
                <div>@error('password')
                  <p class="text-left text-red-700 text-sm"><sup>{{$message}}</sup></p>
                  @enderror
                </div>
              </div>
              <div class="flex justify-center py-4">
                <button class="w-full bg-green-500 py-2 hover:bg-green-600 text-white" type="submit">Submit</button>
              </div>
              <div class="text-center mb-1">
                <button type="button" id="forgot-account-btn" class="hover:text-white text-white hover:border-b-2 pb-1" href="">Forgot account?</button>
              </div>
              <div class="text-center mb-1">
                <a class="hover:text-white text-white hover:border-b-2 pb-1" href="{{url('signup')}}">Create account?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="password-reset-modal" class="fixed hidden  inset-0 flex items-center justify-center z-10  bg-black bg-opacity-50  overflow-y-auto ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/4 mx-auto rounded-lg shadow-lg ">

  <div class="p-3">    
    <form id="reset-account">
      @csrf
      
      <div class="">
        <p class="font-semibold text-lg">Forgot Account?</p>
        <p class="mb-1 text-sm text-blue-500">Enter your email account here!</p>
      </div>
      <div class="relative z-0 w-full mb-6 group">
              <input type="text" value="{{old('email')}}" name="email"  id="floating_first_name" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2  dark:focus:border-blue-500 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('fname') is-invalid @enderror" placeholder=" " required />
                  @error('fname')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror

              <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Email</label>
            </div>
      <div class="flex justify-center space-x-2">
        <button type="button" id="close-forgot-account-btn" class="px-2 py-1 bg-blue-500 font-semibold text-white rounded-md">Back</button>
      <button type="submit" class="px-2 py-1 bg-green-500 font-semibold text-white rounded-md">Submit</button>
      </div>
    </form></div>

  </div>
</div>
</body>



<script>
  $(document).ready(function() {
    ForgotButton()
    Send_Mail_Recovery_Verification()
    Close_Forgot_Modal()
  });

  function ForgotButton() {
    $('#forgot-account-btn').click(function(e) {
      e.preventDefault();
      $('#password-reset-modal').removeClass('hidden');

    });
    $('#close-forgot-account-btn').click(function(e) {
      e.preventDefault();
      $('#password-reset-modal').addClass('hidden');

    });

  }

  function Close_Forgot_Modal() {
    $('#response-close-btn').click(function(e) {
      e.preventDefault();
      $('#response-show-message').removeClass('block');
      $('#response-show-message').addClass('hidden');

    });
  }

  function Send_Mail_Recovery_Verification() {
    $('#reset-account').submit(function(e) {
      e.preventDefault();
      var submit=$(this);
      submit.prop('disabled',true)
      submit.addClass('opacity-50 cursor-not-allowed')
      var formdata= new FormData($(this)[0])
      $.ajax({
        type: "POST",
        url: "{{url('recover')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          submit.prop('disabled',false)
      submit.removeClass('opacity-50 cursor-not-allowed')
          console.log(response)
          if (response.success) {
            window.location.href="/email-reminder"
          } else {
            alert(response.failed)
           

          }
        },
      error: function(xhr, status, error) {
        // Handle error response here
        console.log(xhr.responseText);
      }
      });

    });
  }
</script>

</html>