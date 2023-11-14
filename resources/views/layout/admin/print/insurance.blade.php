<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Document</title>
      @vite('resources/css/app.css')
  <script src="{{asset('js/jquery.js')}}"></script>
  <link rel="stylesheet" href="{{asset('fa6/css/all.css')}}">
</head>
<body>

<div class=" p-10">
    <div class="text-center py-5">
    <p class="text-xl">Philippine Red Cross Association Volunteers</p>
    <p class="">Oriental Mindoro Chapter</p>
    </div>
    <table class="w-full  border p-2 mb-5">
        <thead>
            <tr class="p-2  bg-green-600 text-white">
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>

            @php
            $counter=1
            @endphp
            @foreach($print as $to)
            <tr class="text-sm pt-2 border-b w-full text-center">
                <td>{{$counter++}}</td>
                <td>{{$to->id}}</td>
                <td>{{$to->fname}} {{$to->mname}} {{$to->lname}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="btns" class="flex w-full justify-end space-x-2">
        <button class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded-md text-white font-semibold" id="printbtn" type="button">Print</button>
        <a href="{{url('insurance')}}"  class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded-md text-white font-semibold"  id="printbtn">Cancel</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(window).on('beforeprint',function(){
                $('#btns').removeClass('block');
                $('#btns').addClass('hidden');
            })
            $(window).on('afterprint',function(){
                $('#btns').removeClass('hidden');
                $('#btns').addClass('block');

            });
        $('#printbtn').click(function (e) { 
            e.preventDefault();
            window.print()


        
            
        });
    });
</script>
    
</body>
</html>