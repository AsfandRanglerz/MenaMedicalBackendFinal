<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimilarityReviewController extends Controller
{
    public function similarityReviewReport() {
        return view('similarty_review_report');
    }
}
