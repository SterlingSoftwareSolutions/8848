@extends('layouts.app')
@section('content')

  
<div class="flex flex-col justify-center gap-5 p-5 ml-0 md:flex-row md:ml-20">
 

    @foreach($categories as $category)
    <x-category-card :category="$category"/>

@endforeach

</div>

@endsection

