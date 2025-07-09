<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ThesisEditingServiceThree;

class ThesisEditingServiceThreeController extends Controller
{
    public function index()
    {
        $ThesisEditingServiceThrees = ThesisEditingServiceThree::orderBy('id', 'DESC')->get();
        return view('admin.ThesisSupport.ThesisEditingServiceThree.index', compact('ThesisEditingServiceThrees'));
    }

    public function create()
    {
        return view('admin.ThesisSupport.ThesisEditingServiceThree.create');
    }

    public function store(Request $request)
    {



$ThesisEditingServiceThree = ThesisEditingServiceThree::Create([


            'feature_title' => $request->feature_title,
            'feature' => $request->feature,
            'service_title' => $request->service_title,
            'service' => $request->service,

        ]);
        return redirect()->route('ThesisEditingServiceThree')->with(['message' => 'Features of Premium Section Created Successfully']);
    }

    public function edit($id)
    {

        $ThesisEditingServiceThree= ThesisEditingServiceThree::find($id);


        return view('admin.ThesisSupport.ThesisEditingServiceThree.edit', compact('ThesisEditingServiceThree'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'feature_title' => 'required',
            'feature' => 'required',
            'service_title' => 'required',
            'service' => 'required',
        ]);

        $ThesisEditingServiceThree = ThesisEditingServiceThree::findOrFail($id);



        // Update other fields

        $ThesisEditingServiceThree->feature_title = $request->feature_title;
        $ThesisEditingServiceThree->feature = $request->feature;
        $ThesisEditingServiceThree->service_title = $request->service_title;
        $ThesisEditingServiceThree->service = $request->service;
        $ThesisEditingServiceThree->save();

        return redirect()->route('ThesisEditingServiceThree')->with('message', 'Features of Premium Section Updated Successfully');

    }

    public function destroy($id)
    {
        ThesisEditingServiceThree::destroy($id);
        return redirect()->route('ThesisEditingServiceThree')->with(['message' => 'Features of Premium Section Deleted Successfully']);

    }
}
