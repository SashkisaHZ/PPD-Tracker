<!-- Main Content Area -->
@extends('layouts.main-layout')

@section('title', 'Welcome Page')

@section('content')
    <div class="md:col-span-2 flex flex-col space-y-8 h-full">
        <!-- Hello, User Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-600 text-white p-4 text-lg font-semibold rounded-t-lg">
                Hello, {{ Auth::user()->name }}
            </div>
            <div class="p-6 h-48">
                <!-- Content for Hello, User card -->
                <p class="text-gray-700">Welcome to your dashboard! Here you can find an overview of your progress and important updates.</p>
            </div>
        </div>

        <!-- Notifications and Grades Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Notifications Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative bg-blue-600 text-white p-4 text-lg font-semibold rounded-t-lg tab-arrow tab-arrow-inactive">
                    Notifications
                </div>
                <div class="p-6 h-48 overflow-y-auto"> {{-- Added overflow-y-auto for scrollable notifications --}}
                    @php
                        // Retrieve notifications from the session
                        $notifications = session('notifications', []);
                        // Reverse the array to show newest notifications first
                        $notifications = array_reverse($notifications);
                    @endphp

                    @if (count($notifications) > 0)
                        <ul class="space-y-2">
                            @foreach ($notifications as $notification)
                                <li class="bg-yellow-50 p-3 rounded-md shadow-sm border border-yellow-200 text-sm"> {{-- Changed to yellow background and border --}}
                                    <p class="text-gray-800">{{ $notification['message'] }}</p>
                                    <span class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($notification['timestamp'])->diffForHumans() }}</span>
                                </li>
                            @endforeach
                        </ul>
                        {{-- Optional: Add a button to clear notifications --}}
                        {{-- <form action="{{ route('notifications.clear') }}" method="POST" class="mt-4 text-right">
                            @csrf
                            <button type="submit" class="text-blue-600 hover:underline text-sm">Clear Notifications</button>
                        </form> --}}
                    @else
                        <p class="text-gray-700">You have no new notifications.</p>
                    @endif
                </div>
            </div>

            <!-- Grades Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative bg-purple-700 text-white p-4 text-lg font-semibold rounded-t-lg tab-arrow tab-arrow-active">
                    Grades
                </div>
                <div class="p-6 h-48 flex flex-col justify-center space-y-4">
                    <div>
                        <span class="font-semibold">Year 1:</span>
                        <div class="w-full bg-gray-200 rounded-full h-4 mt-1 mb-1">
                            <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $avgYear1 ?? 0 }}%;"></div>
                        </div>
                        <span class="text-sm text-gray-700">{{ $avgYear1 ?? 0 }}%</span>
                    </div>
                    <div>
                        <span class="font-semibold">Year 2:</span>
                        <div class="w-full bg-gray-200 rounded-full h-4 mt-1 mb-1">
                            <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $avgYear2 ?? 0 }}%;"></div>
                        </div>
                        <span class="text-sm text-gray-700">{{ $avgYear2 ?? 0 }}%</span>
                    </div>
                    <div>
                        <span class="font-semibold">Year 3:</span>
                        <div class="w-full bg-gray-200 rounded-full h-4 mt-1 mb-1">
                            <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $avgYear3 ?? 0 }}%;"></div>
                        </div>
                        <span class="text-sm text-gray-700">{{ $avgYear3 ?? 0 }}%</span>
                    </div>
                    <div>
                        <span class="font-semibold">Year 4:</span>
                        <div class="w-full bg-gray-200 rounded-full h-4 mt-1 mb-1">
                            <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $avgYear4 ?? 0 }}%;"></div>
                        </div>
                        <span class="text-sm text-gray-700">{{ $avgYear4 ?? 0 }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
