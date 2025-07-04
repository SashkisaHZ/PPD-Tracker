<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskProgressController extends Controller
{
    public function update(Request $request, $year, $index)
    {
        if (auth()->user()->role !== 'teacher') {
            abort(403);
        }

        $sessionKey = "year{$year}_progress";
        $elementsProgress = session($sessionKey);

        if ($elementsProgress && isset($elementsProgress[$index])) {
            $elementsProgress[$index]['progress'] = (int) $request->progress;
            session([$sessionKey => $elementsProgress]);
        }

        return back()->with('status', 'Progress updated!');
    }

    public function feedback(Request $request, $year, $index)
    {
        if (auth()->user()->role !== 'teacher') {
            abort(403);
        }

        $sessionKey = "year{$year}_feedback";
        $feedbacks = session($sessionKey, []);
        $feedbacks[$index] = $request->feedback;
        session([$sessionKey => $feedbacks]);

        // Add notification for student
        $notifications = session('notifications', []);
        $notifications[] = [
            'message' => "New feedback for Year $year, Competency #" . ($index + 1) . ": " . $request->feedback,
            'timestamp' => now()->toDateTimeString(),
        ];
        session(['notifications' => $notifications]);

        return back()->with('status', 'Feedback submitted!');
    }
}
