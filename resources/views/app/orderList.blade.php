@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart</title>
</head>

<body>
    <div class="container p-4 mx-auto mt-10 min-w-fit sm:px-6 md:px-8">
        <!-- Navigation Bar -->
        <div class="flex flex-col gap-1 text-sm font-bold text-blue-800 md:flex-row md:text-2xl">
            <a href="">Home</a>
            <span>/</span>
            <span>Cart</span>
        </div>
        <!-- Alert -->
        <div class="mt-5">
            <!-- Error Notification -->

            <div class="flex flex-col pb-5 mt-5 bg-white border-t-4 border-red-700 rounded-md shadow-lg sm:flex-row">
                <!-- ICON -->
                <div class="mt-5 text-red-700 md:ml-10 sm:ml-0">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <!-- Text -->
                <div class="flex justify-start mt-5 ml-5 font-light">

                </div>
                <!-- Button -->
                <div class="mt-3 ml-auto">
                    <button type="button" class="text-red-700 hover:text-indigo-950 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        x
                    </button>
                </div>
            </div>

            <!-- Success Notification -->

            <div class="flex flex-col my-3 bg-white border-t-4 rounded-md shadow-lg border-lime-600 sm:flex-row">
                <!-- ICON -->
                <div class="mt-5 md:ml-10 sm:ml-0 text-lime-600">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <!-- Text -->
                <div class="flex justify-start mt-5 ml-5 font-light">

                </div>
                <!-- Button -->
                <div class="mt-3 ml-auto">
                    <button type="button" class="font-light text-red-700 hover:text-indigo-950 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        x
                    </button>
                </div>
            </div>

        </div>

        <form method="post" id="cart_form">

            <!-- Table -->
            <div class="relative mt-10 overflow-x-auto">
                <table class="w-full text-xl font-light text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-lg font-light capitalize border-b text-gray-6600">
                        <!-- Table Headings -->
                        <tr>
                            <th scope="col" class="w-3/12 px-2 py-3 md:w-2/12">
                                Order ID
                            </th>
                            <th scope="col" class="w-1/12 px-2 py-3 md:w-2/12">
                                Price
                            </th>
                            <th scope="col" class="w-2/12 px-2 py-3 md:w-2/12">
                                Status
                            </th>
                            
                            <th scope="col" class="w-2/12 px-2 py-3 md:w-2/12">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-2">
                                <h1 class="">#</h1>
                            </td>
                            <td class="p-2">
                                <span class="">$0 .00</span>
                            </td>
                            <td class="p-2">
                                <span class="p-2 text-sm font-semibold text-green-600 rounded">Approved</span>
                            </td>
                            
                            <td class="flex justify-center p-2">
                                <button class="w-1/3 p-2 text-sm text-black bg-blue-400 rounded">Edit</button>
                                <button class="w-1/3 p-2 ml-3 text-sm text-black bg-red-600 rounded">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">
                                <h1 class="">#</h1>
                            </td>
                            <td class="p-2">
                                <span class="">$0 .00</span>
                            </td>
                            <td class="p-2">
                                <span class="p-2 text-sm font-semibold text-red-600 rounded">Reject</span>
                            </td>
                            <td class="flex justify-center p-2">
                                <button class="w-1/3 p-2 text-sm text-black bg-blue-400 rounded">Edit</button>
                                <button class="w-1/3 p-2 ml-3 text-sm text-black bg-red-600 rounded">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    </form>
    </div>

</body>
<script>
    // JavaScript to handle increment and decrement actions
    const inputElement = document.querySelector('input[name="custom-input-number"]');
    const incrementButton = document.querySelector('[data-action="increment"]');
    const decrementButton = document.querySelector('[data-action="decrement"]');

    incrementButton.addEventListener('click', () => {
        inputElement.value = parseInt(inputElement.value) + 1;
    });

    decrementButton.addEventListener('click', () => {
        const value = parseInt(inputElement.value);
        if (value > 0) {
            inputElement.value = value - 1;
        }
    });
</script>
@endsection