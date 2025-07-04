@extends('layouts.main-layout')

@section('title', 'Year 2 Progress')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 h-full flex flex-col">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Year 2: Research-oriented Problem-Solving Progress</h1>

        <div class="mb-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <h2 class="text-xl font-semibold text-blue-800 mb-2">Competence Description:</h2>
            <p class="text-gray-700 leading-relaxed">
                You are capable of critically viewing ICT-assignments from different angles/perspectives, identify problems, to come to an effective approach and find suitable solutions.
            </p>
        </div>

        <div class="flex-grow space-y-6 overflow-y-auto pr-2">
            @foreach($elementsProgress as $index => $element)
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200 cursor-pointer"
                     onclick="showModal({{ $index }})">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $element['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $element['description'] }}</p>
                    <div class="w-full bg-gray-200 rounded-full h-4 relative overflow-hidden">
                        <div class="bg-blue-500 h-4 rounded-full transition-all duration-500 ease-out"
                             style="width: {{ $element['progress'] }}%;">
                        </div>
                        <span class="absolute inset-0 flex items-center justify-center text-xs font-bold text-white"
                              style="text-shadow: 1px 1px 2px rgba(0,0,0,0.4);">
                            {{ $element['progress'] }}%
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal --}}
    <div id="taskModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full relative" onclick="event.stopPropagation()">
            <button class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl" onclick="hideModal()">&times;</button>
            <h2 id="modalTitle" class="text-2xl font-bold mb-4"></h2>
            <p id="modalDescription" class="text-gray-700 mb-4"></p>
            <div>
                <span class="font-semibold">Progress:</span>
                <span id="modalProgress" class="ml-2"></span>
            </div>
        </div>
    </div>

    <script>
        const elements = @json($elementsProgress);

        function showModal(index) {
            document.getElementById('modalTitle').textContent = elements[index].title;
            document.getElementById('modalDescription').textContent = elements[index].description;
            document.getElementById('modalProgress').textContent = elements[index].progress + '%';
            document.getElementById('taskModal').classList.remove('hidden');
        }

        function hideModal() {
            document.getElementById('taskModal').classList.add('hidden');
        }

        document.getElementById('taskModal').addEventListener('click', hideModal);
    </script>
@endsection
