@extends('layouts.app')

@section('content')
<main class="py-16 px-4 sm:px-6 lg:px-8 bg-white" x-data="{ yearly: true }">
  <div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-blue-800">JetForm Pricing</h1>
    <p class="text-gray-600 mt-2">Transparent pricing. Switch between billing options below.</p>

    <!-- Toggle -->
    <div class="mt-6 inline-flex border rounded-full bg-gray-100 p-1">
      <button @click="yearly = false" :class="!yearly ? 'bg-blue-600 text-white' : 'text-gray-600'" class="px-4 py-2 text-sm rounded-full transition">Monthly</button>
      <button @click="yearly = true" :class="yearly ? 'bg-blue-600 text-white' : 'text-gray-600'" class="px-4 py-2 text-sm rounded-full transition">Yearly</button>
    </div>
    <p class="text-sm text-blue-600 mt-2" x-show="yearly">Save up to 20%</p>
  </div>

  <!-- Pricing Cards Centered -->
  <div class="flex justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl w-full">

      <!-- Starter -->
      <div class="bg-white border rounded-xl shadow p-6 text-center">
        <h2 class="text-lg font-semibold text-green-600 mb-1">Starter</h2>
        <p class="text-3xl font-bold text-gray-800">Free</p>
        <p class="text-sm text-gray-500">All features included</p>
        <ul class="mt-6 space-y-2 text-sm text-gray-700">
          <li>5 Forms</li>
          <li>100 Submissions/month</li>
          <li>1 User</li>
          <li>100MB Storage</li>
        </ul>
      </div>

      <!-- Bronze -->
      <div class="bg-white border rounded-xl shadow p-6 text-center">
        <h2 class="text-lg font-semibold text-orange-600 mb-1">Bronze</h2>
        <div x-show="!yearly">
          <p class="text-3xl font-bold text-gray-800">$39</p>
          <p class="text-sm text-gray-500">per month</p>
        </div>
        <div x-show="yearly" x-cloak>
          <p class="text-3xl font-bold text-gray-800">$34</p>
          <p class="text-sm text-gray-500">billed annually</p>
        </div>
        <ul class="mt-6 space-y-2 text-sm text-gray-700">
          <li>25 Forms</li>
          <li>1,000 Submissions/month</li>
          <li>1 User</li>
          <li>1GB Storage</li>
        </ul>
      </div>

      <!-- Silver -->
      <div class="bg-white border-2 border-blue-600 rounded-xl shadow p-6 text-center scale-105">
        <h2 class="text-lg font-semibold text-blue-600 mb-1">
          Silver <span class="bg-blue-600 text-white text-xs ml-2 px-2 py-1 rounded-full">Best Value</span>
        </h2>
        <div x-show="!yearly">
          <p class="text-3xl font-bold text-gray-800">$49</p>
          <p class="text-sm text-gray-500">per month</p>
        </div>
        <div x-show="yearly" x-cloak>
          <p class="text-3xl font-bold text-gray-800">$39</p>
          <p class="text-sm text-gray-500">billed annually</p>
        </div>
        <ul class="mt-6 space-y-2 text-sm text-gray-700">
          <li>50 Forms</li>
          <li>2,500 Submissions/month</li>
          <li>2 User</li>
          <li>10GB Storage</li>
        </ul>
      </div>

      <!-- Gold -->
      <div class="bg-white border rounded-xl shadow p-6 text-center">
        <h2 class="text-lg font-semibold text-yellow-600 mb-1">Gold</h2>
        <div x-show="!yearly">
          <p class="text-3xl font-bold text-gray-800">$129</p>
          <p class="text-sm text-gray-500">per month</p>
        </div>
        <div x-show="yearly" x-cloak>
          <p class="text-3xl font-bold text-gray-800">$99</p>
          <p class="text-sm text-gray-500">billed annually</p>
        </div>
        <ul class="mt-6 space-y-2 text-sm text-gray-700">
          <li>100 Forms</li>
          <li>10,000 Submissions/month</li>
          <li>5 User</li>
          <li>100GB Storage</li>
        </ul>
      </div>

    </div>
  </div>
  <!-- Why Choose JetForm Section -->
<section class="bg-[#f9fafb] py-16 px-4 mt-8 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Why Choose JetForm?</h2>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Cancel Anytime -->
      <div class="bg-white rounded-lg shadow p-6">
        <img src="/images/cancel.jpg" alt="Cancel Anytime" class="w-full h mx-auto mb-4">
        <h3 class="text-xl font-semibold text-red-600 text-center mb-2">Cancel Anytime</h3>
        <p class="text-sm text-gray-600 text-center">Upgrade, downgrade, or cancel at any time from your billing dashboard. We believe in flexible pricing.</p>
      </div>

      <!-- 30 Day Guarantee -->
      <div class="bg-white rounded-lg shadow p-6">
        <img src="/images/refund.png" alt="Money Back" class="w-full mx-auto mb-4">
        <h3 class="text-xl font-semibold text-blue-700 text-center mb-2">30 Day Money Back</h3>
        <p class="text-sm text-gray-600 text-center">Need to cancel within the first 30 days? We’ve got your back. Full refund, no questions asked.</p>
      </div>

      <!-- Trust Statement -->
      <div class="bg-white rounded-lg shadow p-6">
        <img src="/images/trusted.jpg" alt="Trusted By Teams" class=" mx-auto mb-4">
        <h3 class="text-xl font-semibold text-gray-800 text-center mb-2">Trusted by Teams</h3>
        <p class="text-sm text-gray-600 text-center">JetForm is trusted by startups, agencies, and organizations worldwide to power data collection.</p>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
