<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManuscriptFormattingFormController extends Controller
{
    public function manuscriptFormattingForm() {
        return view('manuscript_formatting_service');
    }
}
