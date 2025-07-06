@php
    $isTeacher = Auth::user()->role === 'teacher';
    $feedbacks = session("year1_feedback", []);
@endphp

@extends('layouts.main-layout')

@section('title', 'Interact Purposefully Progress')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 h-full flex flex-col">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Interact Purposefully: Personal Progress</h1>

        <div class="mb-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <h2 class="text-xl font-semibold text-blue-800 mb-2">Competence Description:</h2>
            <p class="text-gray-700 leading-relaxed">
                Acting with an intended purpose: You are pro-active in your actions and communication. You are aware of your actions/communication and how to adapt to various situations and target audiences. You are capable to convey your message professionally.
            </p>
        </div>

        <div class="flex-grow space-y-6 overflow-y-auto pr-2">
            @foreach($elementsProgress as $index => $element)
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $element['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $element['description'] }}</p>
                    <div id="progress-bar-{{ $index }}">
                        <div class="w-full bg-gray-200 rounded-full h-4 relative overflow-hidden">
                            <div class="bg-blue-500 h-4 rounded-full transition-all duration-500 ease-out"
                                 style="width: {{ $element['progress'] }}%;">
                            </div>
                            <span class="absolute inset-0 flex items-center justify-center text-xs font-bold text-white"
                                  style="text-shadow: 1px 1px 2px rgba(0,0,0,0.4);">
                                {{ $element['progress'] }}%
                            </span>
                        </div>
                        @if($isTeacher)
                            <button type="button"
                                    class="mt-2 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded transition"
                                    onclick="showEdit({{ $index }})">
                                Edit
                            </button>
                            <button type="button"
                                    class="mt-2 ml-2 bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded transition"
                                    onclick="showFeedback({{ $index }})">
                                Feedback
                            </button>
                        @endif
                    </div>
                    @if($isTeacher)
                        <form id="edit-form-{{ $index }}" method="POST" action="{{ route('tasks.update', [1, $index]) }}"
                              class="flex items-center space-x-2 mt-2 hidden">
                            @csrf
                            @method('PUT')
                            <input type="number" name="progress" value="{{ $element['progress'] }}" min="0" max="100" class="w-20 border rounded px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                            <button type="button" class="bg-gray-400 text-white px-3 py-1 rounded" onclick="hideEdit({{ $index }})">Cancel</button>
                        </form>
                        <form id="feedback-form-{{ $index }}" method="POST" action="{{ route('tasks.feedback', [1, $index]) }}"
                              class="flex items-center space-x-2 mt-2 hidden">
                            @csrf
                            <input type="text" name="feedback" value="{{ $feedbacks[$index] ?? '' }}" class="w-64 border rounded px-2 py-1" placeholder="Enter feedback...">
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                            <button type="button" class="bg-gray-400 text-white px-3 py-1 rounded" onclick="hideFeedback({{ $index }})">Cancel</button>
                        </form>
                        <!-- Feedback edit form (hidden by default) -->
                        <form id="feedback-edit-form-{{ $index }}" method="POST" action="{{ route('tasks.feedback', [1, $index]) }}"
                              class="flex items-center space-x-2 mt-2 hidden">
                            @csrf
                            <input type="text" name="feedback" value="{{ $feedbacks[$index] ?? '' }}" class="w-64 border rounded px-2 py-1" placeholder="Edit feedback...">
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Update</button>
                            <button type="button" class="bg-gray-400 text-white px-2 py-1 rounded text-xs" onclick="hideFeedbackEdit({{ $index }})">Cancel</button>
                        </form>
                        <!-- Delete feedback form (hidden, submits empty feedback) -->
                        <form id="feedback-delete-form-{{ $index }}" method="POST" action="{{ route('tasks.feedback', [1, $index]) }}" style="display:none;">
                            @csrf
                            <input type="hidden" name="feedback" value="">
                        </form>
                    @endif
                    @if(isset($feedbacks[$index]) && $feedbacks[$index])
                        <div class="mt-2 p-2 bg-blue-50 border-l-4 border-blue-400 text-blue-800 rounded flex items-center justify-between">
                            <div>
                                <strong>Feedback:</strong> {{ $feedbacks[$index] }}
                            </div>
                            @if($isTeacher)
                                <div class="flex space-x-1 ml-2">
                                    <button type="button" class="text-xs bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded"
                                            onclick="showFeedbackEdit({{ $index }})" title="Edit feedback">
                                        ✏️
                                    </button>
                                    <button type="button" class="text-xs bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded"
                                            onclick="deleteFeedback({{ $index }})" title="Delete feedback">
                                        🗑️
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    @if($isTeacher)
        <script>
            function showEdit(index) {
                document.getElementById('progress-bar-' + index).style.display = 'none';
                document.getElementById('edit-form-' + index).style.display = 'flex';
            }
            function hideEdit(index) {
                document.getElementById('progress-bar-' + index).style.display = '';
                document.getElementById('edit-form-' + index).style.display = 'none';
            }
            function showFeedback(index) {
                document.getElementById('feedback-form-' + index).style.display = 'flex';
            }
            function hideFeedback(index) {
                document.getElementById('feedback-form-' + index).style.display = 'none';
            }
            function showFeedbackEdit(index) {
                document.getElementById('feedback-edit-form-' + index).style.display = 'flex';
            }
            function hideFeedbackEdit(index) {
                document.getElementById('feedback-edit-form-' + index).style.display = 'none';
            }
            function deleteFeedback(index) {
                if (confirm('Are you sure you want to delete this feedback?')) {
                    document.getElementById('feedback-delete-form-' + index).submit();
                }
            }
        </script>
    @endif
@endsection
