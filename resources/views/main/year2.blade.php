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

        <div class="flex-grow space-y-6 overflow-y-auto pr-2"> {{-- Added pr-2 for scrollbar spacing --}}
            @foreach($elementsProgress as $element)
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
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
@endsection
