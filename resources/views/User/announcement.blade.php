@extends('layout.user.layout')

@section('announcement')
  <title>PRC ORMIN | Announcement</title>

  <div class="min-h-screen flex flex-col justify-between bg-gray-100">
    <div class="m-8 bg-white rounded-lg shadow-md">
      <h2 class="text-lg text-gray-500 my-2 px-6 py-4 border-b border-gray-200">
        PRC ORMIN | Announcement | {{ $announcement->id }}
      </h2>

      <div class="p-6">
        <h2 class="text-4xl font-semibold mb-2">{{ $announcement->title }}</h2>
        <p class="text-sm text-gray-500 mb-4">
          Posted on {{ \Carbon\Carbon::parse($announcement->created_at)->format('F d, Y h:i A') }} by PRC ORMIN CHAPTER
        </p>
        <p class="text-lg text-gray-700 leading-relaxed text-justify">
          {{ $announcement->announcement }}
        </p>
      </div>

      <div class="bg-gray-100 px-6 py-4 flex items-center justify-between">
        <button onclick="goBack()" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors">
          Back
        </button>
      </div>
    </div>

    @include('layout.user.footer')
  </div>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
@endsection
