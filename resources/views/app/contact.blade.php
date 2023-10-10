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

<div class="mx-14">
    <div>
        <p class="mt-8 text-4xl font-bold text-center text-blue-500">Contact Us</p>
        <p class="items-center justify-center text-center text-gray-500 md:mt-5">
            Euismod adipiscing egestas ultrices id ad natoque quis adipiscing
            nam eu a litora nibh ad ultrices ipsum quam curae dictum scelerisque
            montes ullamcorper mi
        </p>
    </div>

    {{-- 4 ICONS ROW  --}}

    <div class="flex flex-col w-6/12 gap-4 mx-auto mt-10 md:flex-row">
        <div class="w-full md:w-3/12">
            <img
                class="mx-auto border-green-500"
                src="{{ asset('images/Group 204.png') }}"
            />
            <p class="text-sm font-bold text-center text-gray-500 md:mt-5">
                1789 Street Name, City Name, Australia
            </p>
        </div>

        <div class="w-full md:w-3/12">
            <img
                class="mx-auto border-green-500"
                src="{{ asset('images/Group 205.png') }}"
            />
            <p class="text-sm font-bold text-center text-gray-500 md:mt-5">
                0092 - 123 455 789 +123 958 789
            </p>
        </div>

        <div class="w-full md:w-3/12">
            <img
                class="mx-auto border-green-500"
                src="{{ asset('images/Group 206.png') }}"
            />
            <p class="text-sm font-bold text-center text-gray-500 md:mt-5">
                support@gimigimi.com
            </p>
        </div>

        <div class="w-full md:w-3/12">
            <img
                class="mx-auto border-green-500"
                src="{{ asset('images/Group 206.png') }}"
            />
            <p class="text-sm font-bold text-center text-gray-500 md:mt-5">
                Monday - Saturday Sunday is Closed
            </p>
        </div>
    </div>
</div>

    {{-- END 4 ICONS ROw  --}}




{{-- Map --}}

<!-- component -->


  <section class="relative w-full mt-10 text-gray-600 border-2 border-red-500 body-font ">
    <div class="absolute inset-0 bg-gray-300">
        <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=%C4%B0zmir+(My%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed" style=""></iframe>
    </div>
    <div class="container flex px-5 py-24 mx-auto">
        <button class="px-6 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">Button</button>
    </div>
    </div>
  </section>


    {{-- End Map  --}}

    <div class="flex-row max-w-screen-lg gap-5 mx-auto lg:flex md:mt-10 ">
        {{-- Frequently Asked Questions--}}

        <div class="w-full mx-auto mt-5 ">
            <div class="flex flex-row justify-center gap-5">
                <div class="horizontal-line-2"></div>
                <p class="text-2xl font-bold text-center text-blue-600 md:mt-5">
                    Frequently Asked Questions
                </p>
                <div class="horizontal-line-2"></div>
            </div>


            {{-- ACCORDIAN --}}



        <div class="max-w-screen-xl px-5 mx-auto bg-white border border-black min-h-sceen md:mt-10">
            <div class="grid max-w-xl mx-auto mt-8 divide-y divide-neutral-200">
                <div class="py-3">
                    <details class="group">
                        <summary class="flex items-center justify-between font-medium list-none cursor-pointer">
                            <span> What is a SAAS platform?</span>
                            <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                        </summary>
                        <p class="mt-3 text-neutral-600 group-open:animate-fadeIn">
                            SAAS platform is a cloud-based software service that allows users to access
                            and use a variety of tools and functionality.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex items-center justify-between font-medium list-none cursor-pointer">
                            <span> How does  billing work?</span>
                            <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                        </summary>
                        <p class="mt-3 text-neutral-600 group-open:animate-fadeIn">
                            We offers a variety of billing options, including monthly and annual subscription plans,
                            as well as pay-as-you-go pricing for certain services. Payment is typically made through a credit
                            card or other secure online payment method.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex items-center justify-between font-medium list-none cursor-pointer">
                            <span> Can I get a refund for my subscription?</span>
                            <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                        </summary>
                        <p class="mt-3 text-neutral-600 group-open:animate-fadeIn">
                            We offers a 30-day money-back guarantee for most of its subscription plans. If you are not
                            satisfied with your subscription within the first 30 days, you can request a full refund. Refunds
                            for subscriptions that have been active for longer than 30 days may be considered on a case-by-case
                            basis.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex items-center justify-between font-medium list-none cursor-pointer">
                            <span> How do I cancel my subscription?</span>
                            <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                        </summary>
                        <p class="mt-3 text-neutral-600 group-open:animate-fadeIn">
                            To cancel your We subscription, you can log in to your account and navigate to the
                            subscription management page. From there, you should be able to cancel your subscription and stop
                            future billing.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex items-center justify-between font-medium list-none cursor-pointer">
                            <span> Can I try this platform for free?</span>
                            <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                        </summary>
                        <p class="mt-3 text-neutral-600 group-open:animate-fadeIn">
                            We offers a free trial of its  platform for a limited time. During the trial period,
                            you will have access to a limited set of features and functionality, but you will not be charged.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex items-center justify-between font-medium list-none cursor-pointer">
                            <span> How do I access   documentation?</span>
                            <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                        </summary>
                        <p class="mt-3 text-neutral-600 group-open:animate-fadeIn">
                            Documentation is available on the company's website and can be accessed by
                            logging in to your account. The documentation provides detailed information on how to use the ,
                            as well as code examples and other resources.
                        </p>
                    </details>
                </div>
            </div>
        </div>


            {{-- END ACCORDIAN --}}
        </div>
        {{-- END  Frequently Asked Questions--}}

        {{-- GET IN TOUCH FORM --}}

        <div class="w-10/12 mx-auto mt-5">
            <div class="flex flex-row justify-center w-full gap-5">
                <div class="horizontal-line-2"></div>
                <p class="text-2xl font-bold text-center text-blue-600 md:mt-5">
                    Get In Touch
                </p>
                <div class="horizontal-line-2"></div>
            </div>

            {{-- FORM --}}
            <form class="w-full md:mt-10">
                <div class="flex flex-row gap-2 md:mt-2">
                    <div class="w-1/2">
                        <label
                            >Name: <span class="text-red-500"> *</span></label
                        >
                        <input
                            class="w-full px-3 py-2 text-gray-700 border border-black rounded-md"
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
                            class="w-full px-3 py-2 text-gray-700 border border-black rounded-md"
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
                            class="w-full px-3 py-2 text-gray-700 border border-black rounded-md"
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
                            class="w-full px-3 py-2 text-gray-700 border border-black rounded-md"
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
                            class="w-full h-32 px-3 py-2 text-gray-700 border border-black rounded-md"
                            id="phone
                            type="text"
                            placeholder=""
                        />
                    </div>
                </div>

                <div class="mt-5 text-center md:mt-10 md:text-left">
                    <button class="bg-gradient-to-b from-[#166EB6] to-[#284297] text-white w-32 md:px-2 md:py-2 ">Submit</button>
                </div>
            </form>
        </div>
        {{-- END GET IN TOUCH FORM --}}
    </div>


<script>
	...
	extend: {
      keyframes: {
        fadeIn: {
          "0%": { opacity: 0 },
          "100%": { opacity: 100 },
        },
      },
      animation: {
        fadeIn: "fadeIn 0.2s ease-in-out forwards",
      },
    },
    ...
</script>

@endsection
