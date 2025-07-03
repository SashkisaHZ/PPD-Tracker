<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RizzCounterController extends Controller
{
    /**
     * Display the Rizz Counter trend graph page.
     *
     * @return \Illuminate\View\View
     */
    public function rizzCounter()
    {
        // Dummy data for the Rizz Counter trend graph
        // In a real application, this data would come from a database or other source.

        // Months for the X-axis
        $months = collect([1, 2, 3, 4, 5, 6]); // Example months (January to June)

        // Define the fields/metrics we want to track
        $fields = [
            'rizzScore' => 'Rizz Score',
            'confidenceLevel' => 'Confidence Level',
            'socialInteractions' => 'Social Interactions',
        ];

        $data = [];

        // Generate dummy data for each field across the months
        foreach ($fields as $field => $label) {
            $fieldData = [];
            $baseValue = rand(50, 100); // Starting point for dummy data
            foreach ($months as $month) {
                // Simulate some trend: generally increasing with some fluctuations
                $value = $baseValue + ($month * 5) + rand(-10, 10);
                $fieldData[] = max(0, $value); // Ensure value doesn't go below zero
            }
            $data[$field] = $fieldData;
        }

        return view('main.rizz_counter_graph', [
            'months' => $months,
            'fields' => $fields,
            'data' => $data,
        ]);
    }
}

