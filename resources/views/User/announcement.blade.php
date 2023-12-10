@extends('layout.user.layout')
@section('announcement')


<title>PRC ORMIN|Announcement</title>

<section class="bg-slate-200 py-8">
  <div class="container mx-auto">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
      <div class="p-6">
        <h2 class="text-4xl font-semibold mb-2">{{ $announcement->title }}</h2>
        <p class="text-sm text-gray-500 mb-4">
          Posted on {{ \Carbon\Carbon::parse($announcement->created_at)->format('F d, Y h:i A') }} by PRC ORMIN CHAPTER
        </p>
        <p class="text-lg text-gray-700 leading-relaxed">{{ $announcement->announcement }}</p>
      </div>
      <div class="bg-gray-100 px-6 py-4 flex items-center justify-between">
        <button onclick="goBack()" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors">
          Back
        </button>
      </div>
    </div>
  </div>
</section>


<div class="">
    @include('layout.user.footer')
  </div>

<script>
  function goBack() {
    // AJAX request to navigate back to the "/" route
    $.ajax({
      type: 'GET',
      url: '/', // Replace with your route for the home page
      success: function(response) {
        // Replace the content of the current page with the fetched content
        document.querySelector('body').innerHTML = response;
      },
      error: function(error) {
        console.error('Error navigating back:', error);
      }
    });
  }
</script>




@endsection
