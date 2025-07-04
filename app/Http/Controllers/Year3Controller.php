<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Year3Controller extends Controller
{
    /**
     * Display the personal progress view for "Future-oriented organizing" competence for Year 3.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Dummy data for progress on each element of "Future-oriented organizing"
        // In a real application, this data would come from a database,
        // user input, or a scoring system specific to Year 3.
        $elementsProgress = [
            [
                'title' => 'Thinking and planning ahead',
                'description' => 'You are capable of thinking and planning ahead. You plan and monitor the time.',
                'progress' => rand(75, 98), // Example progress percentage
            ],
            [
                'title' => 'Methodical organization of approach',
                'description' => 'You methodically organize your approach (inventory of tasks, order of execution, correct prioritizing) and how this will contribute to the end result.',
                'progress' => rand(65, 92),
            ],
            [
                'title' => 'Cost awareness, opportunities, risks, agreements, legal, and ethical norms',
                'description' => 'You conscious of costs. You recognize opportunities and risks. You are at all time aware of the agreements made, legal regulations and ethical norms.',
                'progress' => rand(70, 95),
            ],
            [
                'title' => 'Feasibility in organizational context',
                'description' => 'You have a keen eye for the feasibility of the tasks in the organization. You consider the characteristics of the context of the assignment.',
                'progress' => rand(60, 90),
            ],
            [
                'title' => 'Researching ethical implications and acknowledging boundaries',
                'description' => 'You research, if necessary and relevant, the ethical implications of the tasks you perform. You acknowledge your own and others (ethical) boundaries and act accordingly.',
                'progress' => rand(55, 85),
            ],
        ];

        return view('main.year3', [
            'elementsProgress' => $elementsProgress,
        ]);
    }
}

