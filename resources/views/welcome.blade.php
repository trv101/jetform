@extends('layouts.app')

@section('content')
<div class="bg-white">
  <!-- Hero Section -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
    <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
      Powerful Forms for Everyone
    </h1>
    <p class="text-lg sm:text-xl text-gray-600 mb-8">
      Create, share, and manage online forms with ease.
    </p>
    <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-md text-lg hover:bg-blue-700">
      Get Started — It's Free
    </a>
  </div>

  <!-- Features Section -->
  <div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
      <div class="text-center">
        <svg class="mx-auto h-12 w-12 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M13 16h-1v-4h-1m0-4h.01M12 4.354a4 4 0 100 15.292 4 4 0 000-15.292z"/>
        </svg>
        <h3 class="text-xl font-semibold mt-4">Easy to Use</h3>
        <p class="mt-2 text-gray-600">Drag-and-drop builder for quick setup.</p>
      </div>
      <div class="text-center">
        <svg class="mx-auto h-12 w-12 text-blue-600" ...>...</svg>
        <h3 class="text-xl font-semibold mt-4">Customizable</h3>
        <p class="mt-2 text-gray-600">Tailor forms to your exact needs.</p>
      </div>
      <div class="text-center">
        <svg class="mx-auto h-12 w-12 text-blue-600" ...>...</svg>
        <h3 class="text-xl font-semibold mt-4">Responsive</h3>
        <p class="mt-2 text-gray-600">Works great on all devices.</p>
      </div>
    </div>
  </div>
</div>
@endsection
