<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoroscopeController extends Controller
{
    /**
     * Display the horoscope overview page.
     *
     * @return \Illuminate\View\View
     */
    public function horoscope()
    {
        // This method will simply return the horoscope_overview blade view.
        // In a real application, you might fetch data here (e.g., from a database)
        // and pass it to the view.
        return view('main.horoscope');
    }

    /**
     * Handle the generation of horoscope text (example method).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generate(Request $request)
    {
        // This is an example method for the "Generate" button.
        // You would implement the logic to generate horoscope text here.
        // For now, it returns a dummy response.
        $generatedText = "The stars align today for a day of unexpected joy and minor challenges. Embrace new opportunities!";

        return response()->json([
            'horoscope_text' => $generatedText,
            'status' => 'success'
        ]);
    }
}

