@extends('layout.admin.layout')
@section('feedbacks')

<title>PRC ORMIN | User's Feedbacks</title>
<div class="py-2 px-10">
  <p class="text-2xl text-green-600">Manage User's Feedback</p>
</div>

<div class="py-10 px-10 h-auto">
  <div>

    <div class="bg-white rounded-md w-full overflow-x-auto p-5 space-y-2">

      <div id="feedback-table" class="block w-full">

      </div>

 


      <div class="h-10"></div>
    </div>
  </div>




  <div id="show-feedback-details-modal" class="fixed  hidden inset-0 flex items-center justify-center z-10  bg-black bg-opacity-50  overflow-y-auto ">
    <div class="modal-container bg-white sm:w-1/4  lg:w-1/4  rounded-lg shadow-lg mx-5 ">
      <div class="px-4 py-3">
        <p class="text-2xl text-center font-semibold text-green-500">Feedback's Overview</p>
      </div>
      <div id="feedback-details" class="block  px-10 py-3"></div>

    </div>
  </div>



  <script>
    $(document).ready(function() {


      getAll()

    });

    function getAll() {
      var feedback_records = "<table id ='feedback-table-container' class='stripe hover w-full h-auto '>"
      feedback_records += "<thead>"
      feedback_records += "<tr>"
      feedback_records += "<th>Feedback</th>"
      feedback_records += "<th>Sender</th>"
      feedback_records += " <th>Action</th>"
      feedback_records += " </tr>"
      feedback_records += " </thead>"
      feedback_records += " <tbody> "
      feedback_records += " </tbody>"
      feedback_records += " </table>"
      $('#feedback-table').append(feedback_records)
      let others = new DataTable('#feedback-table-conatiner', {
        "responsive": true,
        "ajax": {
          "url": "/feedback/all",
          "type": "GET",
        },
        "columns": [{
            "data": null,
            "render": function(data, type, row) {
              return '<p class="text-gray-500 text-xs font-semibold">' + row.message + '</p>'
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
      });

    }
  </script>
  @endsection