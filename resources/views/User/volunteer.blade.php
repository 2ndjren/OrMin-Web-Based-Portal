@extends('layout.user.layout')
@section('volunteer')



<div class="h-screen w-full overflow-y-auto ">
    <img class="object-cover w-full h-50" src="{{asset('static/user/home/volbg.jpg')}}" alt="apple watch photo" />

    <div class="w-full">

        <div class="w-full mx-auto px-12  py-24 justify-center md:pb-20 ">
            <h1 class="md:text-4xl  xl:text-6xl text-4xl font-bold mb-4 text-gray-700">
                BE ONE OF US,<span class="text-red-700"> BE A VOLUNTEER!</span>
            </h1>

            <p class="text-lg text-gray-600 ">
                Volunteer Service Office handles programs aim at encouraging people to become an army of volunteers of the Philippine Red Cross
                by sharing their resources, time, and efforts to alleviate human suffering.
                It takes active charge of the administration, development, growth, and effective mobilization of volunteers in all aspects of PRC
                services within the chapter jurisdiction in particular and/or the whole country. <br /><br />

                While this office delivers its service through recruitment, engagement and retention of volunteers,
                it also gives recognition to the outstanding individuals who rendered significant contribution to the organization.
                <br /><br />
                The delivery of essential services of the PRC is powered by the committed service of volunteers who unselfishly devotes time, energy, and resources in serving humanity.
                <br /><br />
                To become a member, fill up the form or just visit our Red Cross Office
            </p>
            <ul class='py-5'>
                <li>
                    <a href="/signin" class="mt-4 rounded-xl bg-gradient-to-b from-yellow-300 to-yellow-500 px-8 py-2 text-xl text-slate-900 font-bold hover:shadow-2xl">
                        REGISTER NOW!</a>
                </li>
            </ul>
        </div>


        <section class="bg-cover bg-no-repeat py-12 " style="background-image: url('static/user/home/vol.jpg')">

        <div class="w-full mx-auto py-5 px-12  pb-12 justify-center md:pb-20 ">
           
                <div class="flex">
                    <div class="px-15 py-24 lg:w-3/4">
                        <div class="w-full">
                            <h1 class="md:text-4xl xl:text-6xl text-4xl font-bold mb-4 text-white">
                                RED CROSS,<span class="text-red-600 "> 143 PROGRAM</span>
                            </h1>
                            <div class="text-white text-xl">
                                Red Cross 143 is a community-based volunteering program of the Philippine Red Cross where one leader and a minimum of forty three (43)
                                members form part of an active corps of capable, caring, and committed individuals. RC 143 promotes a culture of self-help in the
                                communities by developing a formidable network of Red Cross volunteers who will predict potential risk, plan, prepare, and practice
                                for effective community based disaster risk reduction. <br />

                                <ul class="mt-8">
                                    <li class="text-left">
                                        <a href="/auth/signin" class="bg-transparent hover:bg-yellow-500 text-red-600 font-bold hover:text-white py-2 px-4 border-4 border-red-600 hover:border-transparent rounded">
                                            REGISTER NOW!
                                        </a>


                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



        </section>


        <section class="relative">

            <div class="max-w-6xl mx-auto px-4 sm:px-6">

                <div class="py-20">
                    {{-- {/* Page header */} --}}
                    <div class="max-w-full mx-auto text-center pb-4 md:pb-8">
                        <h3 class="text-6xl font-bold text-blue-600">BE A MEMBER.</h3>
                    </div>
                    <form>

                        <p class='text-black pb-3'>Full Name</p>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="firstname" id="floating_first_name" autoComplete="on" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />

                                <label for="floating_first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    First Name</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="lastname" id="floating_last_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />

                                <label for="floating_last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Last name</label>
                            </div>
                        </div>

                        <p class='text-black pb-3'>Address</p>
                        <div class="grid md:grid-cols-3 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="barangay" id="floating_brgy" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_brgy" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Barangay</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="municipal" id="floating_municipal" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_municipal" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Municipal</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" autoComplete="on" name="zipcode" id="floating_zip" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_zip" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Zip Code</label>
                            </div>
                        </div>

                        <p class='text-black pb-3'>Other/s</p>
                        <div class="grid md:grid-cols-3 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" autoComplete="on" name="phone" id="floating_phone" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_phone" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Phone Number</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="email" autoComplete="on" name="email" id="floating_email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Email</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="date" autoComplete="on" name="bday" id="floating_bday" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_bday" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Birthday</label>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-3 md:gap-6">

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="gender" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Gender</label>
                                <select name='gender' autoComplete="on" id="gender" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <option class='text-gray-500'>---Choose here---</option>
                                <option value="Male">Male</option>
                                <option value='Female'>Female</option>
                                </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="blood" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Select your blood Type</label>
                                <select id="blood" autoComplete="on" name='blood' class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <option class='text-gray-500'>---Choose here---</option>
                                <option>Prefer not to say.</option>
                                <option>A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="categories" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Select Member Category</label>
                                <select id="categories" autoComplete="on" name='category' class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <option class='text-gray-500'>---Choose here---</option>
                                <option>Classic</option>
                                <option value="Bronze">Premiere Bronze</option>
                                <option value="Silver">Premiere Silver</option>
                                <option value="Gold">Premiere Gold</option>
                                <option value="Platinum">Premiere Platinum</option>
                                <option value="Senior">Premiere Senior</option>
                                <option value="Seniorplus">Premiere Senior Plus</option>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full md:w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit</button>
                    </form>


                </div>
            </div>
        </section>

        <div class="container mx-auto mt-8">
            <h1 class="md:text-4xl font-semibold text-red-600 mt-6 text-2xl">FAQs Volunteer Program</h1>
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

        </main>


        @include('layout.user.footer')

    </div>

    </body>

    </html>
    @endsection