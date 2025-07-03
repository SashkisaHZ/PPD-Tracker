<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rizz Counter Trend Graph</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <li><a href="/year1" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 1</a></li>
                    <li><a href="/year2" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 2</a></li>
                    <li><a href="/year3" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 3</a></li>
                    <li><a href="/year4" class="block p-4 bg-blue-600 hover:bg-blue-500 transition duration-200 ease-in-out">Year 4</a></li>
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

    <!-- Main Content Area - Rizz Counter Trend Graph -->
    <div class="md:col-span-2 flex flex-col bg-white rounded-lg shadow-md p-6 overflow-hidden">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Rizz Counter Trend Graph</h1>

        <div class="flex-grow flex items-center justify-center">
            <canvas id="rizzTrendChart" class="w-full h-full"></canvas>
        </div>

        <div class="text-center mt-6">
            {{-- You can add a button or link here if needed, e.g., to go back to a dashboard --}}
            {{-- <a href="#" class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 ease-in-out">Back to Dashboard</a> --}}
        </div>
    </div>
</div>

@php
    // Convert month numbers to names for labels in PHP before passing to JS
    $monthLabels = $months->map(function($m) {
        return \DateTime::createFromFormat('!m', str_pad($m, 2, '0', STR_PAD_LEFT))->format('F');
    })->toArray();
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('rizzTrendChart').getContext('2d');

        // Use the PHP-prepared monthLabels array
        const monthLabels = @json($monthLabels);

        // Prepare colors for datasets
        const colors = {
            'rizzScore': 'rgba(255, 99, 132, 0.7)', // Reddish for Rizz Score
            'confidenceLevel': 'rgba(54, 162, 235, 0.7)', // Blue for Confidence
            'socialInteractions': 'rgba(75, 192, 192, 0.7)', // Greenish for Social Interactions
        };

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [
                        @foreach ($fields as $field => $label)
                    {
                        label: "{{ $label }}",
                        data: @json($data[$field]),
                        borderColor: colors['{{ $field }}'] || 'rgba(0,0,0,0.7)',
                        backgroundColor: colors['{{ $field }}'] ? colors['{{ $field }}'].replace('0.7', '0.3') : 'rgba(0,0,0,0.3)', // Lighter fill
                        fill: false,
                        tension: 0.3,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    },
                    @endforeach
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Allow canvas to fill parent container
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        bodyFont: {
                            size: 14
                        },
                        titleFont: {
                            size: 16,
                            weight: 'bold'
                        }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    intersect: false
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Score/Level',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Months',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    });
</script>
</body>
</html>
