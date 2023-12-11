@if(session('USER'))
<button id="chat-btn" class="fixed right-0 bottom-0 m-20 py-3 px-4 hover:bg-yellow-500 rounded-full z-10 bg-yellow-300"><i class="fa-solid fa-paper-plane"></i></button>
@endif


<div id="chat-messages" class="fixed hidden right-0 bottom-0 m-20 h-96 w-80 border-2 z-20 shadow-md bg-gray-200 border-gray-600">
  <div class=" text-md shadow-sm bg-red-500 p-2 w-full flex">
   <div class="w-full"> <p class="text-center">Red Cross Calapan</p></div>
    <div class="w-full px-2 flex justify-end"><button id="chat-minimize"><i class="fa-solid fa-window-minimize"></i></button></div>
  </div>
  <p id="chat-error-message" class="fixed hidden w-80 h-5 text-sm text-white bg-blue-500 text-center"></p>
  <div id="conversations" class="w-full h-72 bg-white p-2 overflow-y-auto">

  <div id="last-message"></div>
  </div>
  <div class="w-full h-20 relative  mt-2 bottom-0">
    <form id="send-chat-form">
      @csrf
   
    <div class="flex w-full px-3 ">
      <input type="hidden" name="e_id">
      <textarea  name="message" id="message-box" class=" break-words px-3  py-1 h-9 w-full" cols="1" rows="10"></textarea>

        <button id="send-chat-btn" class="p-2 bg-green-500 hover:bg-green-700 hidden" type="submit">Send</button>
      </div>
    </form>
  </div>


</div>
<script>
  $(document).ready(function () {
    ChatBtns()
    Chat_Form()
  Chat_Conversation()
  $(document).on('input',function(){
    var message_box=$('#message-box').val()
    if(message_box===null){
      $('#send-chat-btn').addClass('hidden')
    }else if(message_box!==""){
      $('#send-chat-btn').removeClass('hidden')
    }else{
      $('#send-chat-btn').addClass('hidden')
    }
  })

  });
  function ChatBtns(){
    $('#chat-btn').click(function (e) { 
      e.preventDefault();
      $('#chat-messages').removeClass('hidden');
      $('#chat-messages').addClass('block');
      $(this).removeClass('block');
      $(this).addClass('hidden');
     setInterval(() => {
      Chat_Conversation()
     }, 5000);
      scrollToBottom()
      
    });
    $('#chat-minimize').click(function (e) { 
      e.preventDefault();
      $('#chat-messages').removeClass('block');
      $('#chat-messages').addClass('hidden');
      $('#chat-btn').removeClass('hidden');
      $('#chat-btn').addClass('block');
      scrollToBottom()
      
    });


  }
  function Chat_Form(){
    $('#send-chat-form').submit(function (e) { 
      e.preventDefault();
    var formdata= new FormData($(this)[0]);

      $.ajax({
        type: "POST",
        url: "{{url('send-chat')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
          if(data.success){
            $('#chat-error-message').removeClass('hidden')
          $('#chat-error-message').addClass('block')
          $('#chat-error-message').text(data.success)
          setTimeout(() => {
            $('#chat-error-message').removeClass('block')
          $('#chat-error-message').addClass('hidden')
          }, 2000);
          $('#message-box').val("")
var targetarea=  $('#last-message')
          Chat_Conversation()
          scrollToBottom()

          }
          else{
            $('#chat-error-message').removeClass('hidden')
          $('#chat-error-message').addClass('block')
          $('#chat-error-message').text(data.failed)
          setTimeout(() => {
            $('#chat-error-message').removeClass('block')
          $('#chat-error-message').addClass('hidden')
          }, 2000);
        $('#last-message').scrollTop()
        scrollToBottom()

          }

        },  error: function (xhr, status, error) {
                // Handle errors, if any
                window.alert("Something went wrong!");
            }
        
      });
    });
  } 
  function scrollToBottom() {
        var chatMessages = $('#conversations');
        chatMessages.scrollTop(chatMessages[0].scrollHeight);
    }

    
   function Chat_Conversation(){
    $.ajax({
      type: "GET",
      url: "{{url('user-messages')}}",
      data: "data",
      dataType: "json",
      success: function (data) {
        $('#conversations').empty()
       if(data.user){
        $.each(data.user, function (index, data) { 
          
          var row=" <div class='flex flex-col p-4 overflow-y-auto' id='chatMessages'>"
           if(data.type==="ADMIN" ||data.type==="STAFF"){
          

            row+=" <div class='flex items-end'>"
            row+="<div class='flex flex-col items-start max-w-xs'>"
            row+=" <div class='bg-blue-500 text-white p-2 rounded-lg leading-normal'>"
            row+=" <i class='far fa-user-circle mr-2'></i>"+data.message+""
            row+=" </div>"
            row+=" </div>"
            row+="   </div>"
          }
          else{
            row+=" <div class='flex items-end justify-end'>"
            row+="<div class='flex flex-col items-end max-w-xs'>"
            row+="<div class='bg-green-500 text-white p-2 rounded-lg leading-normal'>"
            row+=" "+data.message+" <i class='far fa-user-circle ml-2'></i>"
            row+="</div>"
            row+=" </div>"
            row+="</div>"

           }
           $('#conversations').append(row);
          
        });
       }else{
        var message="<p class='text-center'>"+data.results+"</p>"
        $('#conversations').append(message);
       }

        // scrollToBottom()

      }
    
    });
  }



</script>
