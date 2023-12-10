@extends('layout.admin.layout')
@section('feedbacks')

<title>PRC ORMIN | User's Feedbacks</title>
<div class="py-2 px-10">
  <p class="text-2xl text-green-600">Manage User's Feedback</p>
</div>

<div class="py-10 px-10 h-auto">
  <div class="bg-white rounded-md w-full overflow-x-auto p-5 space-y-2">
    <div id="feedback-table" class="block w-full"></div>

  </div>
</div>

<div id="show-feedback-details-modal" class="fixed hidden inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 overflow-y-auto">
  <div class="modal-container bg-white sm:w-1/4 lg:w-1/4 rounded-lg shadow-lg mx-5">
    <div class="px-4 py-3">
      <p class="text-2xl text-center font-semibold text-green-500">Feedback's Overview</p>
    </div>
    <div id="feedback-details" class="block px-10 py-3"></div>
  </div>
</div>

<script>
  $(document).ready(function() {
    getAll();
    Feedback_Btn();
  });

  function getAll() {
    var feedback_records = "<table id='feedback-table-container' class='stripe hover w-full h-auto'>";

    feedback_records += "<thead>";
    feedback_records += "<tr>";
    feedback_records += "<th>Feedback</th>";
    feedback_records += "<th>User ID</th>";
    feedback_records += "<th>Action</th>";
    feedback_records += "</tr>";
    feedback_records += "</thead>";
    feedback_records += "<tbody>";
    feedback_records += "</tbody>";
    feedback_records += "</table>";
    $('#feedback-table').append(feedback_records);

    let dataTable = new DataTable('#feedback-table-container', {
      "responsive": true,
      "ajax": {
        "url": "/feedback/all",
        "type": "GET",
        "dataSrc": "feedback" // Assuming "feedback" is the key containing the data array in your response
      },
      "columns": [{
          "data": null,
          "render": function(data, type, row) {
            const maxLength = 100; // Define your maximum length
            const trimmedMessage = row.message.length > maxLength ? row.message.substring(0, maxLength) + '...' : row.message;
            return '<p class="text-gray-600 text-xs font-semibold">' + trimmedMessage + '</p>';
          }
        },
        {
          "data": "u_id"
        },
        {
          "data": null,
          "render": function(data, type, row) {
            return '<button class="show-feedback-details-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="' + row.id + '">Details</button>';
          }
        }
      ],
      "success": function(response) {
        console.log("Success: ", response);
      },
      "error": function(xhr, status, error) {
        console.log("Error: ", xhr, status, error);
        window.alert(xhr.responseText);
      }
    });
  }



  function Feedback_Btn() {
  $(document).on('click', '.show-feedback-details-btn', function() {
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "/feedback/details/" + id,
      dataType: "json",
      success: function(response) {
        var details = "<div>";

        details += "<p> <span class='text-sm'>Feedback</span> </p>";
        details += "<p class='text-xs'>" + response.details.created_at + "</p>";
        details += "<p class='border-y-2 border-gray-200 p-2'>" + response.details.message + "</p>";

        details += "<p> <span class='text-sm'>Sender</span> </p>";
        details += "<p>" + response.details.identity + "</p>";
        details += "<p>" + response.details.u_id + "</p>";

        details += "<button type='button' id='show-feedback-modal-btn' class=' px-2 py-1 rounded-md bg-blue-500 text-white font-semibold'>Close</button>";
        details += "<button type='button' id='delete-btn' data-id=" + response.details.id + " class='px-2 py-1 rounded-md bg-red-500 text-white font-semibold'>Delete</button>";

        details += "</div>";
        $('#feedback-details').empty().append(details);

        $('#show-feedback-details-modal').removeClass('hidden').addClass('block');
      },
      error: function(xhr, status, error) {
        window.alert(xhr.responseText);
      }
    });
  });

  $(document).on('click', '.close-feedback-modal-btn', function() {
    $('#show-feedback-details-modal').removeClass('block').addClass('hidden');
  });

  $(document).on('click', '.show-feedback-details-btn ', function() {
    $('#show-feedback-details-modal').removeClass('hidden').addClass('block');
  });
}

</script>
@endsection