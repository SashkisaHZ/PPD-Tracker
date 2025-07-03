<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Year 3</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 font-sans p-8">

<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

    <!-- Sidebar -->
    <div class="md:col-span-1 flex flex-col space-y-8">
        <div class="bg-blue-600 rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-700 text-white p-4 text-lg font-semibold rounded-t-lg">
                PPD Progress
            </div>
            <nav>
                <ul class="text-white">
                    <li><a href="/year1" class="block p-4 bg-blue-600 hover:bg-blue-500 transition">Year 1</a></li>
                    <li><a href="/year2" class="block p-4 bg-blue-600 hover:bg-blue-500 transition">Year 2</a></li>
                    <li><a href="/year3" class="block p-4 bg-blue-600 hover:bg-blue-500 transition">Year 3</a></li>
                    <li><a href="/year4" class="block p-4 bg-blue-600 hover:bg-blue-500 transition">Year 4</a></li>
                    <li><a href="/rizz_counter_graph" class="block p-4 bg-blue-600 hover:bg-blue-500 transition">Rizz counter</a></li>
                    <li><a href="/horoscope" class="block p-4 bg-blue-600 hover:bg-blue-500 rounded-b-lg transition">Horoscope</a></li>
                </ul>
            </nav>
        </div>

        <button class="bg-blue-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-500 text-lg font-semibold">
            ENG/NL
        </button>
    </div>

    <!-- Main content -->
    <div class="md:col-span-2">
        <div class="bg-white rounded-lg shadow-md h-96"></div>
    </div>

</div>
</body>
</html>
