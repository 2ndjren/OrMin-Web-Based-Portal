@extends('layout.admin.layout')
@section('blood')
<title>PRC ORMIN|Blood</title>
<style>
  @media print {
   html body * {
      visibility: hidden;
      
    }
    #tableContainer,
    #tableContainer * {

      visibility: visible;
    
    }
    #tableContainer {
      font-family: 'Times New Roman', Times, serif;
      position: absolute;
      left: 0;
      top: 0;
      width: 100%
    }
    #tableContainer table{
      border-collapse: collapse;
    width: 100%;
    border: 1px solid black;
    }
    #tableContainer thead{
    border: 1px solid black;
    color:rgb(34, 155, 255);
    background-color: orange;
    padding: 2px;
    width: 100%
    }
    #tableContainer thead tr th{ 
    border-right: 1px solid black;

    }
    #tableContainer tbody tr td{ 
    border-right: 1px solid black;
    }
    #tableContainer tbody{
    border: 1px solid black;

    }
    #tableContainer table thead tr{
      padding: 2px;
    }
    #tableContainer table tbody tr{
      padding: 2px;
      text-align: center
    }
    #tableContainer tbody{
    text-align: center;

    }
    #tableContainer h1{
    text-align: center;
    font-size: 25px;


    }
    #tableContainer p{
    text-align: center;
    font-size: 13px

    }
  }
</style>


<div class="py-2 px-10">
    <p class="text-4xl text-green-600 UPPERCASE">Blood Stocks</p>
    <div class="flex justify-end">
      <button type="button" id="add-type-record" class="p-3 rounded-md bg-green-600 font-semibold text-white">Create New Blood</button>
    </div>
  </div>

  <div class="py-2 px-10">
    <div id="blood-data-table"></div>
   <div class="flex justify-end">
    <button type="button" id="topirnt" class="p-3 mt-2 rounded-md bg-green-600 font-semibold text-white">Print</button>
   </div>
  </div>
  


  <div id="create-type-record" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50  overflow-y-auto ">
    <div class="modal-container bg-white sm:w-full  lg:w-1/4 mx-auto rounded-lg p-4 shadow-lg ">
        <form id="blood-form">
            @csrf
            <div class="">  
                <p>Blood Type</p>
            <input name="type" type="text">
            </div>
            <div class="">
                <p>Quantity</p>
                <input  name="quantity" type="number"></div>
                <br>
            <button type="submit" class="p-2 bg-blue-500 text-white">Add</button>
            <button type="button"  id="close-blood-form" class="p-2 bg-blue-500 text-white">Back</button>
        </form>
  
    </div>
  </div>



  <div id="update-record" class="fixed hidden  px-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50  overflow-y-auto ">
    <div class="modal-container bg-white sm:w-full  lg:w-1/4 mx-auto rounded-lg p-4 shadow-lg ">
        <form id="blood-update-form">
            @csrf
            <div class="">
                <p id="update-text"></p>
                <input id="status" name="status" type="hidden">
                <input  name="id" id="update-id" type="hidden">
                <input  name="quantity" type="number">
            </div>
                <br>
            <button type="submit" class="p-2 bg-blue-500 text-white">Update</button>
            <button type="button"  id="close-update-form" class="p-2 bg-blue-500 text-white">Back</button>
        </form>
  
    </div>
  </div>

  
  <div id="printPreview" class="fixed  hidden  p-5 inset-0 flex items-center justify-center z-50  bg-black bg-opacity-50  overflow-y-auto ">
    <div class="modal-container bg-white w-3/4 p-4 shadow-lg sm:overflow-x-auto mx-auto" >
      <div id="tableContainer"></div>
    </div>
  </div>






  



  <script>
    $(document).ready(function () {
        Blood_Btn()
        Create_Blood()
        Blood_Data()
        Update_Blood()
        Printdata()

    });


    function Printdata(){
   

        $("#topirnt").click(function () {
      $.ajax({
          type: "GET",
            url: "/blood-data",
            data: "data",
            dataType: "json",
          success: function (data) {
            console.log(data)
              var table="<div>"
            table += "<h1>PHILIPPINE RED CROSS </h1>";
            table += "<p>Capitol Complex, Camilmil, 5200 City of Calapan (Capital) Oriental Mindoro Philippines</p>";
            table += "<p>NON-VAT Reg. TIN: 000-804-271-00080</p> </br>";
            table += "<table border='1'>";
              table += "<thead><tr><th>TYPE </th><th>QUANTITY</th></tr></thead><tbody>";
          $.each(data, function (indexInArray, pdata) { 
            table += "<tr>";
            table += "<td>"+pdata.type+"</td>";
            table += "<td>"+pdata.quantity+"</td>";
            table += "</tr>";
          });
            table += "</tbody></table>";
            table += "</div>";
            $("#tableContainer").html(table);

            // Print the table


            window.onbeforeprint = function () {
              $("#printPreview").removeClass('hidden')
              $("#tableContainer").show()
            };
            
            // After printing
            window.onafterprint = function () {
              $("#printPreview").addClass('hidden')
              $("#tableContainer").empty()
              $("#tableContainer").hide()
            };

            window.print();
          },
          error: function () {
            console.error("Error fetching data");
          }
        });

    });



   
    }
    function Create_Blood(){
        $('#blood-form').submit(function (e) { 
            e.preventDefault();
            
            var formdata = new FormData($(this)[0])
      var submit = $(this);
      submit.prop('disabled', true)
      submit.addClass('opacity-50 cursor-not-allowed')

      $.ajax({
        type: "POST",
        url: "{{url('create-blood')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log(response)
          if(response.success){
            submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
          $('#blood-form')[0].reset()
          Blood_Data()
          console.log(response.success)
          }else{
            submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
            console.log(response.failed
            
            )
          }
        },
        error: function(xhr, status, error) {
          submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });



        });

    }
    function Update_Blood(){
        $('#blood-update-form').submit(function (e) { 
            e.preventDefault();
            
            var formdata = new FormData($(this)[0])
      var submit = $(this);
      submit.prop('disabled', true)
      submit.addClass('opacity-50 cursor-not-allowed')

      $.ajax({
        type: "POST",
        url: "{{url('update-blood-record')}}",
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log(response)
          if(response.success){
            submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
          $('#blood-form')[0].reset()
          Blood_Data()
          console.log(response.success)
          }else{
            submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
            console.log(response.failed
            
            )
          }
        },
        error: function(xhr, status, error) {
          submit.prop('disabled', false)
          submit.removeClass('opacity-50 cursor-not-allowed')
          window.alert(xhr.responseText);
        }
      });



        });

    }

    function Blood_Btn(){
        $('#add-type-record').click(function (e) { 
            e.preventDefault();
            $('#create-type-record').removeClass('hidden')
        $('#create-type-record').addClass('block')
        });

        $('#close-blood-form').click(function (e) { 
            e.preventDefault();
            $('#create-type-record').removeClass('block')
      $('#blood-form')[0].reset()

        $('#create-type-record').addClass('hidden')
        });
        
        
        $(document).on('click','.addbtn',function (e) { 
            e.preventDefault();
            var id =$(this).data('id')
            $('#status').val('Addition')
            $('#update-id').val(id)
      $('#update-text').text('Enter added value.')

            $('#update-record').removeClass('hidden')
            
            
        });
        $(document).on('click','.minusbtn',function (e) { 
            e.preventDefault();
            var id =$(this).data('id')
            $('#status').val('Subtraction')
            $('#update-id').val(id)
      $('#update-text').text('Enter subtracted value.')
            
            $('#update-record').removeClass('hidden')
                  
        });
        $(document).on('click','.deletebtn',function (e) { 
            e.preventDefault();
            var id =$(this).data('id')
            $.ajax({
                type: "GET",
                url: "/delete-blood-record/"+id,
                data: "data",
                dataType: "json",
                success: function (response) {
          Blood_Data()

                    console.log(response)
                    
                }
            });
            
                  
        });
        $('#close-update-form').click(function (e) { 
            e.preventDefault();
            $('#blood-update-form')[0].reset()
            $('#update-record').removeClass('block')
        $('#update-record').addClass('hidden')
        });

        

        $('#closeprint').click(function (e) { 
          e.preventDefault();

          $('#printPreview').addClass('hidden')
          $('#printdata tbody').empty()
          
        });

        
      
    }

  

    function Blood_Data() {
    $('#blood-data-table').empty()
    var blooddata = "<table id='blooddatatable' class='stripe hover  w_full '>"
    blooddata += "<thead>"
    blooddata += "<tr>"
    blooddata += "<th>TYPE</th>"
    blooddata += "<th>QUANTITY</th>"
    blooddata += "<th>ACTION</th>"
    blooddata += " </tr>"
    blooddata += " </thead>"
    blooddata += " <tbody> "
    blooddata += " </tbody>"
    blooddata += " </table>"
    $('#blood-data-table').append(blooddata)
    let validated = new DataTable('#blooddatatable', {
      "responsive": true,
      "ajax": {
        "url": "/blood-table",
        "type": "GET",
        "dataSrc": "blood",
      },
      
      dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf',
        ],
      "columns": [{
          "data": null,
          "render": function(data, index, row) {
            return '<p class="text-xs font-semibold">' + row.type+'</p>'
          }
        },
        {
          "data": null,
          "render": function(data, index, row) {
            return '<span class="font-semibold text-xs">' + row.quantity + '</span>';
          }
        },
        {
          "data": null,
          "render": function(data, index, row) {
            return '<div class="space-x-2 text-white font-semibold"><button data-id='+row.id+' class="addbtn px-2 py-1 rounded-md bg-yellow-500" type="button" >+</button> <button data-id='+row.id+'  class="minusbtn px-2 py-1 rounded-md bg-blue-500"  type="button">-</button> <button data-id='+row.id+'  class="deletebtn  px-2 py-1 rounded-md bg-blue-500"  type="button">Delete</button>';
          }
        }
      ],
    });

  }


    
  </script>
@endsection