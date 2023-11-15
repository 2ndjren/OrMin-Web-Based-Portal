@extends('layout.user.layout')
@section('membership')



<div class="h-screen w-full overflow-y-auto ">

    <img class="object-cover w-full h-50" src="{{asset('static/user/home/mbg.jpg')}}" alt="apple watch photo" />
    <main class="grow">

        <section class="bg-cover bg-no-repeat py-10 bg-opacity-25" style="background-image: url('static/user/home/tbg.jpg')">

            <div class="w-3/4 mx-auto  py-12 justify-center md:py-20">
                <h1 class="md:text-4xl  xl:text-6xl text-4xl font-bold mb-4 text-red-600">
                    JOIN THE COMMUNITY<span class="text-gray-800 "> OF COMPASSION</span>
                </h1>

            </h1>

                <div class="text-gray-700 text-xl">

                    Joining the Philippine Red Cross Membership Program gives an
                    individual self-worth as you are extending help to the most vulnerable
                    Filipinos. <br /><br />
                    Philippine Red Cross Membership is a form of donation that has
                    accident assistance benefits intended for anyone between 5-85 years
                    old. As a member, an individual is entitled to accidental death,
                    disablement and dismemberment, hospitalization and burial
                    reimbursements. <br /><br />
                    Membership fund drive program gives you access to all services of
                    Philippine Red Cross in times of emergencies, sickness and disasters.
                    <br /><br />
                    To become a member, register now or just visit our nearest PRC Chapter
                    in your area.
                    </p>
                    <ul>
                        <li class="mt-8">
                            <a href="/signin" class="rounded-xl bg-gradient-to-b from-yellow-300 to-yellow-500 px-8 py-2 text-xl text-slate-900 font-bold hover:shadow-2xl">JOIN NOW!</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="bg-gray-200">

            <div class="w-full px-4 sm:px-6">
                <div class="py-12 md:py-15 border-t border-gray-500">
                    <h1 class="text-4xl font-bold text-gray-800 text-center py-5">MEMBERSHIP CATEGORIES</h1>

                    <div class="  max-w-md mx-auto grid gap-2 md:grid-cols-3 lg:grid-cols-3 md:max-w-xl lg:max-w-full text-center p-10">
                        <!-- {{-- {/* 1nd item */} --}} -->
                        <div class="relative flex flex-col items-center">
                            <div class="block transition duration-300 ease-in-out hover:scale-125" aria-label="Cruip">
                                <img width="100" src="{{asset('static/user/categories/classic.png')}}" alt="" />
                            </div>

                            <h3 class="font-bold text-red-700 pt-10">CLASSIC</h3>
                            <p class='text-md text-red-600'> Ages 5-25 years old <br />
                                <strong>Php 150.00</strong></p>

                            <p class='text-sm pt-5 text-gray-700'>
                                PHP 12,000.00<br />
                                ACCIDENTAL DEATH, DISABLEMENT & DISMEMBERMENT
                                <br /><br />
                                PHP 12,000.00<br />
                                UNPROVOKED MURDER & ASSAULT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL MEDICAL REIMBURSEMENT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL BURIAL ASSISTANCE
                                <br /><br />
                                PHP 150.00<br />
                                HOSPITAL DAILY ALLOWANCE PER DAY (MAX OF 60 DAYS)<br /><br />
                            </p>
                        </div>

                        <!-- {{-- {/* 2nd item */} --}} -->
                        <div class="relative flex flex-col items-center">
                            <div class="block transition duration-300 ease-in-out hover:scale-125" aria-label="Cruip">
                                <img src="{{asset('static/user/categories/bronze.png')}}" alt="" width="200" />
                            </div>

                            <h3 class="font-bold text-red-700 pt-10">CLASSIC</h3>
                            <p class='text-md text-red-600'> Ages 5-25 years old <br />
                                <strong>Php 150.00</strong></p>
                            </p>

                            <p class='text-sm pt-5 text-gray-700'>
                                PHP 35,000.00<br />
                                ACCIDENTAL DEATH, DISABLEMENT & DISMEMBERMENT
                                <br /><br />
                                PHP 35,000.00<br />
                                UNPROVOKED MURDER & ASSAULT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL MEDICAL REIMBURSEMENT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL BURIAL ASSISTANCE
                                <br /><br />
                                PHP 150.00<br />
                                HOSPITAL DAILY ALLOWANCE PER DAY (MAX OF 60 DAYS)<br /><br />
                            </p>
                        </div>

                        <!-- {{-- {/* 3rd item */} --}} -->
                        <div class="relative flex flex-col items-center">
                            <div class="block transition duration-300 ease-in-out hover:scale-125" aria-label="Cruip">
                                <img src="{{asset('static/user/categories/silver.png')}}" alt="" width="200" />
                            </div>
                            <h3 class="font-bold text-red-700 pt-10">CLASSIC</h3>
                            <p class='text-md text-red-600'> Ages 5-25 years old <br />
                                <strong>Php 150.00</strong></p>

                            <p class='text-sm pt-5 text-gray-700'>
                                PHP 100,000.00<br />
                                ACCIDENTAL DEATH, DISABLEMENT & DISMEMBERMENT
                                <br /><br />
                                PHP 100,000.00<br />
                                UNPROVOKED MURDER & ASSAULT
                                <br /><br />
                                PHP 10,000.00<br />
                                ACCIDENTAL MEDICAL REIMBURSEMENT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL BURIAL ASSISTANCE
                                <br /><br />
                                PHP 200.00<br />
                                HOSPITAL DAILY ALLOWANCE PER DAY (MAX OF 60 DAYS)<br /><br />
                            </p>
                        </div>

                        <!-- {{-- {/* 4th item */} --}} -->
                        <div class="relative flex flex-col items-center">
                            <div class="block transition duration-300 ease-in-out hover:scale-125" aria-label="Cruip">
                                <img src="{{asset('static/user/categories/gold.png')}}" alt="" width="200" />
                            </div>
                            <h3 class="font-bold text-red-700 pt-10">CLASSIC</h3>
                            <p class='text-md text-red-600'> Ages 5-25 years old <br />
                                <strong>Php 150.00</strong></p>

                            <p class='text-sm pt-5 text-gray-700'>
                                PHP 200,000.00<br />
                                ACCIDENTAL DEATH, DISABLEMENT & DISMEMBERMENT
                                <br /><br />
                                PHP 200,000.00<br />
                                UNPROVOKED MURDER & ASSAULT
                                <br /><br />
                                PHP 10,000.00<br />
                                ACCIDENTAL MEDICAL REIMBURSEMENT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL BURIAL ASSISTANCE
                                <br /><br />
                                PHP 200.00<br />
                                HOSPITAL DAILY ALLOWANCE PER DAY (MAX OF 60 DAYS)<br /><br />
                            </p>
                        </div>

                        <!-- {{-- {/* 5th item */} --}} -->
                        <div class="relative flex flex-col items-center">
                            <div class="block transition duration-300 ease-in-out hover:scale-125" aria-label="Cruip">
                                <img src="{{asset('static/user/categories/platinum.png')}}" alt="" width="200" />
                            </div>
                            <h3 class="font-bold text-red-700 pt-10">CLASSIC</h3>
                            <p class='text-md text-red-600'> Ages 5-25 years old <br />
                                <strong>Php 150.00</strong></p>

                            <p class='text-sm pt-5 text-gray-700'>
                                PHP 300,000.00<br />
                                ACCIDENTAL DEATH, DISABLEMENT & DISMEMBERMENT
                                <br /><br />
                                PHP 300,000.00<br />
                                UNPROVOKED MURDER & ASSAULT
                                <br /><br />
                                PHP 10,000.00<br />
                                ACCIDENTAL MEDICAL REIMBURSEMENT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL BURIAL ASSISTANCE
                                <br /><br />
                                PHP 200.00<br />
                                HOSPITAL DAILY ALLOWANCE PER DAY (MAX OF 60 DAYS)<br /><br />
                            </p>
                        </div>

                        <!-- {{-- {/* 6th item */} --}} -->
                        <div class="relative flex flex-col items-center">
                            <div class="block transition duration-300 ease-in-out hover:scale-125" aria-label="Cruip">
                                <img src="{{asset('static/user/categories/senior.png')}}" alt="" width="200" />
                            </div>
                            <h3 class="font-bold text-red-700 pt-10">CLASSIC</h3>
                            <p class='text-md text-red-600'> Ages 5-25 years old <br />
                                <strong>Php 150.00</strong></p>

                            <p class='text-sm pt-5 text-gray-700'>
                                PHP 50,000.00<br />
                                ACCIDENTAL DEATH, DISABLEMENT & DISMEMBERMENT
                                <br /><br />
                                PHP 50,000.00<br />
                                UNPROVOKED MURDER & ASSAULT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL MEDICAL REIMBURSEMENT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL BURIAL ASSISTANCE
                                <br /><br />
                                PHP 100.00<br />
                                HOSPITAL DAILY ALLOWANCE PER DAY (MAX OF 60 DAYS)<br /><br />
                            </p>
                        </div>

                        <!-- {{-- {/* 7th item */} --}} -->
                        <div class="relative flex flex-col items-center">
                            <div class="block transition duration-300 ease-in-out hover:scale-125" aria-label="Cruip">
                                <img src="{{asset('static/user/categories/plus.png')}}" alt="" width="200" />
                            </div>
                            <h3 class="font-bold text-red-700 pt-10">CLASSIC</h3>
                            <p class='text-md text-red-600'> Ages 5-25 years old <br />
                                <strong>Php 150.00</strong></p>

                            <p class='text-sm pt-5 text-gray-700'>
                                PHP 50,000.00<br />
                                ACCIDENTAL DEATH, DISABLEMENT & DISMEMBERMENT
                                <br /><br />
                                PHP 50,000.00<br />
                                UNPROVOKED MURDER & ASSAULT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL MEDICAL REIMBURSEMENT
                                <br /><br />
                                PHP 5,000.00<br />
                                ACCIDENTAL BURIAL ASSISTANCE
                                <br /><br />
                                PHP 100.00<br />
                                HOSPITAL DAILY ALLOWANCE PER DAY (MAX OF 60 DAYS)<br /><br />
                            </p>
                        </div>

                    </div>

                </div>
            </div>

        </section>

        <div class="container mx-auto mt-8 px-20">
            <h1 class="md:text-4xl font-semibold text-red-600 mt-6 text-2xl">FAQs Membership</h1>
            <div class="mt-4">
                <!-- Accordion Item 1 -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                        <span>WHAT IS RED CROSS MEMBERSHIP PROGRAM?</span>
                        <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                        A form of donation to the Philippine Red Cross to sustain PRC's humanitarian operations and provide accidental assistance benefits to every individual donor.
                    </div>
                </div>
            </div>

            <div class="my-4">
                <!-- Accordion Item 1 -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full bg-white p-4 font-semibold cursor-pointer shadow-lg" :class="{ 'text-red-500': open }">
                        <span>HOW MUCH IS THE MEMBERSHIP FEE?</span>
                        <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-4 border-t">
                        The membership fee is Php 60.00 to 1,000.00 depending on your age group and membership categories
                    </div>
                </div>
            </div>
        </div>


        <section class="bg-gray-200 text-gray-200  py-10" id="contact">
        <div class="max-w-6xl mx-auto px-4 sm:px-6  ">
          <div class="relative bg-red-800 py-10 px-8 md:py-30 md:px-6" data-aos="fade-up">
            <div class="relative flex flex-col lg:flex-row justify-between items-center">
              <div class="mb-6 lg:mr-16 lg:mb-0 text-center lg:text-left lg:w-1/2">
                <h3 class="text-4xl font-bold text-white mb-2">SHARE YOUR FEEDBACK.</h3>
                <p class="text-xl text-purple-200">Help us improve our service by providing your feedback.</p>
              </div>
              <form action="" class="w-full">
                <div class="mt-2 block pr-1">
                  <input type="text" name="name" class="w-full rounded-full border border-gray-300 p-3 shadow focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Enter you name" />
                </div>
                <div>
                  <textarea name="message" cols="10" rows="3" placeholder="message" class="mt-3 w-full rounded-xl border border-gray-300 p-3 shadow focus:outline-none focus:ring-2 focus:ring-purple-600"></textarea>
                </div>
                <div class="flex justify-center">
                  <button type="submit" class="rounded-xl bg-yellow-400 px-8 py-2 text-white">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

    </main>

    @include('layout.user.footer')

</div>


@endsection