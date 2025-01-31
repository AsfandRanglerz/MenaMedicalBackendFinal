<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvancedDataController extends Controller
{
    public function advancedDataAnalysis() {
        return view('advanced_data_analysis_service');
    }
}
