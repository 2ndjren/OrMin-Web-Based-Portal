@extends('layout.user.layout')
@section('donate')
<div class="h-screen w-full overflow-y-auto space-y-5 ">

    <img class="object-cover w-full h-50" src="{{asset('static/user/home/cbg.png')}}" alt="apple watch photo" />

    <div class="h-1/4 bg-center bg-cover bg-no-repeat" style="background-image:url('https://scontent.fmnl30-3.fna.fbcdn.net/v/t1.6435-9/50022313_623915704731113_7773089081394724864_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeHOvgBvjx6ke7Bb9b6B4Xh2dZKMyBuru511kozIG6u7ncnq1ruJ_uvZC7TelJWjj-uxS-E8yECsoLSavLBj5ETr&_nc_ohc=gpsLWmRrH80AX-kUu96&_nc_ht=scontent.fmnl30-3.fna&oh=00_AfBHC0IKrCf7VF7mb8vaPEYj55e50qSxl27M8y90P1X6aQ&oe=65347415')">


        <div class="w-full text-full text-6xl text-center text-red-500 font-bold justify-start p-8">
            <h1 class="md:text-4xl  xl:text-6xl text-4xl font-bold mb-4 text-gray-700">
                SMALL ACTS, BIG IMPACT,<span class="text-red-700"><br> RED CROSS DONATION!</span>
            </h1>
        </div>

    </div>


    <div class="h-54 w-full px-20">
        <div class="">
            <p class="text-red-600 text-5xl font-bold "><span class="">Fund Raising</span></p>
        </div>

    </div>
    <div class="w-full px-4 sm:px-10 py-5 flex flex-col space-y-5 sm:space-y-0 sm:flex-row sm:space-x-5 justify-center">
        <div class="w-full sm:w-auto py-5 px-6 sm:px-10 bg-red-600 rounded-xl hover:border-2 hover:border-red-600 hover:bg-white hover:text-red-600 text-white text-center">
            <a href="#online" class="text-2xl sm:text-3xl">
                <span><i class="fa-solid fa-globe"></i></span>
                <span class="hidden sm:inline"> ONLINE</span>
            </a>
        </div>
        <div class="w-full sm:w-auto py-5 px-6 sm:px-10 bg-red-600 rounded-xl hover:border-2 hover:border-red-600 hover:bg-white hover:text-red-600 text-white text-center">
            <a href="#bank-to-bank" class="text-2xl sm:text-3xl">
                <span><i class="fa-solid fa-building-columns"></i></span>
                <span class="hidden sm:inline"> BANK TO BANK</span>
            </a>
        </div>
        <div class="w-full sm:w-auto py-5 px-6 sm:px-10 bg-red-600 rounded-xl hover:border-2 hover:border-red-600 hover:bg-white hover:text-red-600 text-white text-center">
            <a href="#on-site" class="text-2xl sm:text-3xl">
                <span><i class="fa-solid fa-map-location-dot"></i></span>
                <span class="hidden sm:inline"> ON SITE</span>
            </a>
        </div>
    </div>

    <div id="online" class="h-screen py-10 sm:py-20">
        <div class="text-center">
            <p class="text-4xl sm:text-6xl text-red-600"><i class="fa-solid fa-globe"></i></p>

            <div class="">
                <p class="text-gray-600 font-bold text-2xl sm:text-4xl">E-Wallets</p>
            </div>
            <p class="text-gray-600 text-sm sm:text-base">You can donate using the provided QR Codes below.</p>
            <div class="w-full flex flex-wrap justify-center">
                <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 p-2">
                    <img src="https://redcross.org.ph/wp-content/uploads/2021/05/gcash.jpg" alt="" class="w-full">
                </div>
                <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 p-2">
                    <img src="https://redcross.org.ph/wp-content/uploads/2021/05/paymaya.jpg" alt="" class="w-full">
                </div>
                <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 p-2">
                    <img src="https://redcross.org.ph/wp-content/uploads/2021/05/justpay.jpg" alt="" class="w-full">
                </div>
            </div>
        </div>
    </div>

    <div id="bank-to-bank" class="h-auto  py-20 px-20">
        <div class="flex-w-full text-center ">
            <p class="text-6xl text-red-600"><i class="fa-solid fa-building-columns"></i></p>
            <div class="">
                <p class="text-gray-600 font-bold text-4xl">BANK TO BANK</p>
            </div>
            <p class="text-gray-600">You can donate by transferring your donation in the following listed accounts.</p>
            <div class="">
                <p class="font-bold">NATION WIDE ACCOUNT NAME: PHILIPPINE RED CROSS</p>
                <div class="w-full flex">
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>BANCO DE ORO (BDO)
                            SAVINGS (PESO)
                            0045-3001-8647</p>
                        <p>SAVINGS (DOLLAR)
                            1045-3003-9482</p>
                        <p>Swift code: BNOR PHMM</p>
                    </div>
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>METROBANK
                            SAVINGS (PESO)
                            151-3-15151480-5</p>
                        <p>SAVINGS (DOLLAR)
                            151-2-15100218-2</p>
                        <p>Swift code: MBTC PHMM</p>
                    </div>
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>LANDBANK OF THE PHILIPPINES
                            SAVINGS (PESO)
                            0561 0958 17</p>
                        <p>Swift code: TLBP PHMM</p>

                    </div>
                </div>


                <div class="w-full flex">
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>PHILIPPINE NATIONAL BANK (PNB)
                            SAVINGS (PESO)
                            1607-1020-0331</p>

                        <p>Swift code: PNBM PHMM</p>
                    </div>
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>BANK OF THE PHILIPPINE ISLAND (BPI)
                            SAVINGS (PESO)
                            4991-0036-52</p>
                        <p>SAVINGS (DOLLAR)
                            4994-0103-15</p>
                        <p>Swift code: BOPI PHMM</p>
                    </div>
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>UNIONBANK
                            SAVINGS (PESO)
                            1015-4000-0201</p>
                        <p>SAVINGS (DOLLAR)
                            1315-4000-0090</p>
                        <p>Swift code: UBM PHMM</p>
                    </div>
                </div>

                <div class="w-full flex justify-center">
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>SECURITY BANK
                            SAVINGS (PESO)
                            0132-0624-6400-3</p>

                        <p>SAVINGS (DOLLAR)
                            0132-0624-6400-4</p>
                        <p>Swift code: SETCPHMM</p>
                    </div>
                    <div class="text-left p-14 text-gray-600 break-words  font-semibold">
                        <p>AUB
                            SAVINGS ( PESO)
                            075-11-000603-7</p>
                        <p>Swift code: AUBKPHMM</p>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div id="on-site" class="h-screen  py-20 ">
        <div class="flex-w-full text-center ">
            <p class="text-6xl text-red-600"><i class="fa-solid fa-map-location-dot"></i></p>

            <div class="">
                <p class="text-gray-600 font-bold text-4xl">ON SITE</p>
            </div>
            <p class="text-gray-600">Location</p>
            <div class=" flex justify-center pb-30 ">
                <iframe class="border-2 border-red-600" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d970.2736176691274!2d121.17602692843181!3d13.406476999181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDI0JzIzLjMiTiAxMjHCsDEwJzM2LjAiRQ!5e0!3m2!1sen!2sph!4v1695384567532!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>


    <section id="blood" class="bg-cover bg-no-repeat py-12 " style="background-image: url('static/user/home/BLOOD.jpg')">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative">
            <div class="flex justify-end">
                <div class="px-15 py-24 lg:w-3/4">
                    <div class="w-full">
                        <h1 class="md:text-4xl text-right xl:text-6xl text-4xl font-bold mb-4 text-white" data-aos="fade-up">
                            SHARE LIFE,<span class="text-red-600 "> GIVE BLOOD!</span>
                        </h1>
                        <div class="text-white text-right ml-10 text-xl">
                            The National Blood Services is the Philippine Red Cross’ arm that delivers adequate, safe and quality blood supply to the most vulnerable. Through its 88 blood service facilities nationwide, the PRC has been the leading provider of blood and blood products in the country. The PRC continuously promotes voluntary non-remunerated blood donation to attain adequacy. </div>

                        <ul class="mt-8">
                            <li class="text-right">
                                <a href="/auth/signin" class="bg-transparent hover:bg-yellow-500 text-red-600 font-bold hover:text-white py-2 px-4 border-4 border-red-600 hover:border-transparent rounded">
                                    DONATE BLOOD!
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-cover bg-no-repeat py-12"">
            <div class=" max-w-6xl mx-auto px-4 sm:px-6 pt-8 md:pt-8">

        <div>
            <h1 class="text-center md:text-4xl xl:text-6xl text-4xl font-bold mb-4 text-gray-700" data-aos="fade-up">
                PROGRAMS
            </h1>

            <div class="relative z-0 mb-6 group">
                <p class="text-xl text-black">
                    <strong>Donor Recruitment and Retention</strong><br /> <span>
                        To meet the increasing demand for blood and augment the national blood requirement,
                        the PRC conducts education and recruitment sessions to encourage regular voluntary blood donations
                        from communities, different companies, organizations, colleges, and universities nationwide.
                    </span>
                </p>
            </div>

            <div class="relative z-0 mb-6 group">
                <p class="text-xl text-black">
                    <strong>Blood Collection</strong><br /> <span>
                        With different PRC blood service facilities strategically located in the entire country, the PRC collects blood from voluntary, non-remunerated blood donors with their donations accounting to almost 50% share of the nation’s blood supply.
                    </span>
                </p>
            </div>

            <div class="relative z-0 mb-6 group">
                <p class="text-xl text-black">
                    <strong>Blood Component Processing</strong><br /> <span>Whole blood donations are separated into components using a special equipment to generate one unit each of red blood cells, plasma and platelets. Thus, one donation can help save three lives.
                    </span>
                </p>
            </div>

            <div class="relative z-0 mb-6 group">
                <p class="text-xl text-black">
                    <strong>Blood Storage and Issuance</strong><br /> <span>Once blood is suitable for transfusion, blood is stored in a temperature controlled blood bank refrigerator. Clients or patients needing blood for transfusion may request from any PRC blood facilities upon presentation of blood request form issued by the hospital or physician.
                    </span>
                </p>
            </div>

        </div>

</div>
</section>



<section>
    <div class="container mx-auto mt-8 px-20">
        <h1 class="md:text-4xl font-semibold text-red-600 mt-6 text-2xl">Frequently Asked Questions</h1>
        <div class="mt-4">
            <!-- Accordion Item 1 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                    <span>How often can a person donate?</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                    A healthy individual may donate every three months.
                </div>
            </div>
        </div>

        <div class="mt-4">
            <!-- Accordion Item 2 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                    <span>Will donating blood make a person weak?</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                    No, it will not make you weak. Donating 450cc will not cause any ill effects or weakness. The human body has the capacity to compensate with the new fluid volume. Further, the bone marrow is stimulated to produce new blood cells which in turn makes the blood forming organs function more effectively.
                </div>
            </div>
        </div>
        <div class="mt-4">
            <!-- Accordion Item 3 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                    <span>Can a person who has a tattoo or body piercing still donate blood?</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                    If the tattooing procedure or the piercing was done a year ago, he/she may donate. This is also applicable to acupuncture, and other procedures involving needles.
                </div>
            </div>
        </div>
        <div class="mt-4">
            <!-- Accordion Item 4 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                    <span>How long wll it take to donate blood?</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                    The whole process of blood donation, from the registration up to the recovery, will only take an average of 30 minutes.

                    The blood extraction will take about 5-10 minutes. The blood volume will start replenishing within 24 hours. Theoretically, by the end of the month, the body will have the blood status before the blood donation.
                </div>
            </div>
        </div>

        <div class="mt-4">
            <!-- Accordion Item 4 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                    <span>Will I contract the disease through blood donation?</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                    No, we use sterile, disposable needles and syringes.
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8 px-20">
        <h1 class="md:text-4xl font-semibold text-red-600 mt-6 text-2xl">Blood Bank</h1>
        <div class="relative z-0 mb-6 group">
            <p class="text-xl text-black">
                City Hall, Barangay Guinobatan, Calapan City, Oriental Mindoro <br>
                Tel: 043-491-4383 <br>
                Mobile: 0917-444-2998 <br>
                Email: mindoro.oriental@redcross.org.ph <br>
                Category: Blood Collecting Unit/Blood Station

            </p>
        </div>
    </div>


</section>
</div>

@include('layout.user.footer')
</div>

@endsection