@extends('layout.admin.layout')
@section('announcements')
<title>Insurance</title>
<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Announcements</p>

</div>
<div class="  px-10">
  <div class="bg-white rounded-md w-full h-auto overflow-x-auto p-5 space-y-2">
    <div class="">

    </div>
 
    <div class="sm:block md:block h-screen  lg:flex">
      
      <div class="w-full lg:h-1/2">
      <p class="font-semibold text-red-500 text-center ">Post Announcement</p>
        <form class="" id="post-announcement-form">
          @csrf
          <p class="text-gray-500 font-semibold">Title:</p>
          <textarea name="title" class="border mb-2 border-black rounded-md p-2 w-full" placeholder="Type here..." cols="30" rows="1"></textarea>
          <p class="text-gray-500 font-semibold">Content:</p>
          <textarea name="announcement" class="border border-black rounded-md w-full p-2" id="" placeholder="Write here..." rows="5"></textarea>
      <div class="flex justify-end space-x-2">
      <button class="bg-blue-500 p-2 rounded-md text-white" id="clear_form" type="button">Clear</button>
          <button class="bg-green-500 p-2 rounded-md text-white" type="submit">Post</button>
      </div>
        </form>
        <p class="text-center">Active Announcement</p>
        <div class=" h-40 mb-3 border-2 border-gray-500 overflow-y-auto">
          <div id="active-accouncement" class="h-40 p-10">

          </div>
        </div>
    
      </div>
      
      <div class="w-full pt-5">
      <div class=" W-full">
      <p class="text-sm font-semibold text-green-500 text-center">History</p>
    </div>
      <div id="announcements-table" class="block w-full h-2/3  pt-5 p-5 overflow-y-auto"></div>
        
      </div>
    </div>
  </div>
  <div id="post_announcement-modal" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-20  bg-black bg-opacity-50  ">
  <div class="modal-container bg-white sm:w-full  lg:w-1/2 mx-auto rounded-lg p-4 shadow-lg">
    <div id="membership-account-profile" class="flex"></div>
    <div id="membership-account-profile-btns" class="flex justify-end"></div>

  </div>
</div>
  <script>
    $(document).ready(function () {
      Create_Post();
      Announcements()
      Post_Btn()
      Active_Post()
      Open_Post_Modal_View()
    });

    function Create_Post() {
      $('#post-announcement-form').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData($(this)[0]);
        $.ajax({
          type: "POST",
          url: "{{ url('post-announcement') }}", // Fixed the typo here
          data: formdata,
          processData: false,
          contentType: false,
          success: function (response) {
            if (response.success) {
              Announcements()
              Active_Post()
              $('#post-announcement-form')[0].reset()
              alert(response.success);
            } else {
              alert(response.failed);
            }
          },
          error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
        });
      });
    }
    function Post_Btn(){
      $('#clear_form').click(function (e) { 
        e.preventDefault();
        $('#post-announcement-form')[0].reset()
        
      });
    }
    function Announcements(){
      $('#announcements-table').empty()
      $.ajax({
        type: "GET",
        url: "{{url('posted-announcement')}}",
        data: "data",
        dataType: "json",
        success: function (response) {

          if(response.results){

          }else{
          $.each(response.post, function (index, post) { 
            $.ajax({
              type: "GET",
              url: "/posted-by/"+post.e_id,
              data: "data",
              dataType: "json",
              success: function (user) {
                var date = new Date(post.created_at);

                var day = date.getDate(); 
                var month = date.getMonth() + 1; 
                var year = date.getFullYear(); 
                var months = [
                  "January", "February", "March", "April", "May", "June",
                  "July", "August", "September", "October", "November", "December"
                ];

                // Get the month name
                var monthName = months[month - 1];
                var table_data="<div class='shadow-md mb-2 rounded-md text-left w-full'>"
                
                    table_data+="<button type="+user.id+"  class=' history_modal_btn border border-blue-500 w-full rounded-md p-3 flex hover:text-white hover:bg-green-500 h-20'>"
                    table_data+="<div class='hover:text-white'>"
                 
                    table_data+="<p class='text-left font-semibold hover:text-white'> "+monthName+" "+day+","+year+"</p>" 
                    if(user.id===post.e_id){
                      table_data+="<p> Posted by: "+user.id+"</p>"
                    }else{
                     
                      if(user.type=='ADMIN'){
                        table_data+="<p class='text-left text-xs text-green-500  hover:text-white font-semibold'>Head Administrator</p>"
                      }else if(user.type==='STAFF'){
                        table_data+="<p class='text-left text-xs text-yellow-500  hover:text-white font-semibold'>Head Administrator</p>"
                      }else{
                        table_data+="<p class='text-left text-xs text-yellow-500  hover:text-white font-semibold'>Head Administrator</p>"
                      }
                    }     
                    table_data+="</div>"
                    table_data+="<div>"
                    table_data+="</div>"
                    table_data+="</button>"
                    
                    table_data+="</div>"

                
                    $('#announcements-table').append(table_data)
              }
            });

        
          });

          }
        },
        error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
      });
    }
 function Active_Post(){
  $('#active-accouncement').empty()
  $.ajax({
      type: "GET",
      url: "{{url('posted-announcement')}}",
      data: "data",
      dataType: "json",
      success: function (response) {
        console.log(response)
        $.ajax({
              type: "GET",
              url: "/posted-by/"+response.current[0].e_id,
              data: "data",
              dataType: "json",
              success: function (user) {
                console.log(user)
                if(user!==null){
                  activePost+="<p class=''>"+user.fname+"</p>"
                var activePost="<p class=' text-lg font-semibold'>'"+response.current[0].title+"'</p>"
                activePost+="<p class=''>"+response.current[0].announcement+"</p>"
                $('#active-accouncement').append(activePost)
                }else{
                  activePost+="<p class=''></p>"
                var activePost="<p class=' text-lg font-semibold'>'"+response.current[0].title+"'</p>"
                activePost+="<p class=''>"+response.current[0].announcement+"</p>"
                $('#active-accouncement').append(activePost)
                }
              },    error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }

              });
           

        
      },
      error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
    });
 }
 function Open_Post_Modal_View(){
  $(document).on('click','.history_modal_btn',function (e) { 
    e.preventDefault();
    var id=$(this).data('id');
    $.ajax({
      type: "GET",
      url: "/post-announcements-history-details/"+id,
      data: "data",
      dataType: "json",
      success: function (response) {
        console.log(response)
        $('#post_announcement-modal').removeClass('hidden');
        
      },
      error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
    });
    
  });
 }
  </script>
</div>
@endsection
