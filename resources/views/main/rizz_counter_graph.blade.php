@extends('layouts.main-layout')

@section('title', 'Rizz Counter Trend')

@section('content')
    <div class="md:col-span-2 flex flex-col bg-white rounded-lg shadow-md p-6 overflow-hidden h-full">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Rizz Counter Trend Graph</h1>

        <div class="flex-grow flex items-center justify-center">
            <!-- Set fixed height for canvas -->
            <canvas id="rizzTrendChart" class="w-full h-96"></canvas>
        </div>

        <div class="text-center mt-6">
            {{-- Optional navigation or buttons here --}}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('rizzTrendChart').getContext('2d');

            const monthLabels = {!! json_encode(
            collect($months)->map(fn($m) =>
                \DateTime::createFromFormat('!m', str_pad($m, 2, '0', STR_PAD_LEFT))->format('F')
            )
        ) !!};

            const colors = {
                'rizzScore': 'rgba(255, 99, 132, 0.7)',
                'confidenceLevel': 'rgba(54, 162, 235, 0.7)',
                'socialInteractions': 'rgba(75, 192, 192, 0.7)',
            };

            const datasets = [
                    @foreach ($fields as $field => $label)
                {
                    label: "{{ $label }}",
                    data: {!! json_encode($data[$field]) !!},
                    borderColor: colors['{{ $field }}'],
                    backgroundColor: colors['{{ $field }}'].replace('0.7', '0.3'),
                    fill: false,
                    tension: 0.3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                },
                @endforeach
            ];

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: monthLabels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            bodyFont: { size: 14 },
                            titleFont: { size: 16, weight: 'bold' },
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
                                text: 'Score / Level',
                                font: { size: 16, weight: 'bold' }
                            },
                            ticks: { font: { size: 12 } }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Months',
                                font: { size: 16, weight: 'bold' }
                            },
                            ticks: { font: { size: 12 } }
                        }
                    }
                }
            });
        });
    </script>
@endpush
