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



<div class="max-w-screen-xl mx-auto px-5 bg-white min-h-sceen border-2 border-black md:mt-10">
	<div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
		<div class="py-3">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> What is a SAAS platform?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					 SAAS platform is a cloud-based software service that allows users to access
					and use a variety of tools and functionality.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> How does  billing work?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					We offers a variety of billing options, including monthly and annual subscription plans,
					as well as pay-as-you-go pricing for certain services. Payment is typically made through a credit
					card or other secure online payment method.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> Can I get a refund for my subscription?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					We offers a 30-day money-back guarantee for most of its subscription plans. If you are not
					satisfied with your subscription within the first 30 days, you can request a full refund. Refunds
					for subscriptions that have been active for longer than 30 days may be considered on a case-by-case
					basis.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> How do I cancel my subscription?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					To cancel your We subscription, you can log in to your account and navigate to the
					subscription management page. From there, you should be able to cancel your subscription and stop
					future billing.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> Can I try this platform for free?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					We offers a free trial of its  platform for a limited time. During the trial period,
					you will have access to a limited set of features and functionality, but you will not be charged.
				</p>
			</details>
		</div>
		<div class="py-5">
			<details class="group">
				<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
					<span> How do I access   documentation?</span>
					<span class="transition group-open:rotate-180">
                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
</svg>
              </span>
				</summary>
				<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
					  Documentation is available on the company's website and can be accessed by
					logging in to your account. The documentation provides detailed information on how to use the ,
					as well as code examples and other resources.
				</p>
			</details>
		</div>
	</div>
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
            <form class="w-full md:mt-10">
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
                            class="border-2 border-black py-2 px-3 text-gray-700 w-full h-32"
                            id="phone
                            type="text"
                            placeholder=""
                        />
                    </div>
                </div>

                <div class="md:mt-10 ">
                    <button class="bg-gradient-to-b from-[#166EB6] to-[#284297] text-white w-32 md:px-2 md:py-2">Submit</button>
                </div>
            </form>
        </div>
        {{-- END GET IN TOUCH FORM --}}
    </div>
</div>

@endsection
