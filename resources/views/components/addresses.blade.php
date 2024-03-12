@props([
    'user' => null,
    'show_save' => false
])

<div class="w-full flex flex-col gap-4">
    <h1 class="text-lg font-bold">Billing address</h1>
    <label class="font-medium text-sm">Enter the billing address</label>
    <div class="bg-white rounded" id="billing_form">
        <x-address-form :prefix=" 'billing_' " :address="$user?->address_billing"/>
        @if($show_save)
        <div class="flex gap-2 items-center">
            <input id="save_billing" name="save_billing" type="checkbox" value="1" class="h-4 w-4 rounded-full shadow" @checked(old('save_billing'))>
            <label for="save_billing" class="font-medium text-sm">Save as default</label>
        </div>
        @endif
    </div>
</div>

<div class="w-full flex flex-col gap-4">
    <h1 class="text-lg font-bold">Shipping address</h1>
    <div class="flex gap-2 items-center">
        <input id="ship_elsewhere"
            name="ship_elsewhere"
            type="checkbox"
            value="1"
            class="h-4 w-4 rounded-full shadow"
            onchange="ship_elsewhere_update()" 
            @checked(old('ship_elsewhere', !$show_save && ($user?->address_shipping ? true : false)))>
        <label for="ship_elsewhere" class="font-medium text-sm">Ship to a different address</label>
    </div>
    <div class="bg-white rounded" id="shipping_form">
        <x-address-form :prefix=" 'shipping_' " :address="$user?->address_shipping"/>
        @if($show_save)
        <div class="flex gap-2 items-center">
            <input id="save_shipping" name="save_shipping" type="checkbox" value="1" class="h-4 w-4 rounded-full shadow" @checked(old('save_shipping'))>
            <label for="save_shipping" class="font-medium text-sm">Save as default</label>
        </div>
        @endif
    </div>
</div>

<script>
    ship_elsewhere = document.getElementById('ship_elsewhere');
    shipping_address_form = document.getElementById('shipping_form');

    function ship_elsewhere_update(){
        if(ship_elsewhere.checked){
            shipping_address_form.style.display = 'block';
        } else{
            shipping_address_form.style.display = 'none';
        }
    }

    ship_elsewhere_update();
</script>