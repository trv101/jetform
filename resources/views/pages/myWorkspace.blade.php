@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-50 border-r px-4 py-6">
        <button onclick="document.getElementById('createOptions').classList.remove('hidden')" class="bg-orange-500 text-white font-semibold w-full py-2 rounded">
            + CREATE
        </button>

        <div class="mt-8 space-y-6 text-sm text-gray-700">
            <div>
                <h3 class="font-semibold text-gray-600 uppercase mb-2">My Workspace</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="block hover:text-blue-600 font-medium">All</a></li>
                    <li><a href="#" class="block hover:text-blue-600">+ Create label</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-gray-600 uppercase mb-2">Team Workspaces</h3>
                <ul>
                    <li><a href="#" class="block hover:text-blue-600">+ Create team</a></li>
                </ul>
            </div>

            <ul class="pt-4 border-t text-gray-600 space-y-2">
                <li><a href="#" class="flex items-center gap-2"><span>📂</span> Shared with me</a></li>
                <li><a href="#" class="flex items-center gap-2"><span>📌</span> Assigned to me</a></li>
                <li><a href="#" class="flex items-center gap-2"><span>✉️</span> Sent</a></li>
                <li><a href="#" class="flex items-center gap-2"><span>📝</span> Drafts</a></li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Bar -->
        <div class="bg-white shadow-sm flex items-center justify-between px-6 py-4 border-b">
            <div>
                <h1 class="text-lg font-bold text-blue-900">My Workspace</h1>
            </div>
            <div class="flex items-center space-x-4">
            
                <select class="border rounded px-2 py-1 text-sm">
                    <option>Type</option>
                </select>
                <select class="border rounded px-2 py-1 text-sm">
                    <option>Creation Date</option>
                </select>
                <input type="text" placeholder="Search" class="border rounded px-2 py-1 text-sm" />
                {{-- <div class="w-8 h-8 rounded-full bg-gray-300 text-white flex items-center justify-center text-sm">U</div> --}}
            </div>
        </div>

        <!-- Empty State -->
        <div class="flex-1 flex flex-col items-center justify-center text-center px-6">
            <img src="/images/empty-illustration.png" alt="No forms" class="w-80 h-64 mb-4">
            <p class="text-lg font-semibold text-gray-800 mb-2">You don't have anything here yet.</p>
            <p class="text-gray-500 mb-6">Create your first form to start collecting data.</p>
            <button onclick="document.getElementById('createOptions').classList.remove('hidden')" class="px-6 py-2 bg-orange-500 text-white rounded font-semibold hover:bg-orange-600">+ CREATE</button>
          
        </div>
    </div>
</div>
@endsection




<!-- Fullscreen Overlay -->
<div x-data="{ step: 'options' }" id="createOptions" class="fixed inset-0 z-50 bg-white hidden">
    <!-- Top Bar -->
    <div class="flex justify-between items-center px-6 py-4 border-b shadow">
        <button @click="step = 'options'" class="text-blue-600 text-sm font-semibold hover:underline" x-show="step === 'layout'">
            ← Back
        </button>
        <button onclick="document.getElementById('createOptions').classList.add('hidden')" class="text-gray-600 text-2xl font-bold hover:text-gray-800">
            &times;
        </button>
    </div>

    <!-- Step 1: How would you like to start -->
    <div x-show="step === 'options'" class="flex flex-col items-center justify-center h-[calc(100vh-64px)] px-6 text-center space-y-10">
        <div class="max-w-2xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">How would you like to start, {{ Auth::user()->name }}?</h1>
            <p class="text-gray-600 text-sm sm:text-base">
                Create smarter forms, collect and manage data, automate workflows, and stay organized—all in one place.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-3xl w-full">
            <!-- Start from Scratch -->
            <div @click="step = 'layout'" class="border rounded-lg p-6 hover:shadow-lg cursor-pointer transition">
                <div class="bg-gray-100 h-32 flex items-center justify-center rounded mb-4 text-4xl text-gray-500">+</div>
                <p class="text-lg font-semibold text-gray-800">Start from scratch</p>
                <p class="text-sm text-gray-500">A blank slate is all you need</p>
            </div>

            <!-- Use Template -->
            <div class="border rounded-lg p-6 hover:shadow-lg cursor-pointer transition">
                <img src="/images/template.png" alt="Use template" class="h-32 mx-auto mb-4 object-contain">
                <p class="text-lg font-semibold text-gray-800">Use template</p>
                <p class="text-sm text-gray-500">Choose from 10,000+ premade forms</p>
            </div>
        </div>
    </div>

    <!-- Step 2: Select Form Layout -->
    <div x-show="step === 'layout'" class="flex flex-col items-center justify-center h-[calc(100vh-64px)] px-6 text-center space-y-10">
        <div class="max-w-2xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-blue-900 mb-2">Select form layout</h1>
            <p class="text-gray-600 text-sm sm:text-base">Choose a layout according to your needs</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-3xl w-full">
            <!-- Classic Form -->
            <div 
            class="border rounded-lg p-6 bg-white shadow hover:shadow-lg cursor-pointer transition"
            onclick="window.location.href='{{ route('form.builder') }}'"
            >
                <img src="/images/classic-form.png" alt="Classic Form" class="h-32 mx-auto mb-4 object-contain">
                <p class="text-lg font-semibold text-gray-800">Classic form</p>
                <p class="text-sm text-gray-500">Show all questions on one page</p>
            </div>


            <!-- Card Form -->
            <div class="border rounded-lg p-6 bg-white shadow hover:shadow-lg cursor-pointer transition">
                <img src="/images/card-form.png" alt="Card Form" class="h-32 mx-auto mb-4 object-contain">
                <p class="text-lg font-semibold text-gray-800">Card form</p>
                <p class="text-sm text-gray-500">Show single question per page</p>
            </div>
        </div>
    </div>
</div>
