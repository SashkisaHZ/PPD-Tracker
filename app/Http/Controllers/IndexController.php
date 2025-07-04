<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        // Data for the sidebar
        $years = ['Year 1', 'Year 2', 'Year 3', 'Year 4', 'Rizz counter', 'Horoscope'];
        $langOptions = ['ENG', 'NL'];

        // Get progress arrays from each year controller
        $year1 = app(\App\Http\Controllers\InteractPurposefullyController::class)->index()->getData()['elementsProgress'];
        $year2 = app(\App\Http\Controllers\Year2Controller::class)->index()->getData()['elementsProgress'];
        $year3 = app(\App\Http\Controllers\Year3Controller::class)->index()->getData()['elementsProgress'];
        $year4 = app(\App\Http\Controllers\Year4Controller::class)->index()->getData()['elementsProgress'];

        $avg = fn($arr) => count($arr) ? round(array_sum(array_column($arr, 'progress')) / count($arr)) : 0;

        return view('main.index', compact(
                'years', 'langOptions'
            ) + [
                'avgYear1' => $avg($year1),
                'avgYear2' => $avg($year2),
                'avgYear3' => $avg($year3),
                'avgYear4' => $avg($year4),
            ]);
    }
}
