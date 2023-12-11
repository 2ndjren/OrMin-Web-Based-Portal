@extends('layout.admin.layout')
@section('feedbacks')

<title>PRC ORMIN|User's Feedbacks</title>
<div class="py-2 px-10">
  <p class="text-3xl text-green-600">Manage User's Feedback</p>
</div>

<div class="py-10 px-10 h-auto">
  <div class="bg-white rounded-md w-full overflow-x-auto p-5 space-y-2">
    <div id="feedback-table" class="block w-full"></div>

  </div>
</div>

<div id="show-feedback-details-modal" class="fixed hidden inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 overflow-y-auto">
  <div class="modal-container bg-white sm:w-full lg:w-1/4 xl:w-1/2 p-4 rounded-lg shadow-lg mx-5">
    <div class="px-4 py-3">
      <p class="text-2xl text-center font-semibold text-green-500">Feedback's Overview</p>
    </div>
    <div id="feedback-details" class="block px-3 py-3">

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    getAll();
    Feedback_Btn();
    // reloadDataTable();
  });

  function getAll() {
    $('#feedback-table').empty();
    var feedback_records = "<table id='feedback-table-container' class='stripe hover w-full h-auto'>";

    feedback_records += "<thead>";
    feedback_records += "<tr>";
    feedback_records += "<th>Feedback</th>";
    feedback_records += "<th>Account ID</th>";
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
            const maxLength = 70; // Define your maximum length
            const trimmedMessage = row.message.length > maxLength ? row.message.substring(0, maxLength) + '...' : row.message;
            return '<p class="text-gray-700 text-sm font-semibold">' + trimmedMessage + '</p>';
          }
        },
        {
          "data": "u_id",
          "render": function(data, type, row) {
            if (data === null) {
              return "Anonymous";
            } else {
              return data;
            }
          }
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
        window.alert(xhr.responseText);
      }
    });

    $(document).on('click', '.show-feedback-details-btn ', function() {
      $('#show-feedback-details-modal').removeClass('hidden').addClass('block');
    });

    return dataTable;
  }


  function Feedback_Btn() {
    $(document).on('click', '.show-feedback-details-btn', function() {
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        url: "/feedback/details/" + id,
        dataType: "json",
        success: function(response) {

          var createdAt = new Date(response.created_at);
          var formattedDate = createdAt.toLocaleDateString('en-US', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
          });

          var formattedTime = createdAt.toLocaleTimeString('en-US', {
            hour: 'numeric',
            minute: 'numeric',
            hour12: true
          });


          var details = "<div>";

          details += "<p class='text-sm text-gray-500'>" + formattedDate + " " + formattedTime + "</p>";

          details += "<p class='border-y-2 border-gray-500 py-2'>" + response.message + "</p>";


          details += "<p class='text-gray-600'>" + response.identity + "</p>";


          details += "<div class='flex justify-end mt-3 space-x-2'>"
          details += "<div class='text-left'>";
          details += "<button type='button' class='close-feedback-modal-btn close px-2 py-1 rounded-md mx-2 bg-blue-500 text-white font-semibold'>Close</button>";
          details += "<button type='button' id='delete-btn' data-id=" + response.id + " class='px-2 py-1 rounded-md bg-red-500 text-white font-semibold'>Delete</button>";
          details += "</div>";


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

    // Event listener for the DELETE button (handle deletion functionality)
    $(document).on('click', '#delete-btn', function() {

      var feedbackID = $(this).data('id');

      // Display a confirmation dialog before proceeding with deletion
      if (confirm('Are you sure you want to delete this feedback?')) {
        var deleteBtn = $(this);
        deleteBtn.prop('disabled', true);
        deleteBtn.addClass('opacity-50 cursor-not-allowed');

        $.ajax({
          type: 'GET',
          url: '/feedback/delete/' + feedbackID,
          success: function(response) {
            deleteBtn.prop('disabled', false);
            deleteBtn.removeClass('opacity-50 cursor-not-allowed');
            console.log(response.message);
            $('#show-feedback-details-modal').addClass('hidden');
            getAll()
            // You might want to refresh the feedback details or perform any necessary actions upon deletion
            //  reloadDataTable(dataTable);
          },
          error: function(xhr, status, error) {
            deleteBtn.prop('disabled', false);
            deleteBtn.removeClass('opacity-50 cursor-not-allowed');
            window.alert(xhr.responseText);
          }
        });
      }
    });

  }
</script>
@endsection