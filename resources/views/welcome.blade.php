@extends('layouts.app')

@section('content')
    <main class="py-20 text-center">
        <!-- Hero Section -->
        <section class="px-4 sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold text-orange-400 font-poppins">EASIEST ONLINE FORM BUILDER</h3>
            <h1 class="mt-4 text-5xl font-bold text-blue-600">Powerful forms get it done.</h1>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto mb-4">
                We believe the right form makes all the difference. Go from busywork to less work with powerful forms that ease your workflow.
            </p>

            @include('components.signup-card')
        </section>

        
<section class="bg-gradient-to-r from-purple-100 to-blue-100 rounded-2xl mx-4 lg:mx-auto px-6 py-16 max-w-7xl shadow-md text-center relative overflow-hidden">
  <h3 class="text-xl font-semibold text-purple-600">JetForm custom build</h3>
  <h2 class="text-4xl sm:text-5xl font-bold text-blue-900 mt-2">Smarter Forms, Faster Workflows</h2>
  <p class="mt-4 text-lg text-gray-700 max-w-2xl mx-auto">
    Automate your data collection and create stunning forms in seconds.
  </p>
  <a href="#" class="mt-8 inline-block bg-purple-600 text-white font-semibold px-6 py-3 rounded-md hover:bg-purple-700 transition">
    Try It Free
  </a>

  {{-- <!-- Decorative circles / avatars (optional) -->
  <div class="absolute top-10 left-8 hidden md:block">
    <img src="/images/avatar-1.png" alt="User" class="w-12 h-12 rounded-full ring-2 ring-white shadow-md">
  </div>
  <div class="absolute bottom-10 right-10 hidden md:block">
    <img src="/images/avatar-2.png" alt="User" class="w-16 h-16 rounded-full ring-2 ring-white shadow-md">
  </div> --}}
</section>

        <!-- Features Section -->
       <section class="bg-[#FFF4E6] mt-16 py-16 px-4">
  <div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 justify-items-center">
      
      <!-- Card 1 -->
      <div class="flex flex-col items-center text-center w-full max-w-sm">
        <div class="mb-6">
          <img src="/images/form-builder.png" alt="Form Builder" class="rounded-lg w-full max-w-xs mx-auto">
        </div>
        <div class="p-4 w-full">
          <h3 class="text-2xl font-bold text-gray-900 mb-3 font-poppins">Build the form you need in minutes</h3>
          <p class="text-gray-600 text-base leading-relaxed">
            Create professional forms with our online Form Builder.
          </p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="flex flex-col items-center text-center w-full max-w-sm">
        <div class="mb-6">
          <img src="/images/payment-options.png" alt="Pricing" class="rounded-lg w-full max-w-xs mx-auto">
        </div>
        <div class="p-4 w-full">
          <h3 class="text-2xl font-bold text-gray-900 mb-3 font-poppins">Starts from only $1</h3> <br>
          <p class="text-gray-600 text-base leading-relaxed">
            Get started with all essential features at just $1. No hidden fees, no surprises.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>



        <!-- CTA Section -->
        <section class="w-full bg-blue-950 py-14 px-4 sm:px-6 lg:px-8 text-white">
            <h3 class="text-5xl mt-4 font-bold font-poppins">Ready to get started?</h3>
            <p class="mt-4 text-lg max-w-3xl mx-auto">
                Create your first form — fast, flexible, and free.
            </p>
            <div class="mt-6">
                @include('components.signup-card')
            </div>
        </section>
        @include('components.footer-links')

    </main>
@endsection
