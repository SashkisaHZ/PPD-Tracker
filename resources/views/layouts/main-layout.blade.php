<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'App')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .sidebar-top-section {
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem 1rem;
            font-weight: 600;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar-bottom-section {
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem 1rem;
            font-weight: 600;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }
    </style>
</head>
<body class="bg-blue-100 font-sans p-8">

<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 h-screen">

    <!-- Sidebar -->
    <div class="md:col-span-1 flex flex-col space-y-8">
        <div class="bg-blue-600 rounded-lg shadow-md overflow-hidden flex flex-col flex-grow">
            <div class="sidebar-top-section">
                <span class="text-lg">
                    <a href="/index" class="hover:underline">Personal Overview</a>
                </span>
            </div>
            <nav class="flex-grow">
                <ul class="text-white">
                    <li><a href="#" class="block p-4 hover:bg-blue-500 transition">Year 1</a></li>
                    <li><a href="#" class="block p-4 hover:bg-blue-500 transition">Year 2</a></li>
                    <li><a href="#" class="block p-4 hover:bg-blue-500 transition">Year 3</a></li>
                    <li><a href="#" class="block p-4 hover:bg-blue-500 transition">Year 4</a></li>
                    <li><a href="/rizz_counter_graph" class="block p-4 hover:bg-blue-500 transition">Rizz Counter</a></li>
                    <li><a href="/horoscope" class="block p-4 hover:bg-blue-500 transition">Horoscope</a></li>
                </ul>
            </nav>
            <div class="sidebar-bottom-section">
                <span id="sidebar-clock" class="text-lg"></span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="md:col-span-2 overflow-y-auto">
        @yield('content')
    </div>

</div>

<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        document.getElementById('sidebar-clock').textContent = `${hours}:${minutes}`;
    }
    updateClock();
    setInterval(updateClock, 1000);
</script>

<!-- Include Chart.js BEFORE any script that uses it -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Stack for page-specific scripts -->
@stack('scripts')

</body>
</html>
