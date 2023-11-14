@extends('layout.admin.layout')
@section('feedbacks')
<div class="py-10 px-10">
  <p class="text-3xl font-medium mb-5">Feedbacks</p>
  <div class="sm:block md:block lg:flex xl:flex 2xl:flex">
      <div class="p-3 h-48 sm:w-full md:w-full  m-3  lg:w-1/4  xl:w-1/4 2xl:w-1/4 shadow-lg bg-white rounded-sm">Donations</div>
      <div class="p-3 h-48 sm:w-full md:w-full  m-3  lg:w-1/4  xl:w-1/4 2xl:w-1/4 shadow-lg bg-white rounded-sm">Donations</div>
      <div class="p-3 h-48 sm:w-full md:w-full  m-3  lg:w-1/4  xl:w-1/4 2xl:w-1/4 shadow-lg bg-white rounded-sm">Donations</div>
      <div class="p-3 h-48 sm:w-full md:w-full  m-3  lg:w-1/4  xl:w-1/4 2xl:w-1/4 shadow-lg bg-white rounded-sm">Donations</div>
  </div>
  <div class="sm:block md:block lg:flex xl:flex 2xl:flex">
    <div class="p-3 h-96 sm:w-full md:w-full  m-3  lg:w-1/2  xl:w-1/2 2xl:w-1/2 shadow-lg bg-white rounded-sm">Donations</div>
    <div class="p-3 h-96 sm:w-full md:w-full  m-3  lg:w-1/2  xl:w-1/2 2xl:w-1/2 shadow-lg bg-white rounded-sm">Donations</div>
    <div class="p-3 h-96 sm:w-full md:w-full  m-3  lg:w-1/2  xl:w-1/2 2xl:w-1/2 shadow-lg bg-white rounded-sm">Donations</div>
  </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    ActiveFeedbacksButton()
});
function ActiveFeedbacksButton(){
  $('#feedbacks-btn').addClass('bg-gray-400 text-lg indent-12');    
  }
</script>
@endsection