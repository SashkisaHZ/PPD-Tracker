<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteractPurposefullyController extends Controller
{
    /**
     * Display the personal progress view for "Interact purposefully" competence.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Dummy data for progress on each element
        // In a real application, this data would come from a database,
        // user input, or a scoring system.
        $elementsProgress = [
            [
                'title' => 'Focus on various groups of stakeholders',
                'description' => 'You focus on the various groups of stakeholders such as partners, interest groups, individual team members and so on.',
                'progress' => rand(60, 95), // Example progress percentage
            ],
            [
                'title' => 'Purposeful communication',
                'description' => 'You focus on what you want to communicate, with what purpose and at what target audience you aim. You choose the most appropriated communication form and execute this in a proactive manner.',
                'progress' => rand(50, 90),
            ],
            [
                'title' => 'Proactive role within ICT assignment',
                'description' => 'You focus on your role within the context of your ICT assignment, you recognize what needs to be done and proactively pick up tasks. You dare to address others (giving feedback) and are open to receiving feedback.',
                'progress' => rand(70, 98),
            ],
            [
                'title' => 'Open mind to differing opinions',
                'description' => 'You have an open mind towards opinions/views/argument that differ from yours and consider these as an enrichment.',
                'progress' => rand(65, 92),
            ],
            [
                'title' => 'Building interdisciplinary and intercultural cooperation',
                'description' => 'You build deliberately towards an interdisciplinary and intercultural cooperation context.',
                'progress' => rand(55, 85),
            ],
        ];

        return view('main.year1', [
            'elementsProgress' => $elementsProgress,
        ]);
    }
}

