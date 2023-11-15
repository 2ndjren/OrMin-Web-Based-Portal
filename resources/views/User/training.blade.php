@extends('layout.user.layout')
@section('training')



<div class="h-screen w-full overflow-y-auto text-gray-700 ">


    <img class="object-cover w-full h-50" src="{{asset('static/user/home/vbg.png')}}" alt="apple watch photo" />

  
    <div class="container  w-full mx-auto py-5 px-12  pb-12 justify-center md:pb-20 ">

    <h1 class="md:text-4xl  xl:text-6xl text-4xl font-bold mb-4 text-gray-700">
                BUILDING RESILIENCE THROUGH,<span class="text-red-700"><br> RED CROSS TRAINING</span>
            </h1>

        <div class="my-4">
            <!-- Accordion Item 1 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-gray-100 p-4 font-bold text-md text-gray-500 cursor-pointer shadow-lg border-2 border-inherit" :class="{ 'text-red-500': open }">
                    <span>Standard First Aid and Basic Life Support – Cardiopulmonary Resuscitation with Automated External Defibrillator</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-6 border-t">
                    This comprehensive four-day course offers first aid and cardiopulmonary resuscitation (CPR) with automated external defibrillator (AED). This training can be used for employment and day-to-day emergencies. Accepted in accordance to DOLE requirements Minimum number of hours: 32 hours
                </div>
            </div>
        </div>

        <div class="my-4">
            <!-- Accordion Item 1 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-gray-100 p-4 font-bold text-md text-gray-500 cursor-pointer shadow-lg border-2 border-inherit" :class="{ 'text-red-500': open }">
                    <span>Occupational First Aid and Basic Life Support – Cardiopulmonary Resuscitation with Automated External Defibrillator</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-6 border-t">
                    This two-day course is recommended for workplace that offers first aid, CPR with AED and responds to occupational hazards. It complies to the requirements, which defines a ”certified first-aider” as any person trained and duly certified or qualified to administer first aid by the PRC.

                    Minimum number of hours: 16 hours
                </div>
            </div>
        </div>

        <div class="my-4">
            <!-- Accordion Item 1 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-gray-100 p-4 font-bold text-md text-gray-500 cursor-pointer shadow-lg border-2 border-inherit" :class="{ 'text-red-500': open }">
                    <span>Emergency First Aid</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-6 border-t">
                    This provides basic first aid knowledge to people 13 years old above for use of students, household workers and community workers. This program offers trainings that are fit for day-to-day emergencies that lay persons may encounter, as well as trainings for special cases such as Sports First Aid and Wilderness First Aid.

                    Minimum number of hours: 8 hours
                </div>
            </div>
        </div>

        <div class="my-4">
            <!-- Accordion Item 1 -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full bg-gray-100 p-4 font-bold text-md text-gray-500 cursor-pointer shadow-lg border-2 border-inherit" :class="{ 'text-red-500': open }">
                    <span>Junior First Aid</span>
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="fill-current text-red-700 h-6 w-6 transform transition-transform duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-y-2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-2 opacity-0" class="p-6 border-t">
                    This program intends to hone the capability of elementary students and out-of-school youth, aged 10-12 years old, to serve during emergencies.

                    Minimum number of hours: 6 hours
                </div>
            </div>
        </div>
    </div>

    <section class="bg-cover bg-no-repeat py-12">

        <div class="container mx-auto w-3/4">
            <br>
            <h1 class="text-2xl font-bold  text-gray-800 text-center md:text-4xl">HOW TO AVAIL RED CROSS TRAINING COURSES & OTHER SERVICES</h1>
            <ul class=" text-lg md:text-xl list-disc mt-4">
                <br>
                <li>
                    Personal appearance to the Red Cross Office for the training policy and orientation, confirmation of training schedule, signing of training agreement and payment. <em>(Request should be a month before the training.)</em>
                    <a href="" class="text-blue-500 font-bold hover:text-red-600"><u>SET AN APPOINTMENT?</u></a>
                </li><br>
                <li>
                    Training Requirements:
                    <ol class="list-decimal ml-6">
                        <li>Participants will be a registered member of the Red Cross <u>( P. Silver membership/Php 300.00)</u></li>
                        <li>Participants should be 14 per batch;</li>
                        <li>Recent <strong><u>medical certificate</u></strong> of the participants (should be physically & medically fit);</li>
                        <li>Provision of transportation, meals (AM, Lunch, PM) and honorarium for the volunteer instructors by the requesting party.</li>
                        <li>Provision of the following (requesting party):
                            <ul class="list-disc ml-6">
                                <li>List of Participants <em>(using format found below)</em></li>
                                <li>white board or chalk board</li>
                                <li>overhead or LCD projector</li>
                                <li><i class="fas fa-laptop-code"></i></li>
                            </ul>
                        </li>
                        <li>PRC will provide the <strong><u>Training Kit:</u></strong>(notebook, pen, gloves, cotton balls, alcohol - available for FIRST AID AND BLS trainings only.)</li>
                    </ol>
                </li>
            </ul>

        </div>

    </section>

    <section class="bg-cover bg-no-repeat py-12 " style="background-image: url('user/home.png')">

        <div class="container mx-auto w-3/4">

            <h2 class="text-2xl font-bold">TRAINING FEE:</h2>
            <div class="grid grid-cols-3 mt-2">
                <div class="col-span-2">
                    <h3 class="text-lg font-bold">Courses</h3>
                </div>
                <div class="col-span-1">
                    <h3 class="text-lg font-bold">Hours</h3>
                </div>
            </div>
            <ol class="list-decimal ml-6">
                <li>
                    <h4 class="text-lg font-bold">1. FIRST AID (FA)</h4>
                    <div class="grid grid-cols-3">
                        <div class="col-span-2">
                            <p>Standard First Aid Trainings & BLS-CPR</p>
                        </div>
                        <div class="col-span-1">
                            <p>32 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 2,800.00</p>
                        </div>
                        <div class="col-span-2">
                            <p>Occupational First Aid & BLS-CPR</p>
                        </div>
                        <div class="col-span-1">
                            <p>16 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 2,500.00</p>
                        </div>
                        <div class="col-span-2">
                            <p>Emergency First Aid</p>
                        </div>
                        <div class="col-span-1">
                            <p>8 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 1,200.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <h4 class="text-lg font-bold">2. BASIC LIFE SUPPORT CARDIOPULMONARY RESUSCITATION (BLS-CPR)</h4>
                    <div class="grid grid-cols-3">
                        <div class="col-span-2">
                            <p>BLS-CPR for Professional Rescuer and Healthcare Providers</p>
                        </div>
                        <div class="col-span-1">
                            <p>8 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 1,500.00</p>
                        </div>
                        <div class="col-span-2">
                            <p>BLS-CPR-Adult CPR for Lay Rescuers</p>
                        </div>
                        <div class="col-span-1">
                            <p>8 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 1,000.00</p>
                        </div>
                        <div class="col-span-2">
                            <p>Emergency First Aid</p>
                        </div>
                        <div class="col-span-1">
                            <p></p>
                        </div>
                    </div>
                </li>
                <li>
                    <h4 class="text-lg font-bold">3. WATER SAFETY (SWIMMING AND LIFE SAVING)</h4>
                    <div class="grid grid-cols-3">
                        <div class="col-span-2">
                            <p>Learn to Swim (Level 1-5)</p>
                        </div>
                        <div class="col-span-1">
                            <p>24 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 1,500.00</p>
                        </div>
                        <div class="col-span-2">
                            <p>Personal Water Safety</p>
                        </div>
                        <div class="col-span-1">
                            <p>8 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 500.00</p>
                        </div>
                        <div class="col-span-2">
                            <p>Basic Water Safety and Rescue (BWSR)</p>
                        </div>
                        <div class="col-span-1">
                            <p>40 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 2,500.00</p>
                        </div>
                        <div class="col-span-2">
                            <p>Lifeguarding</p>
                        </div>
                        <div class="col-span-1">
                            <p>40 Hours</p>
                        </div>
                        <div class="col-span-2">
                            <p>Php 3,500.00</p>
                        </div>
                    </div>
                </li>
            </ol>
            <br><br>
            <strong>
                <ul>
                    <p>Pre-requisite for advance courses, BWSR & Lifeguarding:</p>
                </ul>
            </strong>
            <ul class="list-disc ml-6">
                <li>Holder of a valid PRC Standard First Aid and BLS-CPR</li>
                <li>
                    For Surface Water Search and Rescue (SWSR) and Lifeguarding, must have attended and passed BSWR within a year.
                    For SWSR, each participant should have safety helmet, personal floatation device (PFD), whistle, work gloves, sandals/aqua shoes and rashguards/clothes suitable for water rescue.
                </li>
            </ul>
            <div class="p-4">
                <button class="p-2 w-full items-center justify-end text-md bg-blue-600 hover:bg-amber-600 focus:bg-rose-500 text-white">SET APPOINTMENT TO RED CROSS</button>
            </div>
        </div>

    </section>



    @include('layout.user.footer')
</div>


</body>

</html>
@endsection