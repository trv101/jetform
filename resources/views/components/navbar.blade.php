<nav class="bg-white shadow-sm" x-data="{ open: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
    <div class="flex justify-between items-center h-16">
      <!-- Logo -->
      <a href="/" class="flex items-center space-x-2">
        <img src="/images/logo.png" alt="Jetform Logo" class="h-8 w-8 object-contain">
        <span class="text-2xl font-bold text-black">JetForm</span>
      </a>

      <!-- Desktop Nav -->
      <div class="hidden lg:flex space-x-6"> 
        <a href="{{ route('myWorkspace') }}"class="text-black hover:text-blue-600">My Workspace</a>
        <a href="{{ route('pricing') }}" class="text-black hover:text-blue-600">Pricing</a>
        <a href="{{ route('support') }}" class="text-black hover:text-blue-600">Support</a>
      </div>

      <!-- Right: Login/Register or User Dropdown -->
      <div class="hidden sm:flex sm:items-center space-x-4">
        @auth
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                <div>{{ Auth::user()->name }}</div>
                <svg class="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                </svg>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault(); this.closest('form').submit();">
                  Log Out
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        @else
          <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:underline">Login</a>
          <a href="{{ route('register') }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-blue-900 text-sm font-semibold">
            Sign Up for Free
          </a>
        @endauth
      </div>

      <!-- Mobile Hamburger -->
      <div class="lg:hidden">
        <button @click="open = !open" class="text-gray-700 focus:outline-none">
          <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu Drawer -->
  <div class="fixed inset-0 z-50 bg-white lg:hidden flex flex-col" x-show="open" x-transition>
    <div class="flex justify-between items-center px-4 py-4">
      <a href="/" class="flex items-center space-x-2">
        <img src="/images/logo.png" alt="Jetform Logo" class="h-6 w-6">
        <span class="text-xl font-bold text-blue-900">JetForm</span>
      </a>
      <button @click="open = false" class="text-gray-600 text-2xl font-bold">&times;</button>
    </div>

    <div class="flex-1 overflow-y-auto px-4 py-6 space-y-4 divide-y divide-gray-100">
      <a href="#" class="block text-base font-medium text-gray-800 hover:text-blue-600">My Workspace</a>
      <a href="{{ route('pricing') }}" class="block text-base font-medium text-gray-800 hover:text-blue-600">Pricing</a>
      <a href="{{ route('support') }}" class="block text-base font-medium text-gray-800 hover:text-blue-600">Support</a>
    </div>

    <div class="px-4 py-6 bg-white shadow-[0_-4px_12px_rgba(0,0,0,0.05)]">
      @auth
        <div class="mb-4 text-center text-sm text-gray-700 font-medium">
          {{ Auth::user()->name }}<br>
          <span class="text-xs text-gray-500">{{ Auth::user()->email }}</span>
        </div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full bg-blue-700 text-white text-center py-2 rounded hover:bg-blue-900 font-semibold">
            Log Out
          </button>
        </form>
      @else
        <div class="flex gap-4">
          <a href="{{ route('login') }}" class="w-1/2 border border-gray-400 text-center py-2 rounded hover:border-blue-600 hover:text-blue-600">
            Login
          </a>
          <a href="{{ route('register') }}" class="w-1/2 bg-blue-800 text-white text-center py-2 rounded hover:bg-blue-900 font-semibold">
            Sign Up for Free
          </a>
        </div>
      @endauth
    </div>
  </div>
</nav>
