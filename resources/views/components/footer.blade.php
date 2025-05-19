<footer class="{{ Auth::check() ? 'bg-[#0B1952] text-white' : 'bg-gray-100 text-gray-700' }}">
  
  <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 text-center sm:text-left">

      <!-- Left Text -->
      <p class="text-sm flex flex-col sm:flex-row items-center">
        <span>&copy; {{ date('Y') }} JetForm</span>
        <span class="hidden sm:inline border-l h-4 border-gray-400 mx-2"></span>
        <span>Powered by Think Tank Technologies</span>
      </p>

      <!-- Right Links -->
      <div class="flex flex-wrap items-center justify-center sm:justify-start text-sm gap-x-4 gap-y-2">
        <a href="#" class="hover:text-blue-600">Privacy</a>
        <span class="hidden sm:inline border-l h-4 border-gray-400"></span>
        <a href="#" class="hover:text-blue-600">Terms & Conditions</a>
        <span class="hidden sm:inline border-l h-4 border-gray-400"></span>
        <a href="#" class="hover:text-blue-600">Contact</a>

        <!-- Facebook icon -->
        <a href="https://facebook.com/yourpage" target="_blank" aria-label="Facebook" class="text-blue-600 hover:text-blue-800">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 sm:w-8 sm:h-8" viewBox="0 0 24 24">
            <path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5 3.66 9.13 8.44 9.88v-6.99H8.08v-2.89h2.36V9.41c0-2.33 1.38-3.62 3.5-3.62.7 0 1.45.12 1.45.12v1.6h-1.05c-1.04 0-1.36.64-1.36 1.3v1.56h2.31l-.37 2.89h-1.94v6.99C18.34 21.2 22 17.07 22 12.07z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</footer>

{{-- @auth
                <div class="bg-[#0B1952] text-white">
                @include('components.footer-links')
                @include('components.footer')
                </div>
                @else --}}