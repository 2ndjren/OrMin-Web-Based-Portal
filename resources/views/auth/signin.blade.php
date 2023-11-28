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

<body>
  <div class="h-screen bg-cover bg-no-repeat bg-opacity-50" style="background-image: url('static/user/home.png')">
    <div class=" mx-auto">
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
        <div class="h-screen w-auto p-2 md:my-28 md:px-10  ">
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
      $('#forgot-account-modal').removeClass('hidden');
      $('#forgot-account-modal').removeClass('block');
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
      $.ajax({
        method: "POST",
        url: "{{url('recover')}}",
        data: $(this).serialize(),
        dataType: "json",
        success: function(response) {
          console.log(response);
          $('#response-show-message').removeClass('hidden')
          $('#response-show-message').addClass('block')
          if (response.success) {
            $('#response-message').text(response.success);
            $('#email').val("");

          } else {
            $('#response-message').text(response.failed);

          }
        }
      });

    });
  }
</script>

</html>