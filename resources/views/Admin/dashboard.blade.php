@extends('layout.admin.layout')
@section('dashboard')

<title>PRC ORMIN|Dashboard</title>


<div class="relative">
  <div class="bg-red-500 rounded-xl text-white py-8 px-4 absolute w-full z-10">

    <div class="container mx-auto text-center">
      <h1 class="text-xl md:2xl xl:4xl lg:text-3xl font-bold">WELCOME TO YOUR DASHBOARD</h1>
      <p class="mt-4 text-xl pb-20 ">Explore the data and manage your tasks</p>
    </div>
  </div>
</div>


<!-- Dashboard layout -->
<div class="container mx-auto xl:mt-36 lg:mt-36 mt-48 px-4">

  <div class="grid grid-cols-1 xl:grid-cols-2 lg:grid-cols-2 gap-6 relative z-10">

    <!-- Cards or panels -->
    <div class="relative bg-white rounded-lg shadow-lg p-6">
      <!-- Your card content -->
      <h2 class="text-xl font-semibold text-gray-800 mb-2">DONATION</h2>
      <!-- Add more content here -->
      <div class="sm:flex lg:flex">
        <div class="w-full text-center">
          <p><i class="fa-solid fa-money-bill-1-wave text-blue-500 text-3xl"> <span id="annual-donation-sum">0</span></i></p>
          <p class=" font-semibold text-blue-500">Annual</p>
        </div>
        <div class="w-full text-center">
          <p><i class="fa-solid fa-money-bill-1-wave text-blue-500 text-3xl"> <span id="monthly-donation-sum">0</span></i></p>
          <p class=" font-semibold text-blue-500">Monthly</p>
        </div>
      </div>
    </div>

    <div class="relative bg-white rounded-lg shadow-lg p-6">
      <!-- Your card content -->
      <h2 class="text-xl font-semibold mb-2 text-gray-800">ACCOUNTS</h2>
      <!-- Add more content here -->
      <div class="flex">
        <div class="w-full text-center">
          <p><i class="fa-solid fa-users text-green-500 text-4xl"> <span id="user-counts">1</span></i></p>
          <p class=" font-semibold text-blue-500">User</p>
        </div>
        <div class="w-full text-center">
          <p><i class="fa-solid fa-user text-yellow-500 text-4xl"> <span id="staff-counts">1</span></i></p>
          <p class=" font-semibold text-blue-500">Staff</p>
        </div>
        <div class="w-full text-center">
          <p><i class="fa-solid fa-user-shield text-red-500 text-4xl"> <span id="administrator-counts">1</span></i></p>
          <p class=" font-semibold text-blue-500">Adminsitrator</p>
        </div>
      </div>
    </div>
  </div>


  <div class="grid grid-cols-1 xl:grid-cols-2 lg:grid-cols-2  gap-6 relative z-10">
    @if(session('ADMIN'))
    <!-- Cards or panels -->
    <div class="relative bg-white rounded-lg shadow-lg p-6">
      <!-- Your card content -->
      <h2 class="text-xl font-semibold text-center text-gray-800 mb-2">PRC MEMBERSHIP PROGRAM</h2>
      <p class="text-green-500 font-semibold text-center">OVERALL STATISTICS</p>

      <!-- Add more content here -->
      <div class="flex">
        <div class="w-full">

          <p class=" text text-green-600 text-3xl text-center" id="annual-membership-sales"></p>
          <p class="text-blue-500 text-center font-semibold">Annual Sales</p>
        </div>
        <div class="w-full">
          <p class=" text text-green-600 text-3xl text-center" id="monthly-membership-sales"></p>
          <p class="text-blue-500 text-center font-semibold">Monthly Sales</p>
        </div>
      </div>
      <canvas id="sales_per_program"></canvas>

      <div class="container mx-auto py-4 lg:w-96 sm:w-full  bg-white lg:mt-0 sm:mt-5">
        <div class=" p-4">
          <p class="text-blue-500 font-semibold text-center">TOTAL ACCOUNTS </p>
          <canvas id="Memberships_Overall_Counts"></canvas>
        </div>
      </div>
    </div>

    @endif
    <!-- @if(session('STAFF')) -->
    <div class="relative bg-white rounded-lg shadow-lg p-6">
      <!-- Your card content -->
      <h2 class="text-xl font-semibold  text-center mb-2">MEMBERSHIP PROGRAM<< /h2>
          <!-- Add more content here -->
          <div class="flex">
            <div class="text-center w-full">
              <p class="text-green-500 font-semibold">Accounts</p>
              <p class="text-4xl text-green-500 font-semibold" id="activated-accounts"></p>
            </div>
            <div class="text-center w-full">
              <p class="text-green-500 font-semibold">Pending</p>
              <p class="text-4xl text-green-500 font-semibold" id="pending-accounts"></p>
            </div>
            <div class="text-center w-full">
              <p class="text-green-500 font-semibold">Expired</p>
              <p class="text-4xl text-green-500 font-semibold" id="expired-accounts"></p>
            </div>
            <div class="text-center w-full">
              <p class="text-green-500 font-semibold">Declined</p>
              <p class="text-4xl text-green-500 font-semibold" id="declined-accounts"></p>
            </div>
          </div>

    </div>
    <!-- @endif -->
  </div>





  <div class=" sm:px-3 lg:px-10">
    <div class="h-screen ">
      <div class=" sm:block lg:flex w-full sm:my-2 lg:space-x-2">
        <div class="container mx-auto py-4 bg-white sm:mt-5">

          <div class=" p-4">
            <p class="text-blue-500 font-semibold text-center">TOTAL SUBSCRIBERS PER PROGRAM</p>
            <canvas id="Membership_Program_Counts"></canvas>
          </div>
        </div>
        <div class="container mx-auto py-4 bg-white sm:mt-5">
          <div class="p-4">
            <p class="text-blue-500 font-semibold text-center">TOTAL PROGRAM SUBSCRIBERS PER MUNICIPALITIES</p>
            <canvas id="Members_Per_Municipality"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>




</div>


<div class=" mt-2">
  <div class=" sm:block lg:flex w-full space-x-2">
    <div class="container mx-auto py-4 w-full">
      <div class=" rounded-lg p-4 gap">

        <div class="sm:block lg:flex w-full lg:space-x-2 sm:mt-5">
          <div class="container mx-auto py-4 bg-white p-4">
            <p class="text-blue-500 font-semibold text-2xl text-center pb-2 ">VOLUNTEERING VISUALIZATION</p>
            <p class="text-green-500 font-semibold text-center">OVERALL STATISTICS</p>

            <div class="flex">


            </div>
            <canvas id="volunteers_per_municipality"></canvas>

          </div>
          <div class="container mx-auto py-4 w-96  bg-white lg:mt-0 sm:mt-5">
            <div class=" p-4">
              <p class="text-blue-500 font-semibold text-center">OVERALL ACTIVE ROLES IN MINDORO </p>
              <canvas id="volunteer_roles_count"></canvas>
            </div>
          </div>

        </div>


      </div>
    </div>

  </div>
</div>






</div>
</div>

<script>
  $(document).ready(function() {
    Donations()
    User_Account_Dashboard()
    Membeship_Dashboard()
    Volunteer_Dashboard()

  });

  function formatMoney(number) {
    if (number >= 1000000000) {
      return (number / 1000000000).toFixed(2) + 'B';
    } else if (number >= 1000000) {
      return (number / 1000000).toFixed(2) + 'M';
    } else if (number >= 1000) {
      return (number / 1000).toFixed(2) + 'K';
    } else {
      return number.toString();
    }
  }

  function Donations() {
    $.ajax({
      type: "GET",
      url: "/donation-info",
      data: "data",
      dataType: "json",
      success: function(response) {
        console.log(response)
        var annual = formatMoney(response.annual)
        var monthly = formatMoney(response.monthly)
        $('#annual-donation-sum').text(annual)
        $('#monthly-donation-sum').text(monthly)
      }
    });
  }

  function User_Account_Dashboard() {
    $.ajax({
      type: "GET",
      url: "{{url('user-accounts')}}",
      data: "data",
      dataType: "json",
      success: function(response) {
        console.log(response)
        var user = formatMoney(response.user)
        $('#user-counts').text(user)
        $('#staff-counts').text(response.staff)
        $('#administrator-counts').text(response.admin)

      }
    });
  }

  function Membeship_Dashboard() {
    $.ajax({
      type: "GET",
      url: "{{url('membership-dashboard-main')}}",
      data: "data",
      dataType: "json",
      success: function(res) {
        console.log(res)
        $monthly_sales = formatMoney(res.monthly_sales)
        $annual_sales = formatMoney(res.annual_sales)
        $('#monthly-membership-sales').text("₱ " + $monthly_sales)
        $('#annual-membership-sales').text("₱ " + $annual_sales)
        $('#activated-accounts').text(res.activated)
        $('#pending-accounts').text(res.pending)
        $('#expired-accounts').text(res.expired)
        $('#declined-accounts').text(res.declined)


        const data = {
          labels: [
            'Activated',
            'Pending',
            'Expired',
            'Declined',
          ],
          datasets: [{
            label: 'MEMBERSHIPS',
            data: [res.activated, res.pending, res.expired, res.declined],
            backgroundColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 205, 86, 1)',
              'rgba(75, 192, 192, 1)',
            ],
            hoverOffset: 4
          }]
        };
        const config = {
          type: 'doughnut',
          data: data,
        };
        const ctx = document.getElementById('Memberships_Overall_Counts').getContext('2d');
        new Chart(ctx, config);




        const info = {
          labels: ['Classic', 'Bronze', 'Silver', 'Gold', 'Platinum', 'Senior', 'Senior Plus'],
          datasets: [{
            label: 'SALES PER PROGRAM',
            data: [res.classic, res.bronze, res.silver, res.gold, res.platinum, res.senior, res.senior_plus],


            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
            ],
            tension: 0.1
          }]
        };

        const conf = {
          type: 'line',
          data: info,
        };
        // Create the chart on the canvas element
        const line = document.getElementById('sales_per_program').getContext('2d');
        new Chart(line, conf);
      }
    });




    $.ajax({
      type: "GET",
      url: "{{url('membership-counts')}}",
      data: "data",
      dataType: "json",
      success: function(res) {
        console.log(res);
        const data = {
          labels: ['Classic', 'Bronze', 'Silver', 'Gold', 'Platinum', 'Senior', 'Senior Plus'],
          datasets: [{
            label: 'PROGRAM',
            data: [res.classic, res.bronze, res.silver, res.gold, res.platinum, res.senior, res.senior_plus],
            backgroundColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 205, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(201, 203, 207, 1)'
            ],
            borderWidth: 1,
          }],
        };

        const config = {
          type: 'bar',
          data: data,
          options: {
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        };

        // Create the chart
        const ctx = document.getElementById('Membership_Program_Counts').getContext('2d');
        new Chart(ctx, config);
      }
    });
    // Sample data


    $.ajax({
      type: "GET",
      url: "{{url('membership-per-municipalities-counts')}}",
      data: "data",
      dataType: "json",
      success: function(res) {
        console.log(res)
        const info = {
          labels: [
            'Puerto Galera',
            'San Teodoro',
            'Baco',
            'Calapan City',
            'Naujan',
            'Victoria',
            'Socorro',
            'Gloria',
            'Bansud',
            'Bongabong',
            'Roxas',
            'Mansalay',
            'Bulalacao',

          ],
          datasets: [{
            label: 'ACTIVE MEMBER',
            data: [res.puerto_galera, res.san_teodoro, res.baco, res.calapan_city, res.naujan, res.victoria, res.socorro, res.gloria, res.bansud, res.bongabong, res.roxas, res.mansalay, res.bulalacao],

            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(54, 162, 235)',
              'rgb(201, 203, 207)',
              'rgb(201, 203, 207)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)'
            ],
            tension: 0.1
          }]
        };

        const conf = {
          type: 'line',
          data: info,
        };
        // Create the chart on the canvas element
        const line = document.getElementById('Members_Per_Municipality').getContext('2d');
        new Chart(line, conf);

      }
    });
  }


  function Volunteer_Dashboard() {

    $.ajax({
      type: "GET",
      url: "{{url('volunteers-per-municipalities')}}",
      data: "data",
      dataType: "json",
      success: function(res) {
        console.log(res);
        const data = {
          labels: [
            'Puerto Galera',
            'San Teodoro',
            'Baco',
            'Calapan City',
            'Naujan',
            'Victoria',
            'Socorro',
            'Gloria',
            'Bansud',
            'Bongabong',
            'Roxas',
            'Mansalay',
            'Bulalacao',

          ],
          datasets: [{
            label: 'ACTIVE VOLUNTEERS PER MUNICIPALITY/CITY',
            data: [res.puerto_galera, res.san_teodoro, res.baco, res.calapan_city, res.naujan, res.victoria, res.socorro, res.gloria, res.bansud, res.bongabong, res.roxas, res.mansalay, res.bulalacao],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(54, 162, 235)',
              'rgb(201, 203, 207)',
              'rgb(201, 203, 207)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1,
          }],
        };

        const config = {
          type: 'bar',
          data: data,
          options: {
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        };

        // Create the chart
        const ctx = document.getElementById('volunteers_per_municipality').getContext('2d');
        new Chart(ctx, config);
      }
    });

    $.ajax({
      type: "GET",
      url: "{{url('volunteers-per-roles')}}",
      data: "data",
      dataType: "json",
      success: function(res) {
        console.log(res)
        const data = {
          labels: [
            'First Aider',
            'Blood',
            'Welfare',
            'Health',
            'Wash',
            'DMS',
            'RCY'
          ],
          datasets: [{
            label: 'My First Dataset',
            data: [res.first_aider, res.blood, res.welfare, res.health, res.wash, res.dms, res.rcy],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(201, 203, 207)',
              'rgb(205, 203, 207)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)'
            ]
          }]
        };
        const config = {
          type: 'polarArea',
          data: data,
          options: {}
        };
        const ctx = document.getElementById('volunteer_roles_count').getContext('2d');
        new Chart(ctx, config);

      }
    });






  }
</script>








@endsection