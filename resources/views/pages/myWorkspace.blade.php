@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-50 border-r px-4 py-6">
        <button class="bg-orange-500 text-white font-semibold w-full py-2 rounded">+ CREATE</button>

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
            <button class="px-6 py-2 bg-orange-500 text-white rounded font-semibold hover:bg-orange-600">+ CREATE</button>
        </div>
    </div>
</div>
@endsection
