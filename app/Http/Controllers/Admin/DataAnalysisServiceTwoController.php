<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataAnalysisServiceTwo;

class DataAnalysisServiceTwoController extends Controller
{
    public function index()
    {
        $DataAnalysisServiceTwos = DataAnalysisServiceTwo::orderBy('id', 'DESC')->get();
        return view('admin.DataAnalysisServiceTwo.index', compact('DataAnalysisServiceTwos'));
    }

    public function create()
    {
        return view('admin.DataAnalysisServiceTwo.create');
    }

    public function store(Request $request)
    {



$DataAnalysisServiceTwo = DataAnalysisServiceTwo::Create([


            'feature_title' => $request->feature_title,
            'feature' => $request->feature,

        ]);
        return redirect()->route('DataAnalysisServiceTwo')->with(['message' => 'Features of Advanced Section Created Successfully']);
    }

    public function edit($id)
    {

        $DataAnalysisServiceTwo= DataAnalysisServiceTwo::find($id);


        return view('admin.DataAnalysisServiceTwo.edit', compact('DataAnalysisServiceTwo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'feature_title' => 'required',
            'feature' => 'required',
        ]);

        $DataAnalysisServiceTwo = DataAnalysisServiceTwo::findOrFail($id);



        // Update other fields

        $DataAnalysisServiceTwo->feature_title = $request->feature_title;
        $DataAnalysisServiceTwo->feature = $request->feature;
        $DataAnalysisServiceTwo->save();

        return redirect()->route('DataAnalysisServiceTwo')->with('message', 'Features of Advanced Section Updated Successfully');

    }

    public function destroy($id)
    {
        DataAnalysisServiceTwo::destroy($id);
        return redirect()->route('DataAnalysisServiceTwo')->with(['message' => 'Features of Advanced Section Deleted Successfully']);

    }
}
