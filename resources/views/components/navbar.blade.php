<nav class="bg-white shadow-sm" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
    <img src="/images/logo.png" alt="Jetform Logo" class="h-8 w-8 object-contain">
    <span class="text-2xl font-bold text-black">JetForm</span>
  </a>
  
        <!-- Desktop Nav -->
        <div class="hidden lg:flex space-x-4">
          <a href="#" class="text-black hover:text-blue-600">My workspace</a>
          <a href="#" class="text-black hover:text-blue-600">Pricing</a>
          <a href="#" class="text-black hover:text-blue-600">Support</a>
          
        </div>
  
        <div class="flex items-center space-x-4">
            <!-- Login: only visible on desktop -->
            <a href="#" class="text-black hover:text-blue-600 hidden lg:inline">Login</a>
    
            <!-- Sign Up: always visible -->
            <a href="#" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm sm:text-base">Sign Up for Free</a>
    
  
        <!-- Hamburger (mobile only) -->
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
  
    <!-- Mobile Menu -->
    <!-- Mobile Menu Drawer -->
<div class="fixed inset-0 z-50 bg-white lg:hidden flex flex-col" x-show="open" x-transition>
  <!-- Header with logo and close button -->
  <div class="flex justify-between items-center px-4 py-4 ">
    <a href="/" class="flex items-center space-x-2">
      <img src="/images/logo.png" alt="Jetform Logo" class="h-6 w-6">
      <span class="text-xl font-bold text-blue-900">Jetform</span>
    </a>
    <button @click="open = false" class="text-gray-600 text-2xl font-bold">&times;</button>
  </div>

  <!-- Navigation Links -->

    <div class="flex-1 overflow-y-auto px-4 py-6 space-y-4 divide-y divide-gray-100">
   
    <a href="#" class="block text-base font-medium text-gray-800 hover:text-blue-600">My Workspace</a>
    <a href="#" class="block text-base font-medium text-gray-800 hover:text-blue-600">Pricing</a>
    <a href="#" class="block text-base font-medium text-gray-800 hover:text-blue-600">Support</a>

  </div>

  <!-- Fixed bottom buttons -->
   <div class="px-4 py-6 bg-white shadow-[0_-4px_12px_rgba(0,0,0,0.05)]">
    <div class="flex gap-4">
      <a href="#" class="w-1/2 border border-gray-400 text-center py-2 rounded hover:border-blue-600 hover:text-blue-600">
        Login
      </a>
      <a href="#" class="w-1/2 bg-blue-800 text-white text-center py-2 rounded hover:bg-blue-900 font-semibold">
        Sign Up for Free
      </a>
    </div>
  </div>
</div>

    </div>
  </nav>
  