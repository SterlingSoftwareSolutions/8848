          <div class="md:flex md:mr-[300px] mr-0 border border-white rounded-lg items-left md:w-1/4 hidden">
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

              <input class="px-2.5 py-2 bg-transparent border-white" type="text" placeholder="" />
              <button class="p-2 bg-white rounded-r-lg">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M9 15h-1" />
                      <circle cx="10.5" cy="10.5" r="7.5" />
                  </svg>
              </button>
          </div>