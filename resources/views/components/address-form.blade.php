@props([
'prefix' => '',
'address' => null
])

{{-- name --}}
<div class="flex flex-row mb-4">
    <div class="mb-4 md:mr-2 md:mb-0" style="width: 50%">
        <label class="block mb-2 text-sm font-semibold text-gray-700" for="firstname">
            First Name<span class="text-red-600">*</span>
        </label>
        <input class="w-full px-3 py-2 mr-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="{{$prefix}}first_name" value="{{old( $prefix . 'first_name', $address->first_name ?? null)}}" id="" placeholder="First name" />
        <x-input-error :messages="$errors->get( $prefix . 'first_name')" class="mt-2" />
    </div>
    <div class="md:ml-2" style="width: 50%">
        <label class="block mb-2 text-sm font-semibold text-gray-700" for="lastname">
            Last Name<span class="text-red-600">*</span>
        </label>
        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" name="{{$prefix}}last_name" value="{{old( $prefix . 'last_name', $address->last_name ?? null)}}" id="lastname" placeholder="Last name" />
        <x-input-error :messages="$errors->get( $prefix . 'last_name')" class="mt-2" />
    </div>
</div>

{{-- company --}}
<div class="mb-2">
    <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_name">
        Company Name (optional)
    </label>
    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="company_name" name="{{$prefix}}company" value="{{old( $prefix . 'company', $address->company ?? null)}}" type="text" placeholder="Company Name" />
    <x-input-error :messages="$errors->get( $prefix . 'company')" class="mt-2" />
</div>

{{-- state --}}
<div class="mb-2">
    <label class="block mb-2 text-sm font-semibold text-gray-700" for="company_region">
        State<span class="text-red-600">*</span>
    </label>
    <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="country" name="{{$prefix}}state">
        <option value="">Select</option>
        <option value="New South Wales" @if(old( $prefix . 'state' , $address->state ?? null) == 'New South Wales') selected @endif>New South Wales</option>
        <option value="Queensland" @if(old( $prefix . 'state' , $address->state ?? null) == 'Queensland') selected @endif>Queensland</option>
        <option value="South Australia" @if(old( $prefix . 'state' , $address->state ?? null) == 'South Australia') selected @endif>South Australia</option>
        <option value="Tasmania" @if(old( $prefix . 'state' , $address->state ?? null) == 'Tasmania') selected @endif>Tasmania</option>
        <option value="Victoria" @if(old( $prefix . 'state' , $address->state ?? null) == 'Victoria') selected @endif>Victoria</option>
        <option value="Western Australia" @if(old( $prefix . 'state' , $address->state ?? null) == 'Western Australia') selected @endif>Western Australia</option>
        <option value="Australian Capital Territory" @if(old( $prefix . 'state' , $address->state ?? null) == 'Australian Capital Territory') selected @endif>Australian Capital Territory</option>
        <option value="Northern Territory" @if(old( $prefix . 'state' , $address->state ?? null) == 'Northern Territory') selected @endif>Northern Territory</option>
    </select>
    <x-input-error :messages="$errors->get( $prefix . 'state')" class="mt-2" />
</div>

{{-- street Address --}}
<div class="mb-2">
    <label class="block mb-2 text-sm font-semibold text-gray-700" for="street-address">
        Street address<span class="text-red-600">*</span>
    </label>
    <input class="w-full px-3 py-2 mb-1 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="{{$prefix}}address_line_1" value="{{old( $prefix . 'address_line_1', $address->address_line_1 ?? null)}}" type="text" placeholder="House number and street name" />
    <x-input-error :messages="$errors->get( $prefix . 'address_line_1')" class="mt-2" />
    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="{{$prefix}}address_line_2" value="{{old( $prefix . 'address_line_2', $address->address_line_2 ?? null)}}" type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
    <x-input-error :messages="$errors->get( $prefix . 'address_line_2')" class="mt-2" />
</div>

{{-- town/city --}}
<div class="mb-2">
    <label class="block mb-2 text-sm font-semibold text-gray-700" for="towm-city">
        Town/City<span class="text-red-600">*</span>
    </label>
    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="{{$prefix}}city" value="{{old( $prefix . 'city', $address->city ?? null)}}" type="text" placeholder="Town/City" />
    <x-input-error :messages="$errors->get( $prefix . 'city')" class="mt-2" />
</div>


{{-- zip-code --}}
<div class="mb-2">
    <label class="block mb-2 text-sm font-semibold text-gray-700" for="zip_code">
        Postal Code<span class="text-red-600">*</span>
    </label>
    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="{{$prefix}}zip" value="{{old( $prefix . 'zip', $address->zip ?? null)}}" type="text" placeholder="Postal Code" />
    <x-input-error :messages="$errors->get( $prefix . 'zip')" class="mt-2" />
</div>

{{-- phone --}}
<div class="mb-2">
    <label class="block mb-2 text-sm font-semibold text-gray-700" for="number">
        Phone<span class="text-red-600">*</span>
    </label>
    <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" name="{{$prefix}}phone" value="{{old( $prefix . 'phone', $address->phone ?? null)}}" type="number" placeholder="Phone" />
    <x-input-error :messages="$errors->get( $prefix . 'phone')" class="mt-2" />
</div>