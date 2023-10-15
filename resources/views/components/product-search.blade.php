<form action="/products" class="my-auto"    >
    <div class="flex border-2 border-white rounded-lg overflow-hidden">
        <select name="category_id" id="dropdown-button" type="button" class="inline-flex max-w-full justify-center bg-white px-3 py-3 text-sm font-semibold text-gray-900 shadow-sm" id="menu-button" aria-expanded="true" aria-haspopup="true">
            <option value="">All</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}" @if(($_GET['category_id'] ?? null) == $category->id) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>
        <input name="q" value="{{$_GET['q'] ?? null}}" class=" w-[280px] px-2.5 py-2 bg-transparent text-white focus:outline-none" type="text" placeholder="" />
        <button type="submit" class="p-2 bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M9"/>
              <circle cx="10.5" cy="10.5" r="7.5"/>
            </svg>
        </button>
    </div>
</form>