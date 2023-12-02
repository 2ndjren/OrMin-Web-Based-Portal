@extends('layout.admin.layout')
@section('announcements')
<title>Insurance</title>
<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Announcements</p>

</div>



<div class=" px-10">
  <div class="h-screen ">
    <div class="">

      <!-- 
<div class="  px-10">
  <div class="bg-white rounded-md w-full h-auto overflow-x-auto p-5 space-y-2">
    <div class=""> -->

    </div>

    <p class="text-center text-gray-400">Latest Post/Announcement</p>
    <div class="  mb-3 shadow-lg bg-white overflow-y-auto">
      <form>
        <div id="active-accouncement" class="h-auto min-h-40 max-h-80 p-5 text-center">

        </div>
      </form>
    </div>

    <div class="sm:block md:block lg:flex">

      <div class="w-full lg:h-auto">
        <p class="font-semibold text-red-500 text-center ">Post Announcement</p>
        <form class="" id="post-announcement-form">
          @csrf
          <p class="text-gray-500 font-semibold">Title:</p>
          <textarea name="title" class="border mb-2 border-black font-semibold rounded-md p-4 w-full" placeholder="Type here..." cols="40" rows="2"></textarea>
          <p class="text-gray-500 font-semibold">Content:</p>
          <textarea name="announcement" class="border border-black rounded-md w-full p-2" id="" placeholder="Write here..." rows="10"></textarea>
          <div class="flex justify-end space-x-2">
            <button class="bg-blue-500 p-2 rounded-md text-white" id="clear_form" type="button">Clear</button>
            <button class="bg-green-500 p-2 rounded-md text-white" type="submit">Post</button>
          </div>
        </form>
      </div>

      <div class="w-full pt-5">
        <div class=" w-full">
          <p class="text-sm font-semibold text-green-500 text-center">History</p>
        </div>
        <div id="announcements-table" class="block w-full h-2/3  pt-5 p-5 overflow-y-auto"></div>

      </div>
    </div>
  </div>

  <div id="post_announcement-modal" class="fixed hidden px-5 inset-0 flex items-center justify-center z-20 bg-black bg-opacity-50">
    <div class="modal-container bg-slate-200 max-w-3/4 lg:mx-10 min-w-auto max-h-3/4 min-h-auto overflow-y-auto rounded-lg p-8 shadow-lg">


      <!-- <div id="membership-account-profile" class="flex"></div>
      <div id="membership-account-profile-btns" class="flex justify-end"></div> -->

    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    Create_Post();
    Announcements()
    Post_Btn()
    Active_Post()
    Open_Post_Modal_View()
  });

  function Create_Post() {
    $('#post-announcement-form').submit(function(e) {
      e.preventDefault();
      var formdata = new FormData($(this)[0]);
      $.ajax({
        type: "POST",
        url: "{{ url('post-announcement') }}", // Fixed the typo here
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            Announcements()
            Active_Post()
            $('#post-announcement-form')[0].reset()
            alert(response.success);
          } else {
            alert(response.failed);
          }
        },
        error: function(xhr, status, error) {
          // Handle errors, if any
          window.alert(xhr.responseText);
        }
      });
    });
  }

  function Post_Btn() {
    $('#clear_form').click(function(e) {
      e.preventDefault();
      $('#post-announcement-form')[0].reset()

    });
  }


  function Announcements() {
    $('#announcements-table').empty();
    $.ajax({
      type: "GET",
      url: "{{url('posted-announcement')}}",
      data: "data",
      dataType: "json",
      success: function(response) {
        if (response.results) {
          // Handle the case when there are results
        } else {
          $.each(response.post, function(index, post) {
            $.ajax({
              type: "GET",
              url: "/posted-by/" + post.e_id,
              data: "data",
              dataType: "json",
              success: function(user) {
                var date = new Date(post.created_at);
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                var months = [
                  "January", "February", "March", "April", "May", "June",
                  "July", "August", "September", "October", "November", "December"
                ];
                var monthName = months[month - 1];

                var table_data = "<div class='shadow-md mb-2 rounded-md text-left w-full'>";
                table_data += "<button data-id='" + post.id + "' class='history_modal_btn border border-blue-500 w-full rounded-md p-3 flex hover:text-white hover:bg-green-500 h-20'>"

                table_data += "<div class='hover:text-white'>";
                // Add the announcement title here
                var maxLength = 40; // Define the maximum length for the truncated title
                var truncatedTitle = post.title.length > maxLength ? post.title.substring(0, maxLength) + '...' : post.title;
                table_data += "<p class='text-left font-semibold hover:text-white uppercase'>  " + truncatedTitle + "</p>";


                if (user.id === post.e_id) {
                  table_data += "<p> Posted by: " + user.id + "</p>"
                } else {

                  if (user.type == 'ADMIN') {
                    table_data += "<p class='text-left text-sm text-green-500  hover:text-white font-semibold'>Head Administrator</p>"
                  } else if (user.type === 'STAFF') {
                    table_data += "<p class='text-left text-sm text-yellow-500  hover:text-white font-semibold'>Head Administrator</p>"
                  } else {
                    table_data += "<p class='text-left text-sm text-yellow-500  hover:text-white font-semibold'>Head Administrator</p>"
                  }
                }

                table_data += "<p class='text-left text-xs hover:text-white'> " + monthName + " " + day + "," + year + "</p>";

                table_data += "</div>";
                table_data += "<div>";
                table_data += "</div>";
                table_data += "</button>";
                table_data += "</div>";

                $('#announcements-table').append(table_data);
              }
            });
          });
        }
      },
      error: function(xhr, status, error) {
        // Handle errors, if any
        window.alert(xhr.responseText);
      }
    });
  }

  function Active_Post() {
    $('#active-accouncement').empty();
    $.ajax({
      type: "GET",
      url: "{{url('posted-announcement')}}",
      data: "data",
      dataType: "json",
      success: function(response) {
        console.log(response);
        var post = response.current[0];

        var date = new Date(post.created_at);
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        var months = [
          "January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        var monthName = months[month - 1];

        var activePost = "<p class=' text-lg font-semibold uppercase'>" + post.title + "</p>";
      
    

        if (response.current[0].e_id !== null) {
          $.ajax({
            type: "GET",
            url: "/posted-by/" + response.current[0].e_id,
            data: "data",
            dataType: "json",
            success: function(user) {
              console.log(user);
     
                if (user.id === post.e_id) {
                  activePost = "<p class=''>" + user.id + "</p>" + activePost;
                } else {

                  if (user.type == 'ADMIN') {
                    activePost += "<p class='text-left text-sm text-green-500  font-semibold'>Head Administrator</p>"
                  } else if (user.type === 'STAFF') {
                    activePost += "<p class='text-left text-sm text-yellow-500  font-semibold'>STAFF</p>"
                  } else {
                    activePost += "<p class='text-left text-sm text-yellow-500  font-semibold'>Head Administrator</p>"
                  }
                }
                activePost += "<p class='text-left text-gray-500 text-xs'> " + monthName + " " + day + "," + year + "</p> ";
                activePost += "<p>" + post.announcement + "</p>";

              $('#active-accouncement').append(activePost);
            },
            error: function(xhr, status, error) {
              // Handle errors, if any
              window.alert(xhr.responseText);
            }
          });
        } else {
          $('#active-accouncement').append(activePost);
        }

       

      },
      error: function(xhr, status, error) {
        // Handle errors, if any
        window.alert(xhr.responseText);
      }
    });
  }


  function Open_Post_Modal_View() {

    $(document).on('click', '.history_modal_btn', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        type: "GET",
        url: "/post-announcements-history-details/" + id,
        data: "data",
        dataType: "json",
        success: function(response) {
          console.log(response);

          var date = new Date(response.created_at);

          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          var months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
          ];
          var monthName = months[month - 1];

          // Assuming 'response' contains the data you want to display
          // Update the content inside the modal
          var modalContent = "<h2 class='text-center text-2xl font-semibold uppercase border-b-2 border-gray-500'>" + response.title + "</h2>";
          modalContent += "<p class='text-left text-blue-500 text-xs hover:text-white'> " + monthName + " " + day + "," + year + "</p>";
          modalContent += "<p class='text-md justify py-2 mt-2'>" + response.announcement + "</p>";

          // Buttons for "CANCEL", "REPOST", and "DELETE"
          modalContent += "<div class='flex justify-end  border-t-2 border-slate-400'>";
          modalContent += "<button class='btn-cancel p-2  mt-2 rounded-md text-white bg-gray-500 mr-4'>CANCEL</button>";
          modalContent += "<button class='btn-repost p-2 mt-2 rounded-md text-white bg-green-500 mr-4' data-id='" + response.id + "'>REPOST</button>";
          modalContent += "<button class='btn-delete p-2 mt-2 rounded-md text-white bg-red-500' data-id='" + response.id + "'>DELETE</button>";

          modalContent += "</div>";

          // Replace 'response.description' with the actual data properties

          // Set the modal's content with the retrieved data
          $('.modal-container').html(modalContent);

          // Show the modal
          $('#post_announcement-modal').removeClass('hidden');

          // Event listener for the CANCEL button to close the modal
          $('.btn-cancel').on('click', function() {
            $('#post_announcement-modal').addClass('hidden');
          });

          // Event listener for the REPOST button (handle reposting functionality)
          $('.btn-repost').on('click', function() {
            var announcementId = $(this).data('id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token value

            if (confirm('Mark this announcement as the latest?')) {
              $.ajax({
                type: 'POST',
                url: '/mark-as-latest/' + announcementId,
                headers: {
                  'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                success: function(response) {
                  console.log(response.message);
                  $('#post_announcement-modal').addClass('hidden');
                  // Reload or update UI elements here if needed
                  Announcements();
                  Active_Post();
                },
                error: function(xhr, status, error) {
                  window.alert(xhr.responseText);
                }
              });
            }
          });



          // Event listener for the DELETE button (handle deletion functionality)
          $('.btn-delete').on('click', function() {
            var announcementId = $(this).data('id');

            // Display a confirmation dialog before proceeding with deletion
            if (confirm('Are you sure you want to delete this announcement?')) {
              $.ajax({
                type: 'GET',
                url: '/delete-announcement/' + announcementId,
                success: function(response) {
                  // Handle success message or any UI updates upon successful deletion
                  console.log(response.message);
                  $('#post_announcement-modal').addClass('hidden');

                  // Reload announcements-table after successful deletion
                  Announcements()
                },
                error: function(xhr, status, error) {
                  // Handle errors if the deletion fails
                  window.alert(xhr.responseText);
                }
              });
            }


          });



        },
        error: function(xhr, status, error) {
          // Handle errors, if any
          window.alert(xhr.responseText);

        }
      });

    });
  }
</script>

@endsection