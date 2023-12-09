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

<body class="flex justify-center items-center h-screen">
  <div class="h-screen bg-cover bg-no-repeat bg-opacity-50" style="background-image: url('static/user/home.png')">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-2 ">
      <!-- First Column -->
      <div class="flex items-center w-full justify-center md:h-screen h-auto p-4">
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
      <div class="block justify-center bg-white w-auto p-8 overflow-y-auto lg:h-screen">
        <div class="py-10">
          <p class="text-3xl text-gray-800 font-bold ">Create free account.</p>
          <p class="text-gray-600 font-semibold border-b-2">Join the Red Cross: Extend a Hand, Save a Life, Be a Hero!</p>
        </div>
        <div class="block">
          @if(session('success'))
          <span class="text-green-500 p-2">{{session('success')}}</span>
          @elseif(session('failed'))
          <span class="text-red-500">{{session('success')}}</span>
          @endif
        </div>

        <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
          @csrf


          <div class="grid md:grid-cols-3 md:gap-2">
            <div class="relative z-0 w-full mb-6 group">
              <input type="text" value="{{old('fname')}}" name="fname"  id="floating_first_name" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2  dark:focus:border-blue-500 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('fname') is-invalid @enderror" placeholder=" " required />
                  @error('fname')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror

              <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                First Name</label>
            </div>

            <div class="relative z-0 w-full mb-6 group">
              <input type="text" autoComplete="on" value="{{old('mname')}}" name="mname" id="floating_middle_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('mname') is-invalid @enderror" placeholder=" " required />
                  @error('mname')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror
              <label for="floating_middle_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Middle name</label>
            </div>


            <div class="relative z-0 w-full mb-6 group">
              <input type="text" autoComplete="on"value="{{old('lname')}}" name="lname"  id="floating_last_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer  @error('lname') is-invalid @enderror" placeholder=" " required />
                  @error('lname')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror

              <label for="floating_last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Last name</label>
            </div>


          </div>


          <div class="grid md:grid-cols-3 md:gap-2">

            <div class="relative z-0 w-full mb-6 group">
              <input type="number" autoComplete="on" value="{{old('age')}}" name="age" id="floating_last_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer
              @error('age') is-invalid @enderror" placeholder=" " required />
                  @error('age')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror

              <label for="floating_last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Age</label>
            </div>


            <div class="relative z-0 w-full mb-6 group">
              <input type="date" autoComplete="on" value="{{old('bday')}}" name="bday" id="floating_last_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer  @error('bday') is-invalid @enderror" placeholder=" " required />
                  @error('bday')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror

              <label for="floating_last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Birthday</label>
            </div>

            <div class="relative z-0 w-full mb-6 group">
              <label for="gender" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Gender</label>
              <select name='gender' autoComplete="on" id="gender" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('gender') is-invalid @enderror" placeholder=" " required />
              <option value="" class='text-gray-500'>---Choose here---</option>
              <option value="Male">Male</option>
              <option value='Female'>Female</option>
              </select>
              @error('gender')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror
            </div>


          </div>


          <div class="grid grid-cols-2 md:gap-2">
            <div class="relative z-0 w-full mb-6 group  ">
              
              <input type="file"id="user-profile" autoComplete="on" value="{{old('user_profile')}}" name="user_profile" id="profile" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('user_profile') is-invalid @enderror" placeholder=" " required />
              <label for="profile"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Upload your ID picture here</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
            <div class="mb-2" id="imagePreview"></div>
              

              <label for="floating_last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Image Preview</label>
            </div>

          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 md:gap-2">

            <div class="relative z-0 w-full mb-6 group  ">
              <input type="number" autoComplete="on"  value="{{old('phone_num')}}" name="phone_num" id="floating_num" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('phone_num') is-invalid @enderror" placeholder=" " required />
                  @error('phone_num')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror

              <label for="floating_num" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Phone Number</label>
            </div>

            <div class="relative z-0 w-full mb-6 group">
              <input type="email" autoComplete="on" value="{{old('email')}}" name="email" id="floating_email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer required  @error('email') is-invalid @enderror " placeholder=" " />
                  @error('email')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror
              <label for="floating_email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Email</label>
            </div>
          </div>


          <div class="grid grid-cols-1 md:grid-cols-2 md:gap-2">

            <div class="relative z-0 w-full mb-6 group  ">
              <input type="password" autoComplete="on" value="{{old('password')}}" name="password" id="pass" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('password') is-invalid @enderror" placeholder=" " required/>
                  @error('password')
                  <p class="text-sm text-red-500 pt-1 pl-2"><sup><i>{{$message}}</i></sup></p>
                  @enderror
              <label for="pass" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Password</label>
            </div>
            <div class="relative z-0 w-full mb-6 group  ">
              <input type="password" autoComplete="on" value="{{old('password')}}" name="password_confirmation" id="pass" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('password') is-invalid @enderror" placeholder=" " required/>
     
              <label for="pass" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                Confirm Password</label>
            </div>


          </div>

          <div class="text-center">
            <p class="text-gray-400 p-3 text-sm">By clicking the submit button means you are agreeing to our <a class="text-blue-400 underline" href="">Terms</a> & <a class="text-blue-400 underline" href="">Policies</a>.</p>
          </div>
          <div class="flex justify-center p-4">
            <button class="w-full md:w-1/3 bg-green-500 py-2 hover:bg-green-600 text-white" type="submit">Submit</button>
          </div>
          <div class="text-center mb-1">
            <a class="hover:text-blue-400 text-gray-800 hover:border-b-2 pb-1" href="{{url('signin')}}">Already have an account?</a>
            <p class="text-sm text-gray-400 mt-10">All rights reserve.</p>
          </div>

      </div>
      </form>
    </div>
  </div>
  </div>


</body>



</html>


<script>
  $(document).ready(function () {
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
    $('#user-profile').change(function() {
        displayImagePreview(this);
    });
    
    // Handle clearing the input (manually or via script)
    $('#user-profile').on('click', function() {
        // Check if the input is empty when clicked
        if (!$(this).val()) {
            // Remove the preview if the input is empty
            $('#imagePreview').empty();
        }
    });
  
}
</script>