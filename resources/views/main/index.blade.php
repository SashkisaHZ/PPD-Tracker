<!-- Main Content Area -->
@extends('layouts.main-layout')

@section('title', 'Welcome Page')

@section('content')
    <div class="md:col-span-2 flex flex-col space-y-8 h-full">
        <!-- Hello, Alexander Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-600 text-white p-4 text-lg font-semibold rounded-t-lg">
                Hello, Alexander
            </div>
            <div class="p-6 h-48">
                <!-- Content for Hello, Alexander card -->
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
                <div class="p-6 h-48">
                    <!-- Content for Grades card -->
                    <p class="text-gray-700">Your latest grades are now available.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
