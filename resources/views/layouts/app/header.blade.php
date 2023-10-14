    <!-- The menu here -->
    <x-slideout-cart/>

    <nav class="bg-gradient-to-b from-[#166EB6] to-[#284297]">
      <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="relative inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
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
          <div class="items-center justify-center flex-1 md:ml-0 ml-[80px] sm:items-stretch sm:justify-start">
            <a href="/">
              <img class="w-auto h-10" src="{{ URL('images/Logo-white.png')}}" alt="Company">
            </a>
          </div>

          {{-- search bar --}}
          <x-serach />

          <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-end">
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Home</a>
                <a href="/categories" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Shop</a>
                <a href="/contact" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Contact</a>
                @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin'))
                <a href="/admin" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Admin</a>
                @endif
              </div>
            </div>
          </div>

          <div class="absolute inset-y-0 right-0 flex items-center sm:static sm:inset-auto ml-4 sm:pr-0">
            <span onclick="openMenu()" class="cursor-pointer">
              <a type="button" class="relative flex items-center px-3 py-1.5 text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">
                <span class="text-xs pe-3">$0.00</span>
                <span class="absolute -inset-1.5"></span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
              </a>
            </span>
            <button id="user-icon-button" type="button" class="relative ml-4 px-3 py-1.5 text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">
              <span class="absolute -inset-1.5"></span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
            </button>
          </div>

        </div>
      </div>

      {{-- user icon details --}}
      <div class="absolute z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg right-0 md:right-[100px] ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-icon-details">
        <!-- Active: "bg-gray-100", Not Active: "" -->
        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Edit Profile</a>
        <a href="/orders" class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Orders</a>
        <form action="/logout" method="post">
          @csrf
          <button class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
        </form>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <a href="/" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Home</a>
          <a href="/category" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Shop</a>
          <a href="/contact" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Contact</a>
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