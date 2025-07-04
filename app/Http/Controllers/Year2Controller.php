<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Year2Controller extends Controller
{
    /**
     * Display the personal progress view for "Research-oriented problem-solving" competence for Year 2.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Dummy data for progress on each element of "Research-oriented problem-solving"
        // In a real application, this data would come from a database,
        // user input, or a scoring system specific to Year 2.
        $elementsProgress = [
            [
                'title' => 'Identifying and analyzing problems',
                'description' => 'You are capable of identifying problems/challenges and perceive them in their proper context (department/company/business environment/societal environment) and analyze them accordingly.',
                'progress' => rand(70, 95), // Example progress percentage
            ],
            [
                'title' => 'Envisioning multiple solutions',
                'description' => 'You are capable, when necessary and relevant, to envision more than one solution.',
                'progress' => rand(60, 90),
            ],
            [
                'title' => 'Curiosity and critical thinking in solution finding',
                'description' => 'During the process of finding solutions you remain curious, ask questions from different perspectives. You are also pragmatic, creative, critical and use, and, when necessary and relevant, use different sources of (expert) information.',
                'progress' => rand(75, 98),
            ],
            [
                'title' => 'Methodical choice and argumentation of solutions',
                'description' => 'You make deliberate and methodical choices for the correct/most suitable/appropriate solution or approach. You are aware and critical of your substantiation and argumentation of these solutions/approaches.',
                'progress' => rand(65, 92),
            ],
        ];

        return view('main.year2', [
            'elementsProgress' => $elementsProgress,
        ]);
    }
}

