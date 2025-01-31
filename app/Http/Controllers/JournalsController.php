<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JournalsController extends Controller
{
    public function journalModule() {
        return view('journals');
    }
}
