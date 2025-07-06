<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Year4Controller extends Controller
{
    public function index()
    {
        $elementsProgress = session('year4_progress');
        if (!$elementsProgress) {
            $elementsProgress = [
                [
                    'title' => 'Entrepreneurial: Initiative and Responsibility',
                    'description' => 'You are considered, see chances and seize them. You have a pro-active attitude: you take initiative and responsibility for what you do.',
                    'progress' => rand(75, 98),
                ],
                [
                    'title' => 'Entrepreneurial: Motivation and Support',
                    'description' => 'You motivate yourself and others. You are willing to help and support others, individuals and the team as a whole alike.',
                    'progress' => rand(70, 95),
                ],
                [
                    'title' => 'Entrepreneurial: Representation and Development',
                    'description' => 'You can represent yourself and your team. You are capable to take along others in your personal development.',
                    'progress' => rand(65, 92),
                ],
                [
                    'title' => 'Personal Development: Learn to Learn Attitude',
                    'description' => 'You manifest you have made a deliberate choice for ICT. You have a ‘learn to learn’ attitude. You recognize a learning need and act upon that, reflect and evaluate the outcome and ask for feedback. You recognize when you need help or support and you make sure you get that.',
                    'progress' => rand(80, 99),
                ],
                [
                    'title' => 'Personal Profiling: ICT Professional Aspirations',
                    'description' => 'You can specify what kind of ICT professional you want to become and/or what type of positions you aspire. You know your strengths and weaknesses and you are capable of describing yourself.',
                    'progress' => rand(70, 90),
                ],
            ];
            session(['year4_progress' => $elementsProgress]);
        }

        return view('main.year4', [
            'elementsProgress' => $elementsProgress,
        ]);
    }
}
