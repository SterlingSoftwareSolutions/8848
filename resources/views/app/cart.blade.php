<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart</title>
</head>
<body>
    <div class="container min-w-fit mx-auto mt-10 p-4 sm:px-6 md:px-8">
       <!-- Navigation Bar -->
       <div class="flex flex-col md:flex-row text-blue-800 font-bold gap-1 text-sm md:text-2xl">
            <a href="">Home</a>
            <span>/</span>
            <span>Cart</span>
        </div>
        <!-- Alert -->
        <div class="mt-5">
            <!-- Added Notification -->
            <div class="bg-white border-t-4 border-lime-600 shadow-lg rounded-md flex flex-col sm:flex-row my-3">
                <!-- ICON -->
                <div class="md:ml-10 sm:ml-0 mt-5 text-lime-600"><i class="fa-solid fa-circle-check"></i></div>
                <!-- text -->
                <div class="flex justify-start mt-5 ml-5 font-light"><p>“8848 Test Product 01” has been added to your cart.</p></div>
                <!-- Button -->
                <div class="ml-auto mt-3">
                    <button type="button" class="font-light text-red-700 hover:text-indigo-950 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        View Cart
                    </button>
                </div>
            </div>
            <!-- Not In Stock Notification -->
            <div class="bg-white border-t-4 border-red-700 shadow-lg rounded-md flex flex-col sm:flex-row pb-5">
                <!-- ICON -->
                <div class="md:ml-10 sm:ml-0 mt-5 text-red-700"><i class="fa-solid fa-circle-exclamation"></i></div>
                <!-- text -->
                <div class="flex justify-start mt-5 ml-5 font-light"><p>Sorry, "8848 Test product 03" is not in stock. Please edit your cart and try again. We apologize for any inconvenience caused.</p></div>
                <!-- Button -->
                <div class="ml-auto mt-3 hidden">
                    <button type="button" class="text-red-700 font-light hover:text-indigo-950 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        View Cart
                    </button>
                </div>
            </div>
            <!-- Out Of Stock Notification -->
            <div class="bg-white border-t-4 border-red-700 shadow-lg rounded-md flex flex-col sm:flex-row mt-5 pb-5">
                <!-- ICON -->
                <div class="md:ml-10 sm:ml-0 mt-5 text-red-700"><i class="fa-solid fa-circle-exclamation"></i></div>
                <!-- text -->
                <div class="flex justify-start mt-5 ml-5 font-light"><p>You cannot add "8848 Test product 03" to the cart because the product is out of stock.</p></div>
                <!-- Button -->
                <div class="ml-auto mt-3 hidden">
                    <button type="button" class="font-light text-red-700 hover:text-indigo-950 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        View Cart
                    </button>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="relative overflow-x-auto mt-10">
            <table class="w-full font-light text-xl text-center text-gray-500 dark:text-gray-400">
                <thead class="text-lg text-gray-6600 capitalize font-light">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-start w-3/12">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3 w-3/12">
                            
                        </th>
                        <th scope="col" class="px-6 py-3 w-1/12">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 w-2/12">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3 w-2/12">
                            Subtotal
                        </th>
                        <th scope="col" class="px-6 py-3 w-1/12">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border border-black font-light">
                        <!-- Image -->
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-3/12">
                            <img src="{{asset('images/su-san-lee-g3PyXO4A0yc-unsplash.jpg')}}" alt="Image Description" class="w-3/12 sm:w-6/12"/>
                        </td>
                        <!-- Product Name -->
                        <td class="px-6 py-4 text-start text-blue-900 w-3/12">
                            Apple MacBook Pro 17"
                        </td>
                        <!-- Price -->
                        <td class="px-6 py-4 w-1/12">
                            $2999
                        </td>
                        <!-- Quantity -->
                        <td class="px-6 py-8 mt-8 flex items-center justify-center space-x-2">
                            <button class="w-8 h-8">-</button>
                            <h3 class="w-8 text-center text-blue-900">2</h3>
                            <button class="w-8 h-8">+</button>
                        </td>
                        <!-- Subtotal -->
                        <td class="px-6 py-4 text-blue-900 w-2/12">
                            $2999
                        </td>
                        <!-- Delete icon -->
                        <td class="px-6 py-4">
                            <i class="fa-solid fa-trash-can w-1/12"></i>
                        </td>
                    </tr>
                    <tr class="bg-white border border-black">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            
                        </td>
                        <td class="px-6 py-4 text-start text-blue-900">
                            Apple MacBook Pro 17"
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4 flex items-center sm:items-center justify-center space-x-2">
                            <button class="w-8 h-8">-</button>
                            <h3 class="w-8 text-center text-blue-900">2</h3>
                            <button class="w-8 h-8">+</button>
                        </td>
                        <td class="px-6 py-4 text-blue-900">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            <i class="fa-solid fa-trash-can"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Button -->
        <div class="flex flex-col mt-5">
            <div class="flex justify-end "> 
                <div class="md:w-4/12 lg:w-4/12 sm:w-64 h-16">
                    <button class="uppercase bg-blue-800 text-white w-full h-full">Update Cart</button>
                </div>
            </div>
            <div class="flex flex-row justify-end h-16 mt-3">
                <div class="flex flex-row  border border-black md:w-4/12 lg:w-4/12 sm:w-64">
                    <div class="flex justify-start items-center place-items-start w-1/2">
                        <p class="ml-3 text-gray-500">Subtotal</p>
                    </div>
                    <div class="flex justify-end items-center place-items-end w-1/2">
                        <p class="mr-3">$60.15</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-end h-16 mt-3">
                <div class="flex flex-row  border border-black md:w-4/12 lg:w-4/12 sm:w-64">
                    <div class="flex justify-start items-center place-items-start w-1/2">
                        <p class="ml-3 text-gray-500">Total</p>
                    </div>
                    <div class="flex justify-end items-center place-items-end w-1/2">
                        <p class="mr-3">$60.15</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end "> 
                <div class="  md:w-4/12 lg:w-4/12 h-16 sm:w-64 mt-3">
                    <button class="uppercase bg-blue-800 text-white w-full h-full">Checkout</button>
                </div>
            </div>
        </div>
        
    </div>
</body>