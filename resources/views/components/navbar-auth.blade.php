<nav class="bg-[#0B1952] text-white" x-data="{ open: false }">
  <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      
      <!-- Left: Logo + Workspace -->
      <div class="flex items-center space-x-6">
        <a href="/" class="flex items-center space-x-2">
          <img src="/images/logo.png" alt="Jetform Logo" class="h-6 w-6 object-contain">
          <span class="text-2xl font-bold">JetForm</span>
        </a>

        @auth
        @if(Auth::user()->hasAnyRole(['Admin', 'Super-Admin']))
          <a href="{{ route('dashboard') }}" class="flex items-center space-x-1 font-medium hover:underline">
            <span>Dashboard</span>
          </a>
        @else
          <a href="{{ route('myWorkspace') }}" class="flex items-center space-x-1 font-medium hover:underline">
            <span>My Workspace</span>
            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M5.23 7.21a.75.75 0 011.06.02L10 11.063l3.71-3.83a.75.75 0 111.08 1.04l-4.25 4.39a.75.75 0 01-1.08 0l-4.25-4.39a.75.75 0 01.02-1.06z"/>
            </svg>
          </a>
        @endif
      @endauth

      </div>

      <!-- Right: Support + User -->
      <div class="hidden lg:flex items-center space-x-6">
        <a href="{{ route('support') }}" class="hover:underline">Support</a>

        <!-- User Dropdown -->
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-blue-800 focus:outline-none transition">
              <div>{{ Auth::user()->name }}</div>
              <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.063l3.71-3.83a.75.75 0 111.08 1.04l-4.25 4.39a.75.75 0 01-1.08 0l-4.25-4.39a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
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
      </div>

      <!-- Mobile Hamburger -->
      <div class="lg:hidden">
        <button @click="open = !open" class="text-white focus:outline-none">
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

  <!-- Mobile Menu -->
  <div class="lg:hidden bg-[#0B1952] text-white" x-show="open" x-transition>
    <div class="px-4 py-4 space-y-2">
      @auth
        @if(Auth::user()->hasAnyRole(['Admin', 'Super-Admin']))
          <a href="{{ route('dashboard') }}" class="block hover:underline">Dashboard</a>
        @else
          <a href="{{ route('myWorkspace') }}" class="block hover:underline">My Workspace</a>
        @endif
      @endauth
       
      <a href="{{ route('support') }}" class="block hover:underline">Support</a>
      <hr class="border-gray-600">
      <div class="text-sm mt-4">
        <div class="mb-2">{{ Auth::user()->name }}</div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="w-full text-left hover:underline" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</button>
        </form>
      </div>
    </div>
  </div>
</nav>
