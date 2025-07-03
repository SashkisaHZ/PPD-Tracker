<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horoscope Overview</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Styles for the left sidebar's top section */
        .sidebar-top-section {
            background-color: #3b82f6; /* Blue background */
            color: white;
            padding: 0.75rem 1rem; /* py-3 px-4 */
            font-weight: 600; /* font-semibold */
            border-top-left-radius: 0.5rem; /* rounded-tl-lg */
            border-top-right-radius: 0.5rem; /* rounded-tr-lg */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Styles for the left sidebar's bottom section */
        .sidebar-bottom-section {
            background-color: #3b82f6; /* Blue background */
            color: white;
            padding: 0.75rem 1rem; /* py-3 px-4 */
            font-weight: 600; /* font-semibold */
            border-bottom-left-radius: 0.5rem; /* rounded-bl-lg */
            border-bottom-right-radius: 0.5rem; /* rounded-br-lg */
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto; /* Pushes it to the bottom */
        }
    </style>
</head>
<body class="bg-blue-100 font-sans p-8">

<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 h-screen">

    <!-- Left Sidebar / Navigation -->
    <div class="md:col-span-1 flex flex-col space-y-8">
        <div class="bg-blue-600 rounded-lg shadow-md overflow-hidden flex flex-col flex-grow">
            <div class="sidebar-top-section">
                <span class="text-lg"><a href="/index">Personal Overview</a></span>
            </div>
            <nav class="flex-grow">
                <ul class="text-white">
                    <li><a href="#" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 1</a></li>
                    <li><a href="#" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 2</a></li>
                    <li><a href="#" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 3</a></li>
                    <li><a href="#" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 4</a></li>
                    <li><a href="/rizz_counter_graph" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Rizz counter</a></li>
                    <li><a href="/horoscope" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Horoscope</a></li>
                </ul>
            </nav>
            <div class="sidebar-bottom-section">
                <!-- In the sidebar-bottom-section -->
                <span id="sidebar-clock" class="text-lg"></span>

                <!-- Place this script just before </body> -->
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
            </div>
        </div>
    </div>

    <!-- Main Content Area - Horoscope Overview -->
    <div class="md:col-span-2 flex flex-col items-center justify-center bg-white rounded-lg shadow-md p-4 relative overflow-hidden z-0">
        <!-- Faded foreground image (in front of white, behind content) -->
        <div class="absolute inset-0 flex items-center justify-center z-10"
             style="background-image: url('/images/Horoscope.png'); background-size: contain; background-repeat: no-repeat; background-position: center; opacity: 0.2;">
        </div>

        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center z-20">
            Let's see if the planets<br>are on your side
        </h2>

        <div class="bg-gray-100 p-8 rounded-lg shadow-inner w-full max-w-md text-center mb-8 z-20" style="min-height: 120px;">
            <p id="horoscope-text" class="text-gray-600 text-lg italic"></p>
            <div class="border-b-2 border-gray-400 mt-4 mx-auto w-3/4"></div>
        </div>

        <button id="generate-btn" class="bg-blue-600 text-white py-3 px-8 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 ease-in-out text-xl font-bold z-20">
            Generate
        </button>

        <script>
            const quotes = [
                "Today, the universe is on your side—embrace new beginnings.",
                "A surprise encounter will bring joy and inspiration.",
                "Trust your intuition, it will guide you to success.",
                "Your kindness will return to you in unexpected ways.",
                "Opportunities are closer than they appear—stay alert.",
                "Let go of worries, positive energy surrounds you.",
                "A creative idea will spark progress in your journey.",
                "Someone close will offer valuable support today.",
                "Take a bold step—fortune favors the brave.",
                "Balance and harmony are within your reach."
            ];

            document.getElementById('generate-btn').addEventListener('click', function() {
                const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
                document.getElementById('horoscope-text').textContent = randomQuote;
            });
        </script>
    </div>
</div>

</body>
</html>
