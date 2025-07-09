<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostandPresentationTwo;

class PostandPresentationTwoController extends Controller
{
    public function index()
    {
        $PostandPresentationTwos = PostandPresentationTwo::orderBy('id', 'DESC')->get();
        return view('admin.PostandPresentationTwo.index', compact('PostandPresentationTwos'));
    }

    public function create()
    {
        return view('admin.PostandPresentationTwo.create');
    }

    public function store(Request $request)
    {



$PostandPresentationTwo = PostandPresentationTwo::Create([


            'feature_title' => $request->feature_title,
            'feature' => $request->feature,
            'service_title' => $request->service_title,
            'service' => $request->service,

        ]);
        return redirect()->route('PostandPresentationTwo')->with(['message' => 'Key Features Section Created Successfully']);
    }

    public function edit($id)
    {

        $PostandPresentationTwo= PostandPresentationTwo::find($id);


        return view('admin.PostandPresentationTwo.edit', compact('PostandPresentationTwo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'feature_title' => 'required',
            'feature' => 'required',
            'service_title' => 'required',
            'service' => 'required',
        ]);

        $PostandPresentationTwo = PostandPresentationTwo::findOrFail($id);



        // Update other fields

        $PostandPresentationTwo->feature_title = $request->feature_title;
        $PostandPresentationTwo->feature = $request->feature;
        $PostandPresentationTwo->service_title = $request->service_title;
        $PostandPresentationTwo->service = $request->service;
        $PostandPresentationTwo->save();

        return redirect()->route('PostandPresentationTwo')->with('message', 'Key Features Section Updated Successfully');

    }

    public function destroy($id)
    {
        PostandPresentationTwo::destroy($id);
        return redirect()->route('PostandPresentationTwo')->with(['message' => 'Key Features Section Deleted Successfully']);

    }
}
