@extends('layout.admin.layout')
@include('layout.admin.modals.donation')
@include('layout.admin.modals.blood_modal')

@section('donations')
<title>Donations</title>
<div class="py-10 px-10 h-screen ">
<div class="">
    <p class="text-center text-4xl text-green-600 UPPERCASE"><span class="bg-gray-100 px-10 py-2 rounded-md">Membership's Overview</span></p>
  </div>

  <div class="block h-40 bg-white m-3  w-full rounded-md">
    
<div class="flex w-full">
<div class="h-full w-1/2 ">
      <div class="p-4 w-full text-center"><p class="font-bold">Fundraising Donation</p></div>
      <div class="flex w-full">
      <div class=" h-full w-1/2 text-center">
        <p class="text-gray-600 font-semibold text-3xl"><i class="fa-solid fa-hand-holding-dollar"></i> <span id="overall-donation-sum"></span></p>
        <p class="text-gray-600 text-sm">Overall Amount Donated</p>
      </div>
      <div class=" h-full w-1/2 text-center">
        <p class="text-gray-600 font-semibold text-3xl"><i class="fa-solid fa-user"></i> <span id="overall-donatorw-count"></span></p>
        <p class="text-gray-600 text-sm">Donors Count</p>

      </div>
      </div>
   
    </div>
    <div class="h-full w-1/2 ">
      <div class="p-4 w-full text-center"><p class="font-bold">Blood Donation</p></div>
      <div class="flex w-full">
      <div class=" h-full w-full text-center">
        <p class="text-gray-600 font-semibold text-3xl"><i class="fa-solid fa-hand-holding-heart"></i> <span id="overall-blood-donors-count"></span></p>
        <p class="text-gray-600 text-sm">Overall Donated Blood</p>
      </div>
      </div>
   
    </div>
</div>

  </div>
  <div class="sm:block md:block lg:flex xl:flex 2xl:flex">
    <button id="fundingbtn" class="bg-white shadow-sm px-10 py-2 text-green-600 m-2 hover:bg-green-600 hover:text-white" type="button">Funding</button>
    <button id="bloodbtn" class="bg-white shadow-sm px-10 py-2 text-green-600 m-2 hover:bg-green-600 hover:text-white" type="button">Blood</button>
  </div>
  <div id="funding" class="sm:block md:block lg:block xl:block 2xl:block  h-screen">
    <div class="sm:block md:flex lg:flex xl:flex 2xl:flex">
        <div class="p-3 h-54 sm:w-full md:w-1/2  m-3  lg:w-full  xl:w-full 2xl:w-1/2 shadow-lg bg-white rounded-sm"> 
          <p class="font-semibold text-gray-600 text-center">Top 5 Donators</p>
          <div class="w-full p-5">
            <table id="hightest_donation" class="w-full">

            <tbody>

            </tbody>
            </table>
      
          </div>

        </div>
    </div>
    

      <div class="h-auto sm:block md:block lg:flex xl:block 2xl:flex">
        <div class="w-full">
        <div class="sm:block md:block lg:flex xl:flex 2xl:flex">
    <button id="listofdonorsbtn" class="bg-white shadow-sm px-10 py-2 text-green-600 m-2 hover:bg-green-600 hover:text-white" type="button">List of Donors</button>
    <button id="listofpendingdonorsbtn" class="bg-white shadow-sm px-10 py-2 text-green-600 m-2 hover:bg-green-600 hover:text-white" type="button">Donation Request</button>
  </div>
   
        <div id="donation" class=" h-auto p-5 sm:w-full md:w-full  m-3  lg:w-1/4  xl:w-full 2xl:w-full shadow-lg bg-white rounded-sm">
        <div class="w-full mb-5">
                <p class="text-gray-600 text-2xl"><i class="fa-solid fa-list"></i> Donations List</p>
              </div>
          <div class="w-full flex">
          <div class="w-full flex justify-end">
          <button id="open-create-donation-form-btn" class="py-1 bg-green-500 text-white rounded-md px-3">Add Donation</button>
          </div>

          </div>
          <div class="w-full h-auto p-5">

          
            @include('layout.admin.datatables.donation.validated_donors')
          </div>

        </div>
        <div id="listofdonors" class="hidden h-auto p-5 sm:w-full md:w-full  m-3  lg:w-1/4  xl:w-full 2xl:w-full shadow-lg bg-white rounded-sm">
        <div class="w-full mb-5">
                <p class="text-gray-600 text-2xl"><i class="fa-solid fa-list"></i>Pending Donations</p>
              </div>
              <div class="w-full h-auto p-5">
          
                @include('layout.admin.datatables.donation.pending')
              
              </div>

        </div>
    </div>
<div class="h-screen"></div>
  </div>
  <div id="blood" class="sm:hidden md:hidden lg:hidden xl:hidden 2xl:hidden h-screen w-full">

    <div class="p-3 h-auto w-full sm:w-full md:w-full  m-3  lg:w-1/4  xl:w-full 2xl:w-1/4 shadow-lg bg-white rounded-sm">           
    <div class="w-full mb-5">
      
                <p class="text-gray-600 text-2xl"><i class="fa-solid fa-list"></i>Blood Donors List</p>
                <div class="w-full flex justify-end">
        
        <button id="open-create-blood-donation-form-btn" class="py-1 bg-green-500 text-white rounded-md px-3">Add Blood Donor</button>
</div>

      
    </div>
  @include('layout.admin.datatables.donation.blood')


  </div>
  
</div>


<script>
  $(document).ready(function () {
    ActiveDonationsButton()
    DonationOnhoverButton()
    Overall_Donation_Sum()
    Datatables()
    Blood_Buttons()
});
function abbreviateAmount(amount) {
            if (amount >= 1000000000) {
                return (amount / 1000000000).toFixed(1) + 'b';
            } else if (amount >= 1000000) {
                return (amount / 1000000).toFixed(1) + 'm';
            } else if (amount >= 1000) {
                return (amount / 1000).toFixed(1) + 'k';
            } else if (amount >= 100) {
                return (amount / 100).toFixed(1) + 'h';
            } else {
                return amount.toString();
            }
        }
function Overall_Donation_Sum(){
  $.ajax({
    type: "GET",
    url: "{{url('overall-donation-sum')}}",
    data: "data",
    dataType: "json",
    success: function (data) {
            var overallroundedAmount = abbreviateAmount(data.overall_donation_sum);
            var rounddonatorscount = abbreviateAmount(data.overall_donators_count);
          
      $('#overall-donation-sum').text(overallroundedAmount)
      $('#overall-donatorw-count').text(rounddonatorscount)
      $("#hightest_donation tbody").empty();
  
      var counter=1
  $.each(data.highest_donation, function (index, data) { 
    var roundhighestdonation = abbreviateAmount(data.donated_amount);

    var row = "<tr class='text-center '>";
    row += "<td class=' text-gray-600 py-1'>"+counter++ +"</td>";
    row += "<td class=' text-gray-600 py-1'>"+data.fname +" "+data.lname+"</td>";
    row += "<td class=' text-gray-600 py-1'>"+roundhighestdonation +"</td>";
    row += "</tr>";
    
    $("#hightest_donation tbody").append(row);
  });

    }
  });
}
function ActiveDonationsButton(){
  $('#donations-btn').addClass('bg-gray-400 text-lg indent-6');    
  }
  function DonationOnhoverButton(){
    $('#fundingbtn').addClass('bg-green-600 text-white');
    $('#fundingbtn').removeClass('bg-white text-green-600');
    $('#fundingbtn').click(function (e) { 
      e.preventDefault();
      $('#fundingbtn').addClass('bg-green-600 text-white');
      $('#fundingbtn').removeClass('bg-white text-green-600');

      $('#bloodbtn').removeClass('bg-green-600 text-white');
      $('#bloodbtn').addClass('bg-white text-green-600');
      $('#funding').show();
      $('#blood').hide();
    });

    $('#bloodbtn').click(function (e) { 
      e.preventDefault();
      $('#bloodbtn').addClass('bg-green-600 text-white');
      $('#bloodbtn').removeClass('bg-white text-green-600');

      $('#fundingbtn').removeClass('bg-green-600 text-white');
      $('#fundingbtn').addClass('bg-white text-green-600');
      $('#funding').hide();
      $('#blood').show();
    });
  }
  function Datatables(){
    $('#listofpendingdonorsbtn').click(function (e) { 
      e.preventDefault();
      $('#listofdonors').removeClass('hidden');
      $('#listofdonors').addClass('block');
      $('#donation').removeClass('block');
      $('#donation').addClass('hidden');
    });
    $('#listofdonorsbtn').click(function (e) { 
      e.preventDefault();
      $('#listofdonors').removeClass('block');
      $('#listofdonors').addClass('hidden');
      $('#donation').removeClass('hidden');
      $('#donation').addClass('block');
    });
  }





  function Blood_Buttons(){
    $('#open-create-blood-donation-form-btn').click(function (e) { 
      e.preventDefault();
      $('#Blood-Donation-Form-Modal').removeClass('hidden')
      $('#Blood-Donation-Form-Modal').addClass('block')
    });
    $('#close-create-blood-donation-btn').click(function (e) { 
      e.preventDefault();
      $('#Blood-Donation-Form-Modal').removeClass('block')
      $('#Blood-Donation-Form-Modal').addClass('hidden')
    });
  }

 


  



  // MODAL 
  
</script>
@endsection