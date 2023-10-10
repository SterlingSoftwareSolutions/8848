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
        <div class="items-center justify-center flex-1 md:ml-0 ml-[130px] sm:items-stretch sm:justify-start">
          <img class="w-auto h-10" src="{{url('images/Logo-white.png')}}" alt="Company">
        </div>

        {{-- search bar --}}
        <div class="md:flex md:mr-[400px] mr-0 border border-white rounded-lg items-left md:w-1/4 hidden">
          <div class="flex bg-white border-white rounded-l-lg">
            <div class="relative inline-block text-left">
              <div class="relative inline-block text-left">
                <div>
                  <button id="dropdown-button" type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    All
                    <svg class="w-5 h-5 -mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
  
                <div class="absolute right-0 z-10 mt-2 mb-3 origin-top-right bg-white rounded-md shadow-lg w-28 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                  <div class="hidden py-1" role="none" id="dropdown-details">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">One</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Two</a>
                  </div>
                </div>
              </div>
            </div>            
          </div>
         
          <input
            class="px-2.5 py-2 bg-transparent border-white"
            type="text"
            placeholder=""
          />
          <button class="p-2 bg-white rounded-r-lg">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6 text-blue"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M21 21l-4.35-4.35M9 15h-1"
              />
              <circle cx="10.5" cy="10.5" r="7.5" />
            </svg>
          </button>
        </div>
        
        <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-end">
          
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Home</a>
              <a href="/products" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Products</a>
              <a href="/contact" class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Contact</a>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button id="user-icon-button" type="button" class="relative p-1 mr-4 text-gray-400 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>            
          </button>
          <button type="button" class="relative p-1 text-gray-400 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <span class="text-[9px]">$0.00</span>       
          </button>
        </div>

      </div>
    </div>
    
    {{-- user icon details --}}
    <div class="absolute z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg right-0 md:right-[250px] ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-icon-details">
      <!-- Active: "bg-gray-100", Not Active: "" -->
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Edit Profile</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
      <form action="/logout" method="post">
        @csrf
        <button class="block px-4 py-2 text-sm text-gray-700 hover:text-blue-500" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
      </form>
    </div>

    
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="/" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Home</a>
        <a href="/products" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-blue-200 hover:text-blue-500">Product</a>
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