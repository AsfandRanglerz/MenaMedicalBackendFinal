<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ThesisEditingServiceTwo;

class ThesisEditingServiceTwoController extends Controller
{
    public function index()
    {
        $ThesisEditingServiceTwos = ThesisEditingServiceTwo::orderBy('id', 'DESC')->get();
        return view('admin.ThesisSupport.ThesisEditingServiceTwo.index', compact('ThesisEditingServiceTwos'));
    }

    public function create()
    {
        return view('admin.ThesisSupport.ThesisEditingServiceTwo.create');
    }

    public function store(Request $request)
    {



$ThesisEditingServiceTwo = ThesisEditingServiceTwo::Create([


            'feature_title' => $request->feature_title,
            'feature' => $request->feature,
            'service_title' => $request->service_title,
            'service' => $request->service,

        ]);
        return redirect()->route('ThesisEditingServiceTwo')->with(['message' => 'Features of Advanced Section Created Successfully']);
    }

    public function edit($id)
    {

        $ThesisEditingServiceTwo= ThesisEditingServiceTwo::find($id);


        return view('admin.ThesisSupport.ThesisEditingServiceTwo.edit', compact('ThesisEditingServiceTwo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'feature_title' => 'required',
            'feature' => 'required',
            'service_title' => 'required',
            'service' => 'required',
        ]);

        $ThesisEditingServiceTwo = ThesisEditingServiceTwo::findOrFail($id);



        // Update other fields

        $ThesisEditingServiceTwo->feature_title = $request->feature_title;
        $ThesisEditingServiceTwo->feature = $request->feature;
        $ThesisEditingServiceTwo->service_title = $request->service_title;
        $ThesisEditingServiceTwo->service = $request->service;
        $ThesisEditingServiceTwo->save();

        return redirect()->route('ThesisEditingServiceTwo')->with('message', 'Features of Advanced Section Updated Successfully');

    }

    public function destroy($id)
    {
        ThesisEditingServiceTwo::destroy($id);
        return redirect()->route('ThesisEditingServiceTwo')->with(['message' => 'Features of Advanced Section Deleted Successfully']);

    }
}
