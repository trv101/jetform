<footer class="{{ Auth::check() ? 'bg-[#12246e] text-xl text-white' : 'bg-white text-xl text-gray-700'}} border-t border-gray-200">
  <div class="max-w-7xl mx-auto pb-12 sm:px-6 lg:px-8 mt-12">
    <div class="flex justify-center">
      <div class="inline-grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-12 lg:gap-64 text-left mt-2">

        <!-- Column 1 -->
        <div>
          <h4 class="{{ Auth::check() ? 'text-white': 'text-blue-950' }} font-bold mb-6">JetForm</h4>
          <ul class="space-y-2">
            <li><a href="#" class="hover:underline">Signup</a></li>
            <li><a href="#" class="hover:underline">Create a Form</a></li>
            <li><a href="#" class="hover:underline">My Workspace</a></li>
            <li><a href="#" class="hover:underline">Pricing</a></li>
          </ul>
        </div>

        <!-- Column 2 -->
        <div>
          <h4 class="{{ Auth::check() ? 'text-white': 'text-blue-950' }} font-bold mb-6">Support</h4>
          <ul class="space-y-2">
            <li><a href="#" class="hover:underline">Contact Us</a></li>
            <li><a href="#" class="hover:underline">Help</a></li>
            <li><a href="#" class="hover:underline">Report Abuse</a></li>
            <li><a href="#" class="hover:underline">Recover Account</a></li>
          </ul>
        </div>

        <!-- Column 3 -->
        <div>
          <h4 class="{{ Auth::check() ? 'text-white': 'text-blue-950' }} font-bold mb-6">Company</h4>
          <ul class="space-y-2">
            <li><a href="#" class="hover:underline">About Us</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</footer>
