<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThesisServiceController extends Controller
{
    public function thesisService() {
        return view('thesis_editing');
    }
}
