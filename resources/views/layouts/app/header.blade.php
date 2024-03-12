<!-- The menu here -->
<x-slideout-cart />

<nav class="bg-gradient-to-b from-[#166EB6] to-[#284297]">
  <div class="max-w-screen-xl mx-auto">
    <div class="px-2 mx-auto w-full sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        {{-- LEFT --}}
        <div class="flex items-center gap-8">

          {{-- mobile menu icon --}}
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" id="menu-button" class="relative inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!--
              Icon when menu is closed.
          
              Menu open: "hidden", Menu closed: "block"
            -->
              <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" id="menu-icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!--
              Icon when menu is open.
          
              Menu open: "block", Menu closed: "hidden"
            -->
              <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          {{-- logo --}}
          <div class="items-center justify-center flex-1">
            <a href="/">
              <p class="text-[20px] font-bold text-white md:ml-0 ml-12">ECOM</p>

            </a>
          </div>

          {{-- search bar --}}
          <div class="md:block hidden">
            <x-product-search />
          </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center">
          {{-- navigation buttons --}}
          <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-end">
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Home</a>
                <div class="my-auto relative z-10">                  
                  <a href="/categories" class="peer px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Shop</a>
                  <div class="absolute hidden peer-hover:block right-0 hover:block">                    
                    <div class="w-64 py-1 mt-3 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      @foreach(App\Models\Category::with('children')->where('parent_id', null)->get(); as $category)
                      <a href="/categories/{{$category->id}}" class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500">{{$category->name}}</a>
                      @endforeach
                    </div>
                  </div>
                </div>
                <a href="/my-list" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-1">My List</a>
                <a href="/contact" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Contact</a>
                @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin'))
                <a href="/admin" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Admin</a>
                @endif
              </div>
            </div>
          </div>

          {{-- cart buttons --}}
          <div class="absolute inset-y-0 right-0 flex items-center sm:static sm:inset-auto ml-4 sm:pr-0">
            <span onclick="openMenu()" class="cursor-pointer">
              <a type="button" class="relative flex items-center px-3 py-1.5 text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">
                @if (auth()->user() && !auth()->user()->is_wholesale())
                <span class="text-xs pe-3">${{ auth()->user() ? number_format(auth()->user()->cart_total(), 2) : '0.00'}}</span>
                @endif
                <div class="flex h-10 justify-center items-center -mt-4">
                  <div class="relative py-4">
                    <div class="t-0 absolute left-3">
                      <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">{{ auth()->user() ? auth()->user()->cart_items->count() : '0'}}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                  </div>
                </div>
              </a>
            </span>
          </div>

          @if(Auth::check())
          <button id="user-icon-button" type="button" class="flex justify-center items-center gap-2 relative h-10  px-3 py-1.5 text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500 md:mr-0 mr-20">
            <p class="text-sm font-medium">{{ auth()->user()->first_name }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
          </button>
          @else
          <a href="/login"><button class="px-3 ml-4 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Login/Register</button></a>
          @endif
          {{-- user icon details --}}
          <div class="absolute z-10 hidden w-48 py-1 mt-2 bg-white rounded-md shadow-lg right-0 top-12 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-icon-details">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Edit Profile</a>
            <a href="/orders" class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Orders</a>
            <form class="w-full" action="/logout" method="post">
              @csrf
              <button href="/orders" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" class="hidden">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="/" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Home</a>
        <a href="/categories" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Shop</a>
        <a href="/contact" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Contact</a>
      </div>
    </div>
  </div>
</nav>

<script>
  // Get references to the button and the user icon details section
  const userIconButton = document.getElementById("user-icon-button");
  const userIconDetails = document.getElementById("user-icon-details");

  // Add a click event listener to the button
  userIconButton.addEventListener("click", () => {
    // Toggle the visibility of the user icon details section
    if (userIconDetails.style.display === "none" || userIconDetails.style.display === "") {
      userIconDetails.style.display = "block";
    } else {
      userIconDetails.style.display = "none";
    }
  });

  const dropdownButton = document.getElementById("dropdown-button");
  const dropdownDetails = document.getElementById("dropdown-details");

  // Add a click event listener to the button
  dropdownButton.addEventListener("click", () => {
    // Toggle the visibility of the user icon details section
    if (dropdownDetails.style.display === "none" || dropdownDetails.style.display === "") {
      dropdownDetails.style.display = "block";
    } else {
      dropdownDetails.style.display = "none";
    }
  });
</script>
<script>
  var sideMenu = document.getElementById('side-menu');

  function openMenu() {
    sideMenu.classList.remove('right-[-350px]');
    sideMenu.classList.add('right-0');
  }

  function closeMenu() {
    sideMenu.classList.remove('right-0');
    sideMenu.classList.add('right-[-350px]');
  }
</script>
<script>
  document.getElementById('menu-button').addEventListener('click', function() {
  var menu = document.getElementById('mobile-menu');
  menu.classList.toggle('hidden');
});

</script>