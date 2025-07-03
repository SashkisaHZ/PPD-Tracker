<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for the arrow/triangle effect on tabs */
        .tab-arrow::after {
            content: '';
            position: absolute;
            bottom: -10px; /* Adjust this value to control how far the arrow points down */
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 20px; /* Size of the arrow */
            height: 20px; /* Size of the arrow */
            background-color: inherit; /* Inherit background color from parent for seamless look */
            border-radius: 4px; /* Slightly rounded corners for the arrow */
            z-index: 10; /* Ensure arrow is above other elements if needed */
        }
        /* Specific arrow for the active tab */
        .tab-arrow-active::after {
            background-color: #9333ea; /* Purple for active tab */
        }
        /* Specific arrow for the inactive tab */
        .tab-arrow-inactive::after {
            background-color: #3b82f6; /* Blue for inactive tab */
        }
    </style>
</head>
<body class="bg-blue-100 font-sans p-8">

<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

    <!-- Left Sidebar / Navigation -->
    <div class="md:col-span-1 flex flex-col space-y-8">
        <div class="bg-blue-600 rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-700 text-white p-4 text-lg font-semibold rounded-t-lg">
                PPD Progress
            </div>
            <nav>
                <ul class="text-white">
                    <li><a href="" class="block p-4 bg-blue-600 hover:bg-blue-500 rounded-b-none transition duration-200 ease-in-out">Year 1</a></li>
                    <li><a href="#" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 2</a></li>
                    <li><a href="#" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 3</a></li>
                    <li><a href="#" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 4</a></li>
                    <li><a href="/rizz_counter_graph" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Rizz counter</a></li>
                    <li><a href="/horoscope" class="block p-4 bg-blue-600 hover:bg-blue-500 rounded-b-lg transition duration-200 ease-in-out">Horoscope</a></li>
                </ul>
            </nav>
        </div>

        <button class="bg-blue-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-500 transition duration-200 ease-in-out text-lg font-semibold">
            ENG/NL
        </button>
    </div>

    <!-- Main Content Area -->
    <div class="md:col-span-2 flex flex-col space-y-8">
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
</div>

</body>
</html>
