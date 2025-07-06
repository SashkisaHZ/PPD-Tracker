<!-- Main Content Area - Horoscope Overview -->
@extends('layouts.main-layout')

@section('title', 'Horoscope')

@section('content')
    <div class="md:col-span-2 flex flex-col items-center justify-center bg-white rounded-lg shadow-md p-4 relative overflow-hidden z-0 h-full">
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
                "Balance and harmony are within your reach.",
                "No, sorry.😔"
            ];

            document.getElementById('generate-btn').addEventListener('click', function() {
                const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
                document.getElementById('horoscope-text').textContent = randomQuote;
            });
        </script>
    </div>
@endsection
