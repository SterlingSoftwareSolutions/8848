<footer class="bg-white shadow-inner md:mt-8" style="z-index: -999;">
    <div class="w-full p-4 py-8 mx-auto max-w-screen-3xl lg:py-16 md:ml-20">

        <div class="md:flex md:justify-between">

            <div class="mb-6 md:mb-0 md:w-1/3">
                <a href="" class="grid items-center justify-center text-center">
                    <p class="text-[25px] font-bold text-blue-600">ECOM</p>

                    <p class="mt-4  text-center text-black">Lorem Ipsum Dolor Sit<br> Amet, Consectetur</p>
                </a>
            </div>

            <div class="flex flex-col gap-5 md:w-6/12 md:flex-row">
                <img class=" md:w-[150px] m-auto mr-auto" src="{{ URL('images/iphone-x-mockup.png')}}">

                <div class="flex flex-col ml-8 text-center md:text-left">
                    <h1 class="text-2xl font-bold">Download</h1>
                    <h2 class="text-xl font-semibold">ECOM Supplies Mobile App</h2>
                    <p class="mt-2 text-black">Lorem Ipsum Dolor Sit Amet, Consectetur<br>Adipiscing Elit. Sed Non Risus. Suspendisse<br>Lectus Tortor, Dignissim Sit Amet,</p>
                    <img class="h-auto mx-auto mt-4 md:-ml-[2px] w-28 " src="{{ URL('images/Download-on-the-App-Store-1.png')}}">
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 md:ml-20">
                <div class="text-center sm:text-left">
                    <h2 class="mb-2 text-lg font-semibold text-blue-900 uppercase">Buyer Central</h2>
                    <ul class="text-gray-500">
                        <li><a href="/" class="hover:underline">Home</a></li>
                        <li><a href="/products" class="hover:underline">Shop</a></li>
                        <li><a href="/contact" class="hover:underline">Contact Us</a></li>
                        <li><a href="/profile" class="hover:underline">My Account</a></li>
                    </ul>
                </div>

                <div class="text-center sm:text-left"> <!-- Center on mobile, left-align on screens bigger than mobile -->
                    <h2 class="mb-2 text-lg font-semibold text-blue-900 uppercase">Contact Info</h2>
                    <ul class="text-gray-500">
                        <li class="flex mb-4">
                            <img class="w-5 h-5" src="{{ URL('images/location.png')}}">
                            <a href="https://www.google.com/maps/@-26.7738869,134.7806741,12.75z?entry=ttu" class="ml-2 hover:underline  md:text-left text-center">Unit 3/1 Everaise Ct, Laverton North VIC 3026</a>
                        </li>
                        <li class="flex mb-4 ml-12 md:ml-0">
                            <img class="w-5 h-5" src="{{ URL('images/email.png')}}">
                            <a href="mailto:info@ECOMsupplies.com.au" class="ml-2 hover:underline">info@ECOMsupplies.com.au</a>

                        </li>
                        <li class="flex mb-4 ml-20 md:ml-0">
                            <img class="w-5 h-5" src="{{ URL('images/telephone.png')}}">
                            <a href="tel:8801 738 5678 64" class="ml-2 hover:underline">(03) 7014 0663<br>61 1300 850 295</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>

    <div class="h-10 text-center text-black font-semibold bg-blue-200 sm:text-center flex justify-center items-center">
        <span class="mt-2 text-sm">Copyright © 2023 <a href="#" class="hover:underline">ECOM Supplies. All Rights Reserved</a></span>
    </div>

</footer>