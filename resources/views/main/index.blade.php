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
                <div class="p-6 h-48">
                    <!-- Content for Notifications card -->
                    <p class="text-gray-700">You have no new notifications.</p>
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
