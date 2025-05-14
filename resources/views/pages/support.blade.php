@extends('layouts.app')

@section('content')
<main class="py-16 px-4 sm:px-6 lg:px-8 bg-white" x-data="{ showFaqs: false }">
  <div class="max-w-4xl mx-auto text-center">
    <h1 class="text-4xl font-bold text-blue-800 mb-4">We're Here to Help</h1>
    <p class="text-lg text-gray-600 mb-12">Find answers to your questions, reach out to our support team, or explore helpful resources below.</p>
  </div>

  <!-- Support Options -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
    <!-- FAQs -->
    <div class="bg-gray-50 p-6 rounded-xl shadow text-center">
      <img src="/images/faq.jpg" alt="FAQs" class="w-40 h-40 mx-auto mb-4">
      <h3 class="text-lg font-semibold text-gray-800 mb-2">Browse FAQs</h3>
      <p class="text-sm text-gray-600 mb-4">Quick answers to common questions about JetForm features, pricing, and more.</p>
      <a href="#faqs" @click.prevent="showFaqs = true; $nextTick(() => document.getElementById('faqs').scrollIntoView({ behavior: 'smooth' }))"
         class="text-blue-600 text-sm font-medium hover:underline">View FAQs</a>
    </div>

    <!-- Contact Support -->
<div class="bg-gray-50 p-6 rounded-xl shadow text-center">
  <img src="/images/contact.png" alt="Contact" class="w-40 h-40 mx-auto mb-4">
  <h3 class="text-lg font-semibold text-gray-800 mb-2">Contact Support</h3>
  <p class="text-sm text-gray-600 mb-4">Need personal help? Get in touch with our 24/7 support team directly.</p>
  <button
    @click.prevent="document.getElementById('emailForm').scrollIntoView({ behavior: 'smooth' })"
    class="text-blue-600 text-sm font-medium hover:underline"
  >
    Email Us
  </button>
</div>


    <!-- Help Center -->
    <div class="bg-gray-50 p-6 rounded-xl shadow text-center">
      <img src="/images/help.png" alt="Help Center" class="w-40 h-40 mx-auto mb-4">
      <h3 class="text-lg font-semibold text-gray-800 mb-2">Help Center</h3>
      <p class="text-sm text-gray-600 mb-4">Guides, articles, and tutorials to help you get the most out of JetForm.</p>
      <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Visit Help Center</a>
    </div>
  </div>

 <!-- Accordion-style FAQs -->
<section id="faqs" class="mt-16 max-w-4xl mx-auto">
  <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Frequently Asked Questions</h2>
  <div class="space-y-4" x-data="{ open: null }">

    <!-- FAQ 1 -->
    <div class="border rounded-lg overflow-hidden">
      <button @click="open === 1 ? open = null : open = 1" class="w-full flex justify-between items-center px-4 py-3 text-left text-gray-800 font-medium hover:bg-gray-100">
        What is a form builder?
        <span x-text="open === 1 ? '-' : '+'"></span>
      </button>
      <div x-show="open === 1" x-collapse x-cloak class="px-4 pb-4 text-sm text-gray-600">
        A form builder allows anyone to create forms, collect responses, and gain insights — all without writing code.
      </div>
    </div>

    <!-- FAQ 2 -->
    <div class="border rounded-lg overflow-hidden">
      <button @click="open === 2 ? open = null : open = 2" class="w-full flex justify-between items-center px-4 py-3 text-left text-gray-800 font-medium hover:bg-gray-100">
        How can I make an online form?
        <span x-text="open === 2 ? '-' : '+'"></span>
      </button>
      <div x-show="open === 2" x-collapse x-cloak class="px-4 pb-4 text-sm text-gray-600">
        Sign up for a free account, click "Create Form", and start customizing it with our drag-and-drop builder.
      </div>
    </div>

   <!-- FAQ 3 -->
<div class="border rounded-lg overflow-hidden">
  <button @click="open === 3 ? open = null : open = 3" class="w-full flex justify-between items-center px-4 py-3 text-left text-gray-800 font-medium hover:bg-gray-100">
    What types of forms can I build with JetForm?
    <span x-text="open === 3 ? '-' : '+'"></span>
  </button>
  <div x-show="open === 3" x-collapse x-cloak class="px-4 pb-4 text-sm text-gray-600">
    You can build contact forms, surveys, applications, registration forms, feedback forms, and more.
  </div>
</div>



    <!-- FAQ 4 -->
    <div class="border rounded-lg overflow-hidden">
      <button @click="open === 4 ? open = null : open = 4" class="w-full flex justify-between items-center px-4 py-3 text-left text-gray-800 font-medium hover:bg-gray-100">
        Is JetForm free?
        <span x-text="open === 4 ? '-' : '+'"></span>
      </button>
      <div x-show="open === 4" x-collapse x-cloak class="px-4 pb-4 text-sm text-gray-600">
        JetForm offers a free plan with basic features. Upgrade for more submissions, form limits, and advanced tools.
      </div>
    </div>

  </div>
</section>

<!-- Email Us Section -->
<section id="emailForm" class="mt-20 max-w-4xl mx-auto bg-white border rounded-xl shadow px-6 py-10">
  <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Email Us</h2>
  <p class="text-sm text-gray-600 text-center mb-8">Have a question or need help? Send us a message and our support team will get back to you as soon as possible.</p>

  <form method="POST" action="{{ route('support.email') }}" class="space-y-6">
    @csrf

    <div>
      <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
      <input type="text" id="name" name="name" required
             class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
      <input type="email" id="email" name="email" required
             class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
    </div>

    <div>
      <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
      <textarea id="message" name="message" rows="5" required
                class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 text-sm"></textarea>
    </div>

    <div class="text-center">
      <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded-md hover:bg-blue-800 text-sm font-semibold">
        Send Message
      </button>
    </div>
  </form>
</section>

</main>
@endsection
