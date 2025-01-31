<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosterPresentationController extends Controller
{
    public function posterPresentationService() {
        return view('poster_presentation_service');
    }
}
