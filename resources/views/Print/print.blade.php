<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>

  <script src="{{asset('js/jquery.js')}}"></script>

</head>
<body>
<div  class="mx-auto w-full px-10 h-full">
    <div id="annual_sales_report" class=" hidden  border border-black  annual_report" >
        <p class="text-center font-semibold py-3">Red Cross Oriental Mindoro Chapter </span></p>
        <div class=" sales-color px-5 bg-green-500 text-white text-center border border-black">
        <p>Sales Report for year <span id="annual_year"> </p>
        </div>
        <div class="flex w-full">
            <div class="w-full">
                <div class="border-b border-black">
                <p class=" pl-10 text-center">Program</p>
                </div>
                <p class="pl-5">Classic</p>
                <p class="pl-5">Bronze</p>
                <p class="pl-5">Silver</p>
                <p class="pl-5">Gold</p>
                <p class="pl-5">Platinum</p>
                <p class="pl-5">Senior</p>
                <p class="pl-5">Senior Plus</p>
              
            </div>
            <div class="border-l border-black text-center">
                <div class="border-b border-black">

                    <p class="font-semibold">Sales</p>
                </div>
                <div class="px-10"> 
                <p id="annual_sales_classic"></p>
                <p id="annual_sales_bronze"></p>
                <p id="annual_sales_silver"></p>
                <p id="annual_sales_gold"></p>
                <p id="annual_sales_platinum"></p>
                <p id="annual_sales_senior"></p>
                <p id="annual_sales_senior_plus"></p>
                </div>
            </div>

        </div>
        <div class="flex border-t border-black">
            <div class="w-full text-center">
            <p class="font-semibold">Total</p>

            </div>
            <div class="border-l border-black  text-center px-10 font-semibold">
                <p id="total_annual_sales"></p>
            </div>
        </div>
    </div>
    <div id="monthly_sales_report" class=" hidden  border border-black  annual_report" >
        <p class="text-center font-semibold py-3">Red Cross Oriental Mindoro Chapter </p>
        <div class=" sales-color px-5 bg-green-500 text-white text-center border border-black">
        <p> Sales Report for Month of <span id="month_of_sales"></span></p>
        </div>
        <div class="flex w-full">
            <div class="w-full">
                <div class="border-b border-black">
                <p class=" pl-10 text-center">Program</p>
                </div>
                <p class="pl-5">Classic</p>
                <p class="pl-5">Bronze</p>
                <p class="pl-5">Silver</p>
                <p class="pl-5">Gold</p>
                <p class="pl-5">Platinum</p>
                <p class="pl-5">Senior</p>
                <p class="pl-5">Senior Plus</p>
              
            </div>
            <div class="border-l border-black text-center">
                <div class="border-b border-black">

                    <p class="font-semibold">Sales</p>
                </div>
                <div class="px-10"> 
                <p id="monthly_sales_classic"></p>
                <p id="monthly_sales_bronze"></p>
                <p id="monthly_sales_silver"></p>
                <p id="monthly_sales_gold"></p>
                <p id="monthly_sales_platinum"></p>
                <p id="monthly_sales_senior"></p>
                <p id="monthly_sales_senior_plus"></p>
                </div>
            </div>

        </div>
        <div class="flex border-t border-black">
            <div class="w-full text-center">
            <p class="font-semibold">Total</p>

            </div>
            <div class="border-l border-black  text-center px-10 font-semibold">
                <p id="total_monthly_sales"></p>
            </div>
        </div>
    </div>
    <div id="membership_data_per_program_report" class=" hidden  border border-black  annual_report" >
    <p class="text-center font-semibold py-3">Red Cross Oriental Mindoro Chapter </p>
        <div class=" sales-color px-5 bg-green-500 text-white text-center border border-black">
        <p><span id="level_program"></span> Membership Program Records<span id="year_program"></span></p>
        </div>
        <table id="membership-table-program" class="w-full text-left">
          <thead>
          <tr class="border-b border-black">
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Validity</th>
                <th>PRC ID #</th>
                <th>Address</th>
            </tr>
          </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="membership_data_per_municipality_report" class=" hidden  border border-black  annual_report" >
    <p class="text-center font-semibold py-3">Red Cross Oriental Mindoro Chapter </p>
        <div class=" sales-color px-5 bg-green-500 text-white text-center border border-black">
        <p><span id="level_program"></span> Membership Program Records<span id="year_program"></span></p>
        </div>
        <table id="membership-table-muncipality" class="w-full text-left">
          <thead>
          <tr class="border-b border-black">
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Validity</th>
                <th>PRC ID #</th>
                <th>Address</th>
            </tr>
          </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="membership_data_per_barangay_report" class=" hidden  border border-black w-full h-max " >
    <p class="text-center font-semibold py-3">Red Cross Oriental Mindoro Chapter </p>
        <div class=" sales-color px-5 bg-green-500 text-white text-center border border-black">
        <p> <span id="barangay_name"></span> <span id="municipality_name"></span> Membership Program Records<span id="year_program"></span></p>
        </div>
        <table id="membership-table-barangay" class="w-full text-left">
          <thead>
          <tr class="border-b border-black px-2">
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Validity</th>
                <th>PRC ID #</th>
                <th>Address</th>
            </tr>
          </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="text-center py-10" id='print-message'>
    </div>
</div>


    

<div class="w-full" id="print-btns">
    <div class="flex justify-center space-x-2">
        <button type="button" id="membership-back"  class="p-2 bg-green-500 font-semibold rounded-md text-white my-2">Back</button>
        <button type="button" class="p-2 bg-green-500 font-semibold rounded-md text-white my-2" id="printbtn">Print</button>
    </div>
</div>
    
</body>
<script>
        $(document).ready(function () {
            Annual_Data()
            Monthly_Data()
            Printbtn()
            Membership_Program_Data()
            Membership_Municipality_Data()
            Membership_Barangay_Data()


            $('#membership-back').click(function (e) { 
                e.preventDefault();
                localStorage.removeItem('annual_report')
                localStorage.removeItem('monthly_report')
                localStorage.removeItem('ongoing_report')
                localStorage.removeItem('municipality_records')
                window.location.href='{{url("membership")}}'
                
            });
            const Ongoing= localStorage.getItem('ongoing_report')
            console.log(Ongoing)
            if(Ongoing=="annual"){
                var Annual= JSON.parse(localStorage.getItem('annual_report'))
                $('#annual_year').text(Annual.annual_year)
                $('#annual_sales_report').removeClass('hidden')
                $('#monthly_sales_report').addClass('hidden')
                $('#membership_data_per_program_report').addClass('hidden')
                $('#membership_data_per_barangay_report').addClass('hidden')

                $('#print-message').addClass('hidden')



            }else if(Ongoing=="monthly"){
                var Monthly= JSON.parse(localStorage.getItem('monthly_report'))
                var months = [
                "January", "February", "March", "April",
                "May", "June", "July", "August",
                "September", "October", "November", "December"
                ];
                var month_of_sales=months[Monthly.month_of_sales-1]
                $('#month_of_sales').text(month_of_sales)
                
                $('#annual_sales_report').addClass('hidden')
                $('#monthly_sales_report').removeClass('hidden')
                $('#membership_data_per_program_report').addClass('hidden')
                $('#membership_data_per_barangay_report').addClass('hidden')


                $('#print-message').addClass('hidden')
            }if(Ongoing==="membership_per_program"){
                var levels= localStorage.getItem('membership_programlevels')
                $('#level_program').text(levels)
                $('#annual_sales_report').addClass('hidden')
                $('#monthly_sales_report').addClass('hidden')
                $('#membership_data_per_program_report').removeClass('hidden')
                $('#membership_data_per_barangay_report').addClass('hidden')

                $('#print-message').addClass('hidden')


            }
            if(Ongoing==="municipality_records"){
                var levels= localStorage.getItem('membership_programlevels')
                $('#level_program').text(levels)
                $('#annual_sales_report').addClass('hidden')
                $('#monthly_sales_report').addClass('hidden')
                $('#membership_data_per_program_report').addClass('hidden')
                $('#membership_data_per_municipality_report').removeClass('hidden')
                $('#membership_data_per_barangay_report').addClass('hidden')

                $('#print-message').addClass('hidden')


            }
            if(Ongoing==="barangay_records"){
                var barangay_name_data= localStorage.getItem('barangay_name_data')
                var municipality_name_data= localStorage.getItem('municipality_name_data')
                console.log(levels)
                $('#barangay_name').text(barangay_name_data)
                $('#municipality_name').text(municipality_name_data)
                $('#annual_sales_report').addClass('hidden')
                $('#monthly_sales_report').addClass('hidden')
                $('#membership_data_per_program_report').addClass('hidden')
                $('#membership_data_per_municipality_report').addClass('hidden')
                $('#membership_data_per_barangay_report').removeClass('hidden')
                $('#print-message').addClass('hidden')


            }
            else{
                var message='<p>No results found!</p>'
                $('#print-message').append(message)
                if(message){
                }

            }


            
        });
        function Printbtn() {
    $('#printbtn').click(function (e) {
        e.preventDefault();

        // Add a listener for the 'beforeprint' event
        window.onbeforeprint = function () {
            // This code will run just before the print job is initiated
            $('#print-btns').addClass('hidden');
        };

        // Add a listener for the 'afterprint' event
        window.onafterprint = function () {
            // This code will run after the print job is completed or canceled
            $('#print-btns').removeClass('hidden');

            // Reset the onbeforeprint and onafterprint event handlers
            window.onbeforeprint = null;
            window.onafterprint = null;
        };

        // Initiate the print job
        window.print();
    });
}

        function Annual_Data(){
            const Ongoing= localStorage.getItem('ongoing_report')
            if(Ongoing==="annual"){
                const Annual= JSON.parse(localStorage.getItem('annual_report'))
            if(Annual!==null){
                $('#annual_sales_report').removeClass('hidden')
            $('#annual_sales_classic').text(Annual.annual_classic)
            $('#annual_sales_bronze').text(Annual.annual_bronze)
            $('#annual_sales_silver').text(Annual.annual_silver)
            $('#annual_sales_gold').text(Annual.annual_gold)
            $('#annual_sales_platinum').text(Annual.annual_platinum)
            $('#annual_sales_senior').text(Annual.annual_senior)
            $('#annual_sales_senior_plus').text(Annual.annual_senior_plus)
            var total_annaul_sales= Annual.annual_classic+ Annual.annual_bronze+ Annual.annual_silver+ Annual.annual_gold+ Annual.annual_platinum+ Annual.annual_senior+Annual.annual_senior_plus
            $('#print-message').addClass('hidden')
            
            $('#total_annual_sales').text(total_annaul_sales)
            }else{
                $('#annual_sales_report').addClass('hidden')
                $('#print-message').removeClass('hidden')
            }  

            }
      
           
        }
        function Monthly_Data(){

            const Ongoing= localStorage.getItem('ongoing_report')
            if(Ongoing==="monthly"){
                const Monthly= JSON.parse(localStorage.getItem('monthly_report'))
                if(Monthly!==null){
                    $('#monthly_sales_report').removeClass('hidden')
                $('#monthly_sales_classic').text(Monthly.monthly_classic)
                $('#monthly_sales_bronze').text(Monthly.monthly_bronze)
                $('#monthly_sales_silver').text(Monthly.monthly_silver)
                $('#monthly_sales_gold').text(Monthly.monthly_gold)
                $('#monthly_sales_platinum').text(Monthly.monthly_platinum)
                $('#monthly_sales_senior').text(Monthly.monthly_senior)
                $('#monthly_sales_senior_plus').text(Monthly.monthly_senior_plus)
                var total_monthly_sales= Monthly.monthly_classic+ Monthly.monthly_bronze+ Monthly.monthly_silver+ Monthly.monthly_gold+ Monthly.monthly_platinum+ Monthly.monthly_senior+Monthly.monthly_senior_plus
                $('#total_monthly_sales').text(total_monthly_sales)
                }else{
                    $('#monthly_sales_report').addClass('hidden')
                } 
            }
      
           
        }
        function Membership_Program_Data(){
            const Ongoing= localStorage.getItem('ongoing_report')
            if(Ongoing==="membership_per_program"){
                $('#membership-table-program tbody').empty()
            const levels=JSON.parse(localStorage.getItem('membership_program_levels'))
            var counter=1
            $.each(levels, function (index, data) { 
                var table= $('#membership-table-program tbody')
                var table_data ="<tr class='border-b border-black'>"
                 table_data+="<td>"+counter+".</td>"
                 table_data+="<td>"+data.fname+"</td>"
                 table_data+="<td>"+data.mname+"</td>"
                 table_data+="<td>"+data.birthday+"</td>"
                 table_data+="<td>"+data.start_at+"-"+data.end_at+"</td>"
                 table_data+="<td>"+data.mem_id+"</td>"
                 table_data+="<td>"+data.barangay+","+data.municipality+"</td>"
                 table_data+="</tr>"
                 $(table).append(table_data);
                 counter++
            });
            }
        }
        function Membership_Municipality_Data(){
            const Ongoing= localStorage.getItem('ongoing_report')
            if(Ongoing==="municipality_records"){
                $('#membership-table-municipality tbody').empty()
            var members=JSON.parse(localStorage.getItem('municipality_records'))
            console.log(members)
            var counter=1
            $.each(members, function (index, data) { 
                var table= $('#membership-table-muncipality tbody')
                var table_data ="<tr class='border-b border-black'>"
                 table_data+="<td>"+counter+".</td>"
                 table_data+="<td>"+data.fname+"</td>"
                 table_data+="<td>"+data.mname+"</td>"
                 table_data+="<td>"+data.birthday+"</td>"
                 table_data+="<td>"+data.start_at+"-"+data.end_at+"</td>"
                 table_data+="<td>"+data.mem_id+"</td>"
                 table_data+="<td>"+data.barangay+","+data.municipality+"</td>"
                 table_data+="</tr>"
                 $(table).append(table_data);
                 counter++
            });
            }
        }
        function Membership_Barangay_Data(){
            const Ongoing= localStorage.getItem('ongoing_report')
            if(Ongoing==="barangay_records"){
                $('#membership-table-barangay tbody').empty()
            var members=JSON.parse(localStorage.getItem('barangay_records'))
            console.log(members)
            var counter=1
            $.each(members, function (index, data) { 
                var table= $('#membership-table-barangay tbody')
                var table_data ="<tr class='border-b border-black'>"
                 table_data+="<td>"+counter+".</td>"
                 table_data+="<td>"+data.fname+"</td>"
                 table_data+="<td>"+data.mname+"</td>"
                 table_data+="<td>"+data.birthday+"</td>"
                 table_data+="<td>"+data.start_at+"-"+data.end_at+"</td>"
                 table_data+="<td>"+data.mem_id+"</td>"
                 table_data+="<td>"+data.barangay+","+data.municipality+"</td>"
                 table_data+="</tr>"
                 $(table).append(table_data);
                 counter++
            });
            }
        }

</script>
</html>