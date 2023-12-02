@extends('layout.admin.layout')
@section('chats')
<title>Chats</title>
<div class="py-2 px-10">
  <p class="text-4xl text-green-600 UPPERCASE">Messages</p>
  <div class="h-auto">
    <div class=" h-full overflow-x-auto mt-3 p-5 rounded-md  space-y-2">
     
   

        <div class="max-w-md mx-auto my-5">
    <div id="chat-threads" class=" bg-white rounded-lg shadow-md overflow-hidden h-3/4">

      <!-- Search Input -->
      <div class="p-4 border-b">
        <input type="text" id="search" placeholder="Search..." class="w-full px-4 py-2 border rounded-full">
        <div  id="users" class="mt-1 hidden z-50">
          <div  id="search-loading-spinner" class='hidden p-4 border-b-gray-200 border-l border-r border-t border-red-500 rounded-full animate-spin h-5 w-5'> </div>
          <div id="results" class="rounded-md">

           

          </div>

        </div>
      </div>
 <!-- Inbox Threads -->
 <div class="p-4 space-y-4 overflow-y-auto" id="inboxThreads">
 <div class="flex justify-center">
 <div  id="chat-threads-loading-spinner" class='hidden p-4 border-b-gray-200 border-l border-r border-t border-red-500 rounded-full animate-spin h-5 w-5'> </div>
 </div>




    </div>
    
  </div>

    </div>
    <div id="message-box" class="max-w-md mx-auto my-10 hidden">
    <div id="conversation" class="bg-white rounded-lg shadow-md overflow-hidden">

      <!-- Header with Back Button and Name -->
      <div class="bg-blue-500 text-white p-4 flex items-center">
        <button type="button" id="session-end" class="text-white"><i class="fas fa-arrow-left"></i></button>
        <div class="flex-1 ml-4">
          <span id="active-account" class="text-xl font-semibold">Alice</span>
        </div>
      </div>

      <div class="flex flex-col h-96 p-4 space-y-4 overflow-y-auto" id="chatMessages">
      

   
      </div>

      <!-- Input Area -->
      <form id="send-chat">
        @csrf
      <div class="flex items-center p-4 border-t">
        <input type="hidden" id="convo-id" name="u_id">
        <textarea name="message" class="flex-1 px-4 py-2 border rounded-md"  placeholder="Type your message..." id="" cols="30" rows="1"></textarea>
        <button type="submit" class="ml-4 bg-blue-500 text-white px-6 py-2 rounded-full">Send</button>
      </div>
      </form>

    </div>
  </div>
     
</div>


<script>
  $(document).ready(function () {
    Search_User()
    Chat_Opener()
    End_Session()
    Send_Message()
    Thread_Messages()
    setInterval(() => {
      Conversation()
    }, 3000);
    var check=localStorage.getItem('user_id')
    if(check!==null){
      setInterval(() => {
      Conversation()
    }, 5000);
    }

    var textarea = $('#expandingTextarea');

textarea.on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});
  });
  function Search_User(){
    $('#search').on('input', function () {
      var search_user=$(this).val()
      if(search_user!=="")
      {

        $('#users').removeClass('hidden')
        $('#inboxThreads').addClass('hidden')
        HandleSearch(search_user)
      }else{
        $('#results').empty()
        $('#inboxThreads').removeClass('hidden')
        $('#users').addClass('hidden')
      }
    });
  }
  function HandleSearch(search_user)
  {
    $('#results').empty()
   
    $.ajax({
        type: "GET",
        url: "/search-users/"+search_user,
        data: "data",
        dataType: "json",
        success: function (data) {
          $('#results').empty()
          if(data.match){
            $.each(data.match, function (index, field) { 
            var results="<button type='button' data-id="+field.id+"  class='get-user chat_head_button p-3 w-full rounded-full h-16 mb-1 bg-gray-400 text-white'>"
            results+="<div class='flex space-x-2'>"
            results+="<div>"
            if(field.vol_profile!==""){
              results+="<img src="+field.user_profile+" class='h-10 w-10 rounded-full border-2 border-blue-500'>"
            }else{
              results+="<img src="+field.user_profile+" class='h-10 w-10 rounded-full border-2 border-blue-500'>"

            }
            results+="</div>"
            results+="<div class='pt-2'>"
            results+="<p>"+field.fname+" "+field.lname+"</p>"

            results+="</div>"
            results+="</div>"
            results+="</button>"
             $('#results').append(results)
          });
          }else if(data.results){
            var results="<p class='text-center'>"+data.results+"<p>"
          $('#results').append(results)
          }
         
        },
        error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
      });
  }
  function Thread_Messages(){
    $('#inboxThreads').empty()
    $.ajax({
      type: "GET",
      url: "{{url('user-messages')}}",
      data: "data",
      dataType: "json",
      success: function (chatThreads) {
    $('#chat-threads-loading-spinner').addClass('hidden')
        $.each(chatThreads.user, function (chatID, chatData) { 
          $.ajax({
            type: "GET",
            url: "/user-chat-profile/"+chatData.u_id,
            data: "data",
            dataType: "json",
            success: function (data) {
              var user =" <button type='button' data-id="+chatData.u_id+" class='chat_head_button flex items-center w-full p-3 border rounded-lg'>"
                          user +=" <div class='flex'>"
                          user +=" <img src="+data.user.user_profile+" class='w-12 h-12 mr-4 rounded-full'>"
                          user +=" <div class='flex-1 '>"
                          user +=" <div class='font-semibold text-left'>"+data.user.fname+" "+data.user.lname+"</div>"
                          if(chatData.status==="DELIVERED"){
                            user +=" <div class='text-black font-semibold'>"+chatData.message+"</div>"
                          }else{
                            user +=" <div class='text-gray-600 text-left h-5 overflow-hidden'>"+chatData.message+"</div>"
                          }
                          
                          user +=" </div>"
                          user +=" </div>"
                          user +=" </button>"
                            
                          $('#inboxThreads').append(user)
            }
          });
           
        });
      

    
      }
    });
  }
  function End_Session(){
    $('#session-end').click(function (e) { 
      e.preventDefault();

      localStorage.removeItem('user_id')
        $('#chatMessages').empty()
        $('#chat-threads').removeClass('hidden')
        $('#message-box').addClass('hidden')
    });
  }

  function Chat_Opener(){
    $(document).on('click','.chat_head_button',function(){
     var id= $(this).data('id');
     localStorage.setItem('user_id',id)
     $('#users').addClass('hidden')
     $('#search').val('')
    $('#inboxThreads').removeClass('hidden')
     $('#chatMessages').empty()
     Conversation()

    
    })
  }

  function Conversation(){
   var id= localStorage.getItem('user_id')
    $.ajax({
      type: "GET",
      url: "/user-chat-conversation/"+id,
      data: "data",
      dataType: "json",
      success: function (user) {
     $('#chatMessages').empty()

        $('#active-account').text(user.user.fname +" "+user.user.lname)
        $('#convo-id').val(user.user.id)

        $.each(user.message, function (index, message) { 
         if(message.type=="USER"){
           var left="<div class='flex items-end'>"
        left+="<img src="+user.user.user_profile+" alt='Left Avatar' class='w-8 h-8 mr-2 rounded-full'>"
        left+=" <div class='flex flex-col items-start max-w-xs'>"
        left+=" <div class='bg-blue-500 text-white p-4 rounded-lg leading-normal'>"
        left+="  <i class='far fa-user-circle mr-2'></i>"+message.message+""
        left+=" </div>"
        left+=" </div>"
        left+=" </div>"
         }else{
          var right="<div class='flex items-end justify-end'>"
        right+=" <div class='flex flex-col items-end max-w-xs'>"
        right+="  <div class='bg-green-500 text-white p-4 rounded-lg leading-normal'>"
        right+=" "+message.message+"<i class='far fa-user-circle ml-2'></i>"
        right+=" </div>"
        right+="</div>"
        right+=" </div>"

         }
         
         $('#chatMessages').append(left)
        $('#chatMessages').append(right)

        
        });
      var target="<div id='target-message'></div>"
        $('#chat-threads').addClass('hidden')
        $('#message-box').removeClass('hidden')
      }
     });
  }



  function Send_Message(){
    $('#send-chat').submit(function (e) { 
      e.preventDefault();
      var formdata= new FormData($(this)[0]);
      $.ajax({
        type: "POST",
        url: "{{url('send-chat')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (send) {
          
          if(send.failed){
            $('#send-chat')[0].reset()
            
          }
          else{
            Conversation()
            Thread_Messages()
            $('#send-chat')[0].reset()
      

          }
          
        },    error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert(xhr.responseText);
            }
      });
      
    });
  }

  
</script>

@endsection