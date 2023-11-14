<div  class="appointment-decline-info-modal-form  backdrop-blur-sm w-full h-full xl:px-96  sm:px-10  md:px-40 lg:96 sm:py-20 fixed z-20">
    <div class=" bg-yellow-50  w-full shadow-xl border-2 border-green-500  " >
        <div class="top text-center p-5">
        <p class=" text-2xl font-bold text-gray-600"><i class="fa-solid fa-print"></i> Print</p>
        </div>
        <form  id="decline-appointment-info-modal-form">
        <div class="content block h-auto px-10 pb-2 shadow-sm">
            @csrf
            <div class="flex justify-center">
                <div class="px-1">
                <p class="text-gray-500">Start: </p>
                <input type="text" >
                </div>
                <div class="px-1">
                <p class="text-gray-500">Rows: </p>
                <input type="text" >
                </div>
            </div>
            <div class="w-full flex my-3 justify-center">
                <button type="submit" class="bg-green-500 px-5 py-2">Print</button>
            </div>
          
     
            
        </div>
      

    </div>
</div>