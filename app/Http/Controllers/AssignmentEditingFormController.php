<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentEditingFormController extends Controller
{
    public function assignmentEditingForm() {
        return view('assignment_editing_service_form');
    }
}
