<header class="  md:block lg:block xl:block 2xl:block lg:h-20 sm:h-20 md:h-20 xl:h-20 2xl:h-20 bg-red-500 p-2 shadow-md relative">
  <button type="button" id="user-nav-menu-btn" class="text-white mt-5 ml-3  lg:hidden xl:hidden 2xl:hidden">Open</button>
  <div class=" md:space-x-8 lg:space-x-8 xl:space-x-8 2xl:space-x-8  text-white md:justify-end md:flex  md:mr-20 md:mt-5  lg:justify-end lg:flex  lg:mr-20 xl:justify-end xl:flex  xl:mr-20 xl:mt-5 2xl:justify-end 2xl:flex  2xl:mr-20 2xl:mt-5 sm:hidden ">
    <a class="hover:border-b-2 border-white hover:duration-200 hover:translate-x-1 " href="{{url('/')}}">Home</a>
    <a class="hover:border-b-2 border-white hover:duration-200 hover:translate-x-1 " href="">Services</a>
    <a class="hover:border-b-2 border-white hover:duration-200 hover:translate-x-1 " href="#about-section">About</a>
    <a class="hover:border-b-2 border-white hover:duration-200 hover:translate-x-1 " href="{{url('signin')}}">Signin</a>
    <a class="hover:border-b-2 border-white hover:duration-200 hover:translate-x-1 " href="">Profile</a>
  </div>
</header>


<script>
  $(document).ready(function () {
    $('#user-nav-menu-btn').click(function (e) { 
      e.preventDefault();
      $(this).removeClass('sm:block');
      $(this).addClass('sm:hidden');
      $('#nav-menu').removeClass('sm:hidden');
      $('#nav-menu').addClass('sm:block');
      $('#user-nav-menu-close-btn').removeClass('sm:hidden');
      $('#user-nav-menu-close-btn').addClass('sm:block');

      
    });
    $('#user-nav-menu-close-btn').click(function (e) { 
      e.preventDefault();
      $(this).removeClass('sm:block');
      $(this).addClass('sm:hidden');
      $('#nav-menu').removeClass('sm:block');
      $('#nav-menu').addClass('sm:hidden');
      $('#user-nav-menu-btn').removeClass('sm:hidden');
      $('#user-nav-menu-btn').addClass('sm:block');

      
    });
  });
</script>