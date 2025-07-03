<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Dashboard') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .tab-arrow::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 20px;
            height: 20px;
            background-color: inherit;
            border-radius: 4px;
            z-index: 10;
        }
        .tab-arrow-active::after {
            background-color: #9333ea;
        }
        .tab-arrow-inactive::after {
            background-color: #3b82f6;
        }
    </style>
</head>
<body class="bg-blue-100 font-sans p-8">

<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

    <!-- Left Sidebar / Navigation -->
    <div class="md:col-span-1 flex flex-col space-y-8">
        <div class="bg-blue-600 rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-700 text-white p-4 text-lg font-semibold rounded-t-lg">
                {{ __('PPD Progress') }}
            </div>
            @php
                $yearProgress = [
                    'Year 1' => 80,
                    'Year 2' => 55,
                    'Year 3' => 30,
                    'Year 4' => 10,
                    // 'Rizz counter' and 'Horoscope' intentionally omitted
                ];
                $yearLinks = [
                    'Year 1' => '/year1',
                    'Year 2' => '/year2',
                    'Year 3' => '/year3',
                    'Year 4' => '/year4',
                    'Rizz counter' => '/rizz_counter_graph',
                    'Horoscope' => '/horoscope',
                ];
            @endphp
            <nav>
                <ul class="text-white">
                    @foreach($years as $year)
                        <li class="flex items-center justify-between p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out {{ $loop->last ? 'rounded-b-lg' : '' }}">
                            <a href="{{ $yearLinks[$year] ?? '#' }}" class="flex-1">
                                {{ __($year) }}
                            </a>
                            @if(isset($yearProgress[$year]))
                                <div class="w-24 ml-4">
                                    <div class="w-full bg-blue-200 rounded-full h-2.5">
                                        <div class="bg-green-400 h-2.5 rounded-full" style="width: {{ $yearProgress[$year] }}%"></div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <div class="bg-white text-blue-600 py-3 px-6 rounded-lg shadow-md hover:bg-gray-100 transition duration-200 ease-in-out text-lg font-semibold text-center cursor-pointer">
            ENG/NL
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="md:col-span-2 flex flex-col space-y-8">
        <!-- Hello, Alexander Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-600 text-white p-4 text-lg font-semibold rounded-t-lg">
                {{ __('Hello, Alexander') }}
            </div>
            <div class="p-6 h-48">
                <p class="text-gray-700">{{ __('Welcome to your dashboard! Here you can find an overview of your progress and important updates.') }}</p>
            </div>
        </div>

        <!-- Notifications and Grades Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Notifications Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative bg-blue-600 text-white p-4 text-lg font-semibold rounded-t-lg tab-arrow tab-arrow-inactive">
                    {{ __('Notifications') }}
                </div>
                <div class="p-6 h-48">
                    <p class="text-gray-700">{{ __('You have no new notifications.') }}</p>
                </div>
            </div>

            <!-- Grades Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative bg-purple-700 text-white p-4 text-lg font-semibold rounded-t-lg tab-arrow tab-arrow-active">
                    {{ __('Grades') }}
                </div>
                <div class="p-6 h-48">
                    <p class="text-gray-700">{{ __('Your latest grades are now available.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
