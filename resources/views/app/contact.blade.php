@extends('layouts.app') @section('content')

<head>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>

<div class="min-w-fit">
    <div>
        <p class="text-blue-800 text-center font-bold text-4xl">Contact Us</p>
        <p class="text-center justify-center items-center md:mt-5">
            Euismod adipiscing egestas ultrices id ad natoque quis adipiscing
            nam eu a litora nibh ad ultrices ipsum quam curae dictum scelerisque
            montes ullamcorper mi
        </p>
    </div>

    {{-- 4 ICONS ROW  --}}

    <div class="flex flex-row w-6/12 mx-auto md:mt-10 gap-4">
        <div class="w-3/12">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/Group 204.png') }}"
            />
            <p class="text-center text-gray-500 font-bold text-sm md:mt-5">
                1789 Street Name, City Name, Australia
            </p>
        </div>

        <div class="w-3/12">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/Group 205.png') }}"
            />
            <p class="text-center text-gray-500 font-bold text-sm md:mt-5">
                0092 - 123 455 789 +123 958 789
            </p>
        </div>

        <div class="w-3/12">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/Group 206.png') }}"
            />
            <p class="text-center text-gray-500 font-bold text-sm md:mt-5">
                support@gimigimi.com
            </p>
        </div>

        <div class="w-3/12">
            <img
                class="border-green-500 mx-auto"
                src="{{ asset('images/Group 206.png') }}"
            />
            <p class="text-center text-gray-500 font-bold text-sm md:mt-5">
                Monday - Saturday Sunday is Closed
            </p>
        </div>
    </div>

    {{-- END 4 ICONS ROw  --}}

    <div class="flex flex-row gap-5 w-8/12 mx-auto md:mt-10">
        {{-- Frequently Asked Questions--}}

        <div class="w-11/12 mx-auto mt-5 md:w-9/12">
            <div class="w-full flex flex-row justify-center gap-5">
                <div class="horizontal-line-2"></div>
                <p class="text-center text-blue-800 font-bold md:mt-5">
                    Frequently Asked Questions
                </p>
                <div class="horizontal-line-2"></div>
            </div>


            {{-- ACCORDIAN --}}


            {{-- END ACCORDIAN --}}
        </div>
        {{-- END  Frequently Asked Questions--}}

        {{-- GET IN TOUCH FORM --}}

        <div class="w-10/12 mx-auto mt-5 md:w-9/12">
            <div class="w-full flex flex-row justify-center gap-5">
                <div class="horizontal-line-2"></div>
                <p class="text-center text-blue-800 font-bold md:mt-5">
                    Get In Touch
                </p>
                <div class="horizontal-line-2"></div>
            </div>

            {{-- FORM --}}
            <form class="w-full">
                <div class="flex flex-row gap-2 md:mt-2">
                    <div class="w-1/2">
                        <label
                            >Name: <span class="text-red-500"> *</span></label
                        >
                        <input
                            class="border-2 border-black py-2 px-3 text-gray-700 w-full"
                            id="username"
                            type="text"
                            placeholder="Username"
                        />
                    </div>

                    <div class="w-1/2">
                        <label
                            >Email: <span class="text-red-500"> *</span></label
                        >
                        <input
                            class="border-2 border-black py-2 px-3 text-gray-700 w-full"
                            id="email"
                            type="text"
                            placeholder="Email"
                        />
                    </div>
                </div>

                <div class="flex flex-row gap-2">
                    <div class="w-1/2 md:mt-5">
                        <label
                            >Phone: <span class="text-red-500"> *</span></label
                        >
                        <input
                            class="border-2 border-black py-2 px-3 text-gray-700 w-full"
                            id="phone"
                            type="text"
                            placeholder="Phone"
                        />
                    </div>

                    <div class="w-1/2 md:mt-5">
                        <label
                            >Company:
                            <span class="text-red-500"> *</span></label
                        >
                        <input
                            class="border-2 border-black py-2 px-3 text-gray-700 w-full"
                            id="company"
                            type="text"
                            placeholder="Company"
                        />
                    </div>
                </div>

                <div class="flex flex-row md:mt-5">
                    <div class="w-full">
                        <label
                            >Message:
                            <span class="text-red-500"> *</span></label
                        >
                        <input
                            class="border-2 border-black py-2 px-3 text-gray-700 w-full"
                            id="phone
                            type="text"
                            placeholder="Message"
                        />
                    </div>
                </div>
            </form>
        </div>
        {{-- END GET IN TOUCH FORM --}}
    </div>
</div>

@endsection
