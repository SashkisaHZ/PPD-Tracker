<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        // Data for the sidebar
        $years = ['Year 1', 'Year 2', 'Year 3', 'Year 4', 'Rizz counter', 'Horoscope'];
        $langOptions = ['ENG', 'NL'];

        return view('main.index', compact('years', 'langOptions'));
    }
}
