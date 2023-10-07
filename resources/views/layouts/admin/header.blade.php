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
            <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
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
          <img class="w-auto h-10" src="{{ URL('images/Logo-white.png')}}" alt="Company">
        </div>

        {{-- search bar --}}
        <div class="md:flex md:mr-[400px] mr-0 border border-white rounded-lg items-left md:w-1/4 hidden">
          <div class="flex bg-white border-white rounded-l-lg">
            <div class="w-full mx-1 my-2 text-blue-600">
              <h1>All</h1>
            </div>
            <button class="p-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-blue-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </button>
          </div>
         
          <input
            class="px-2 py-2 bg-transparent border-white"
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
          
        </div>
        <div class="flex">
            <button type="button" class="relative flex text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
            <div class="flex flex-col ml-4 text-sm text-white">
                <span class="">User Doe</span>
                <span class="text-[12px]">hasindu@example.com</span>
            </div>
            
        </div>
      </div>
    </div>

  </nav>