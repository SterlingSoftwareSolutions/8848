<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include the necessary Tailwind CSS file -->
    <!-- Example: <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet"> -->

    <style>
        .checkout-bg {
            background-image: url("{{ asset('images/composition-cleaning-objects-with-copyspace@0.5x.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position:  25% 75%; /* Adjust the background position */
            text-align: center;
            padding: 100px; /* Adjust the padding as needed */
            color: white; /* Text color on top of the background */
        }
        
        .checkout-text {
            @apply text-red-500 font-bold text-center md:mt-10;
            font-size: 48px; /* Increase the font size for larger text */
            text-decoration: underline; /* Add an underline */
        }
        
        .thank-you-text {
            text-align: left; /* Align the text to the left */
            margin-left: 20px; /* Add left margin for spacing */
            font-size: 24px; /* Adjust the font size as needed */
        }
        
        .order-table {
            @apply w-full mt-4 border-collapse border border-gray-300;
        }
        
        /* Add a dotted border to all table cells */
        .order-table th,
        .order-table td {
            border-right: 1px dotted #ccc; /* Add a dotted border on the right side of each cell */
        }
        
        /* Remove the border on the last cell in each row to avoid extra lines */
        .order-table th:last-child,
        .order-table td:last-child {
            border-right: none;
        }

        /* Apply classes to style the first row differently */
        .order-table thead tr {
            /* Normal style for column headers */
        }
        
        /* Apply classes to style column headers differently */
        .order-table th {
            @apply font-normal;
        }

        /* Apply a class to style the content rows differently */
        .content-row {
            @apply bg-gray-700 text-white; /* Dark background and white text */
        }

        /* Style for larger "Order Details" text */
        .order-details-text {
            font-size: 36px; /* Adjust the font size for larger text */
            font-weight: bold; /* Make the text bold */
        }

        /* Style for vertical alignment */
        .vertical-table {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Adjust the gap between items */
        }

        /* Style for vertical alignment of labels */
        .label {
            font-weight: bold;
        }

        /* Style for the billing address box */
        .billing-address-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
        }

        /* Style for the billing address heading */
        .billing-address-heading {
            font-weight: bold;
            font-size: 24px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1 class="checkout-text checkout-bg">
        Checkout
    </h1>
    <div class="thank-you-text">
        Thank you. Your order has been received.
    </div>
    <table class="order-table">
        <thead>
            <tr>
                <th class="w-1/5">ORDER NUMBER:</th>
                <th class="w-1/5">DATE:</th>
                <th class="w-1/5">EMAIL:</th>
                <th class="w-1/5">TOTAL:</th>
                <th class="w-1/5">PAYMENT METHOD:</th>
            </tr>
        </thead>
        <tbody>
            <tr class="content-row">
                <td class="w-1/5">12345</td>
                <td class="w-1/5">2023-10-10</td>
                <td class="w-1/5">example@email.com</td>
                <td class="w-1/5">$100.00</td>
                <td class="w-1/5">Credit Card</td>
            </tr>
        </tbody>
    </table>

    <!-- "Order Details" table with vertical alignment -->
    <h2 class="order-details-text">Order Details</h2>
    <table class="vertical-table">
        <tr>
            <td class="label">Order Number:</td>
            <td>12345</td>
        </tr>
        <tr>
            <td class="label">Date:</td>
            <td>2023-10-10</td>
        </tr>
        <tr>
            <td class="label">Email:</td>
            <td>example@email.com</td>
        </tr>
        <tr>
            <td class="label">Product:</td>
            <td>8848 Test Product 06 × 1</td>
        </tr>
        <tr>
            <td class="label">Total:</td>
            <td>$47.00</td>
        </tr>
        <tr>
            <td class="label">Subtotal:</td>
            <td>$47.00</td>
        </tr>
        <tr>
            <td class="label">Payment Method:</td>
            <td>Direct bank transfer</td>
        </tr>
    </table>

    <!-- Billing address heading -->
    <h3 class="billing-address-heading">Billing Address</h3>
    
    <!-- Billing address box -->
    <div class="billing-address-box">
        <p>Thevanankumaran Jegakumaran</p>
        <p>fdsfsdfsf</p>
        <p>353/8g , Mannar road , Vepankulam , Vavuniya</p>
        <p>sfdsfdfsfsfd</p>
        <p>Vavuniya</p>
        <p>43000</p>
        <p>Sri Lanka</p>
        <p>0776999923</p>
        <p>thevanan@yahoo.com</p>
    </div>
</body>
</html>
