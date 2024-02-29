@extends('layouts.admin')
@section('content')

@if($order->status == 'unverified' && $order->order_type == 'wholesale')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script type="text/javascript">
    function getData() {
        return {
            // Show Modal
            showProductPicker: false,

            // Input
            searchQuery: null,
            selectedCategoryId: null,
            selectedSubCategoryId: null,
            selectedProducts: {},
            selectedVariants: [],

            // Data
            categories: [],
            subCategories: [],
            products: [],

            // Functions
            fetchCategories() {
                fetch(`/api/categories`)
                    .then((res) => res.json())
                    .then((data) => {
                        this.categories = data.categories;
                    });
            },

            fetchSubCategories(){
                this.selectedSubCategoryId = null;
                fetch(`/api/categories/${this.selectedCategoryId}`)
                    .then((res) => res.json())
                    .then((data) => {
                        this.subCategories = data?.category?.children ?? [];
                    });
            },

            fetchProducts(){
                fetch(`/api/products?limit=5&category_id=${this.selectedSubCategoryId ?? this.selectedCategoryId ?? ''}&q=${this.searchQuery ?? ''}`)
                    .then((res) => res.json())
                    .then((data) => {
                        this.products = data.products ?? [];
                    });
            },

            addProduct(product){
                // Check if a variant is selected
                if(this.selectedVariants[product.id] === undefined){
                    variant = product.variants[0]; // No variant selected, select first one
                } else {
                    variant = product.variants[this.selectedVariants[product.id]];
                }

                // Increase quantity if item is already added
                quantity = (this.selectedProducts[product.id + '.' + variant.id]?.quantity ?? 0) + 1;

                this.selectedProducts[product.id + '.' + variant.id] = {
                    product: product,
                    variant: variant,
                    quantity: quantity
                };
            },

            selectVariant(variantIndex, product){
                this.selectedVariants[product.id] = variantIndex;
            }
        };
    }
</script>
@endif

<div @if($order->status == 'unverified' && $order->order_type == 'wholesale') x-data="getData()" @endif>
    {{-- EDIT ORDER FORM --}}
    <form class="p-8 ps-0" method="post" action="/admin/orders/{{$order->id}}">
        @csrf
        @method('put')
        <div class="md:mb-5">
            {{-- Order --}}
            <div class="flex flex-row text-gray-700 mx-2 gap-12 bg-gray-100 border items-start rounded-lg p-5">
                    <div class="text-start">
                        <div class="font-semibold mb-2">Customer</div>
                        @if($order->user)
                            {{$order->user->first_name}} {{$order->user->last_name}}<br>
                            {{$order->user->email}}
                        @else
                            <div class="text-red-500 mb-2">No User</div>
                        @endif
                    </div>
                    <div class="text-start">
                        <div class="font-semibold mb-2">Status</div>
                        <select class="p-3 bg-blue-50 border-blue-300 w-40 border rounded-lg" name="status">
                            <option value="unverified" @if($order->status == 'unverified' && $order->order_type == 'wholesale') selected @endif>Unverified</option>
                            <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                            <option value="processing" @if($order->status == 'processing') selected @endif>Processing</option>
                            <option value="shipped" @if($order->status == 'shipped') selected @endif>Shipped</option>
                            <option value="delivered" @if($order->status == 'delivered') selected @endif>Delivered</option>
                            <option value="returned" @if($order->status == 'returned') selected @endif>Returned</option>
                            <option value="canceled" @if($order->status == 'canceled') selected @endif>Canceled</option>
                            <option value="rejected" @if($order->status == 'rejected') selected @endif>Rejected</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>
                    <div class="text-start">
                        <div class="font-semibold mb-2">Payment Status</div>
                        <select class="p-3 bg-blue-50 border-blue-300 w-40 border rounded-lg" name="payment_status">
                            <option value="unpaid" @if($order->payment_status == 'unpaid') selected @endif>Unpaid</option>
                            <option value="paid" @if($order->payment_status == 'paid') selected @endif>Paid</option>
                            <option value="partial" @if($order->payment_status == 'partial') selected @endif>Partial</option>
                            <option value="refunded" @if($order->payment_status == 'refunded') selected @endif>Refunded</option>
                        </select>
                        <x-input-error :messages="$errors->get('payment_status')" class="mt-2" />
                    </div>
                    <div class="text-start">
                        <div class="font-semibold mb-2">Order Type {{$order->type }}</div>
                        <select class="p-3 bg-blue-50 border-blue-300 w-40 border rounded-lg" name="order_type">
                            <option value="wholesale" @if($order->order_type == 'wholesale') selected @endif>Wholesale Order</option>
                            <option value="retail" @if($order->order_type == 'retail') selected @endif>Retail Order</option>
                        </select>
                        <x-input-error :messages="$errors->get('order_type')" class="mt-2" />
                    </div>
                    <div class="text-start ms-auto">
                        <b class="font-semibold">Date:</b> {{$order->created_at}}
                    </div>
                </div>

                {{-- Customer Detais End --}}
                <div class="flex flex-col mx-2 mt-4 border rounded-lg">
                    <div class="text-blue-900">
                        <div class="flex flex-row p-5 bg-gray-100">
                            <p class="w-[15%] text-start font-semibold">Product</p>
                            <p class="w-[40%] text-start font-semibold"></p>
                            <p class="w-[15%] text-start font-semibold">Price</p>
                            <p class="w-[15%] text-start font-semibold">Custom Price</p>
                            <p class="w-[15%] text-start font-semibold">Quantity</p>
                            <p class="w-[15%] text-start font-semibold">Subtotal</p>
                        </div>
                    @if($order->items->count() < 1) 
                        <div class="flex flex-row items-center p-5" x-show="Object.keys(selectedProducts).length < 1">
                            <div class="w-full text-center py-12">This order has no products</div>
                        </div>
                    @else
                    @php
                        $content_editable = ($order->status == 'unverified' && $order->order_type == 'wholesale' || $order->status == 'pending') && $order->order_type != 'retail';
                    @endphp
                    <!-- Order items -->
                    @foreach($order->items as $item)
                    <x-order-item-row :item="$item" :admin="$content_editable" />
                    @endforeach
                    @endif

                    @if($order->status == 'unverified' && $order->order_type == 'wholesale')
                    <template x-for="(item, index) in selectedProducts">
                        <div class="flex flex-row items-center p-2 border bg-blue-50">
                            <input type="hidden" x-bind:name="'item_variant_0' + index" x-bind:value="item.variant.id">
                            <p class="w-[15%] px-5">
                                <img x-bind:src="item.product.image_1" alt="Product Image" class="max-w-[60px] aspect-square">
                            </p>

                            <div class="w-[40%] px-5" x-text="item.product.title + ' - ' + item.variant.name "></div>

                            <div class="w-[15%] px-5" x-text="'$' + item.variant.price"></div>

                            <div class="w-[15%] px-5">
                                $<input x-bind:name="'item_price_0' + index" type="number" x-bind:value="item.variant.price" class="max-w-[60px] ms-2">
                            </div>

                            <div class="w-[15%] px-5">
                                <input x-bind:name="'item_quantity_0' + index" type="number" x-bind:value="item.quantity" class="max-w-[60px] ms-2">
                            </div>
                            <div class="w-[15%] px-5" x-text="'$' + (item.quantity * item.variant.price)"></div>
                            <button type="button" x-on:click="delete selectedProducts[index]" class="right-10 fa fa-close me-4 text-red-800"></button>
                        </div>
                    </template>
                    @endif
                </div>
            </div>

            {{-- Totals --}}
            <div class="flex flex-col mx-2  md:mt-5 border rounded-lg">
                <div class="text-blue-900">
                    <div class="flex flex-row justify-between items-center p-5 bg-gray-100">
                        <button class="bg-blue-200 disabled:bg-gray-200 disabled:text-gray-300 w-32 rounded h-10" @if($order->status == 'unverified' && $order->order_type == 'wholesale') x-on:click="showProductPicker = true" @else disabled @endif type="button">Add Item</button>
                        <p class="w-full text-start font-semibold"></p>
                        <div class="w-1/6 text-start font-semibold">
                            Products: <br>
                            <p class="text-xl">{{$order->items->count()}}</p>
                        </div>
                        <div class="w-1/6 text-start font-semibold">
                            Quantity: <br>
                            <p class="text-xl">{{$order->items->sum('quantity')}}</p>
                        </div>
                        @if(!Auth::user()->is_wholesale())
                        <div class="w-1/6 text-start font-semibold">
                            Amount: <br>
                            <p class="text-xl">${{$order->total()}}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Notes --}}
            <div class="flex flex-col mx-2  md:mt-5 border rounded-lg">
                <div class="text-blue-900">
                    <div class="items-center p-5 bg-gray-100">
                        <p class="font-bold">Notes:</p>
                        <p>{{$order->notes}}</p>
                    </div>
                </div>
            </div>
        </div>

        {{--
        <div class="border-2 py-5 px-5 md:mt-5 mx-2">
            <p class="text-center font-bold">Payment Details</p>

            <div class="flex flex-row justify-between md:mt-5">
                <p> Payment ID</p>
                <p> Payment Date</p>
                <p> Payment Method</p>
                <p> Card Number</p>
                <p> Amount</p>
                <p> Balance</p>
                <p> Status</p>
            </div>
        </div>
        --}}

        {{-- ADDRESSES --}}
        <div class="flex flex-row w-full text-blue-900">
            <div class="w-6/12 border rounded-lg bg-gray-100 mx-2">
                <p class="font-bold px-5 pt-5">Billing Address</p>

                <div class="p-5 flex gap-4">
                    <div>
                        <p><b>First Name:</b> {{$order->billing_first_name}}</p>
                        <p><b>Last Name:</b> {{$order->billing_last_name}}</p>
                        <p><b>Phone:</b> {{$order->billing_phone}}</p>
                        <p><b>Company:</b> {{$order->billing_company}}</p>
                        <p><b>Address:</b> {{$order->billing_address_line_1}}</p>
                        <p>{{$order->billing_address_line_2}}</p>
                    </div>
                    <div>
                        <p><b>City:</b> {{$order->billing_city}}</p>
                        <p><b>ZIP:</b> {{$order->billing_zip}}</p>
                        <p><b>State:</b> {{$order->billing_state}}</p>
                    </div>
                </div>
            </div>

            <div class="w-6/12 border rounded-lg bg-gray-100 mx-2">
                <p class="font-bold px-5 pt-5">Shipping Address</p>
                <div class="p-5 flex gap-4">
                    <div>
                        <p><b>First Name:</b> {{$order->shipping_first_name}}</p>
                        <p><b>Last Name:</b> {{$order->shipping_last_name}}</p>
                        <p><b>Phone:</b> {{$order->shipping_phone}}</p>
                        <p><b>Company:</b> {{$order->shipping_company}}</p>
                        <p><b>Address:</b> {{$order->shipping_address_line_1}}</p>
                        <p>{{$order->shipping_address_line_2}}</p>
                    </div>
                    <div>
                        <p><b>City:</b> {{$order->shipping_city}}</p>
                        <p><b>ZIP:</b> {{$order->shipping_zip}}</p>
                        <p><b>State:</b> {{$order->shipping_state}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end mx-auto md:mt-5">
            <a href="/admin/orders/{{$order->id}}/print"><button type="button" class="border-2 border-gray-700 bg-gray-800 text-white py-2 px-5 rounded-lg w-40 mx-2">Print Invoice</button></a>
            <button type="submit" class="border-2 border-blue-700 bg-blue-800 text-white py-2 px-5 rounded-lg w-40 mx-2">Save</button>
        </div>
    </form>

    @if($order->status == 'unverified' && $order->order_type == 'wholesale')
    {{-- FIND PRODUCT --}}
    <div class="relative z-10" role="dialog" x-show="showProductPicker" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 backdrop-blur-sm backdrop-contrast-125 bg-opacity-75 transition-opacity" x-show="showProductPicker" x-transition.opacity x-on:click="showProductPicker = false"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full justify-center text-center md:items-center items-stretch">
                <div class="relative transform md:rounded-lg bg-white text-left shadow-xl transition-all" x-on:click.outside="showProductPicker = false" x-show="showProductPicker" x-transition>
                    <button class="absolute right-0 -translate-y-[20%] text-gray-400 font-thin text-4xl w-8 h-8" x-on:click="showProductPicker = false">×</button>
                    <div class="flex flex-col p-5 gap-4 text-gray-800 w-full h-full md:w-[800px]">
                        <h1 class="text-lg font-bold">Find Products</h1>
                        <div class="w-full flex justify-between">
                            <div class="flex items-center gap-2 w-full">
                                <div class="flex flex-col gap-1 w-1/3" x-init="fetchCategories()">
                                    <label for="category">Category</label>
                                    <select class="p-2 bg-gray-50 border-gray-300 border rounded-lg me-3 w-full disabled:bg-gray-200 disabled:border-gray-600" name="category" x-model="selectedCategoryId" x-on:change="() => {fetchSubCategories(); fetchProducts();}">
                                        <option value="">SELECT CATEGORY</option>
                                        <template x-for="category in categories">
                                            <option x-text="category.name" x-bind:value="category.id"></option>
                                        </template>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1 w-1/3">
                                    <label for="sub_category">Sub Category</label>
                                    <select class="p-2 bg-gray-50 border-gray-300 border rounded-lg me-3 w-full disabled:bg-gray-200 disabled:border-gray-600" name="sub_category" x-model="selectedSubCategoryId" x-bind:disabled="subCategories.length === 0" x-on:change="fetchProducts()">
                                        <option value="">SELECT SUB CATEGORY</option>
                                        <template x-for="subCategory in subCategories">
                                            <option x-text="subCategory.name" x-bind:value="subCategory.id"></option>
                                        </template>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1 w-1/3">
                                    <label for="search">Search</label>
                                    <input class="p-2 bg-gray-50 border-gray-300 rounded-lg h-10 border" x-model="searchQuery" id="search" @keyup.enter="fetchProducts()"/>
                                </div>
                                <button class="bg-gray-300 p-2 h-10 w-10 rounded-lg mt-auto fa fa-search" x-on:click="fetchProducts()"></button>
                            </div>
                        </div>
                        <hr>
                        <div class="flex flex-col gap-2 h-full md:h-[425px] overflow-auto" x-init="$nextTick(() => { fetchProducts() })">
                            <template x-for="product in products">                                
                                <div class="w-full p-2 gap-4 bg-gray-100 rounded-lg flex items-center">
                                    <img class="w-1/12 rounded-lg bg-white aspect-square object-cover" x-bind:src="product.image_1"
                                        alt="Product Image">
                                    <h3 class="w-3/12" x-text="product.title">Product Title</h3>
                                    <h3 class="w-3/12" x-text="product.category_name">Category</h3>
                                    <select class="w-3/12 bg-transparent" x-on:change="selectVariant(event.target.value, product)">
                                        <template x-for="(variant, index) in product.variants">
                                            <option x-text="variant.name + ' - $' + variant.price" x-bind:value="index"></option>
                                        </template>
                                    </select>
                                    <button class="h-10 w-10 rounded-lg transition-colors hover:bg-blue-100 hover:text-blue-600 bg-gray-50 border border-gray-300 text-gray-600" x-on:click="addProduct(product)">+</button>
                                </div>
                            </template>
                            <div x-show="products.length === 0" class="flex flex-col justify-center items-center gap-3 h-full">
                                <span class="fa fa-search text-9xl opacity-5 absolute"></span>
                                <h1 class="text-lg">No products matching your criteria</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection