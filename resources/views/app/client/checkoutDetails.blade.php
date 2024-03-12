<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Order Details</title>

</head>

<body>
    <div class="container min-w-fit mx-auto mt-10 p-4 sm:px-6 md:px-8 w-6/12">
        <!-- Order place details -->
        <div class="pb-5">
            <p class="text-gray-500">Order #<span id="orderNumber" class="text-black">1695</span> was placed on <span id="orderDate" class="text-black">October 6, 2023</span> and is currently <span id="orderStatus" class="text-black">On hold</span>.</p>
        </div>
        <!-- Heading -->
        <div class="mb-5">
            <h1 class="text-5xl">
                Order details
            </h1>
        </div>
        <!-- Order Details -->
        <div class="relative overflow-x-auto border border-gray-300">
            <!-- Oder Items -->
            <div class="px-5">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-blue-500 whitespace-nowrap">
                                ECOM Test Product 04
                                <span class="text-gray-500">x</span>
                                <span class="text-gray-500">1</span>
                            </th>
                            <td class="px-6 py-4 w-6/12">
                                $10.30
                            </td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-blue-500 whitespace-nowrap">
                                ECOM Test Product 04
                                <span class="text-gray-500">x</span>
                                <span class="text-gray-500">1</span>
                            </th>
                            <td class="px-6 py-4">
                                $10.30
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- Order Price Detils -->
            <div class="mb-5 px-5">
                <div class="flex flex-row border-b border-gray-300">
                    <div class="w-6/12 px-6 py-3">
                        <label for="">Subtotal:</label>
                    </div>
                    <div class="w-6/12 px-6 py-3">
                        <label for="">$57.30</label>
                    </div>
                </div>
                <div class="flex flex-row border-b border-gray-300">
                    <div class="w-6/12 px-6 py-3">
                        <label for="">Payment method:</label>
                    </div>
                    <div class="w-2/6/12 px-6 py-3">
                        <label for="">Direct bank transfer</label>
                    </div>
                </div>
                <div class="flex flex-row ">
                    <div class="w-6/12 px-6 py-3">
                        <label for="">Total:</label>
                    </div>
                    <div class="w-6/12 px-6 py-3">
                        <label for="">$57.30</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Billing address heading -->
        <div class="my-5 ">
            <h1 class="text-5xl">
                Billing Address
            </h1>
        </div>

        <!-- Billing address box -->
        <div class="text-gray-400 font-light flex flex-col border border-gray-300">
            <div class="px-11 py-5">
                <div>
                    <label id="txtComapnyName">Holden and Knapp Trading</label>
                </div>
                <div>
                    <label id="txtFirstName">Evangeline</label>
                    <label id="txtLastName">Holloway</label>
                </div>
                <div>
                    <label id="txtStreetAdress">94 Rocky First Street</label>
                </div>
                <div>
                    <label id="txt">Illo eum aut ipsam v</label>
                </div>
                <div>
                    <label id="txtPostCode">1343</label>
                    <label id="txtTown">Est laboriosam et</label>
                </div>
                <div>
                    <label id="txtCountry">Norway</label>
                </div>
                <div>
                    <span><i class="fa-solid fa-phone"></i></span>
                    <label id="txtPhone">2862777806</label>
                </div>
                <div>
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <label id="txtEmail">bevemus@mailinator.com</label>
                </div>
            </div>
        </div>
    </div>
</body>

</html>