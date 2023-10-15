@props([
    'margin' => false
])

@error('error')
<div class="border border-red-700 rounded text-red bg-red-100 @if($margin) mb-4 @endif">
    <div class="flex max-w-screen-xl mx-auto">
        <div class="my-5 text-red-700 mx-8">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <div class="flex justify-start my-5 font-light">
            <p>{{$message}}</p>
        </div>
    </div>
</div>
@enderror

@error('success')
<div class="border border-green-700 rounded text-green bg-green-100 @if($margin) mb-4 @endif">
    <div class="flex max-w-screen-xl mx-auto">
        <div class="my-5 text-green-700 mx-8">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="flex justify-start my-5 font-light">
            <p>{{$message}}</p>
        </div>
    </div>
</div>
@enderror