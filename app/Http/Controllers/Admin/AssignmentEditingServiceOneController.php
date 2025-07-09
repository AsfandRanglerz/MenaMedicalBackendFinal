<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssignmentEditingServiceOne;

class AssignmentEditingServiceOneController extends Controller
{
    public function index()
    {
        $AssignmentEditingServiceOnes = AssignmentEditingServiceOne::orderBy('id', 'ASC')->get();
        return view('admin.ThesisSupport.AssignmentEditingServiceOne.index', compact('AssignmentEditingServiceOnes'));
    }

    public function servicetwoindex()
    {
        $AssignmentEditingServiceOnes = AssignmentEditingServiceOne::orderBy('id', 'ASC')->get();
        return view('admin.ThesisSupport.AssignmentEditingTwo.index', compact('AssignmentEditingServiceOnes'));
    }


    public function create()
    {
        return view('admin.ThesisSupport.AssignmentEditingServiceOne.create');
    }

    public function store(Request $request)
    {
      $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }


$AssignmentEditingServiceOne = AssignmentEditingServiceOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'feature_title' => $request->feature_title,
            'feature' => $request->feature,
            'service_title' => $request->service_title,
            'service' => $request->service,
            'image' =>$image,
        ]);
        return redirect()->route('AssignmentEditingServiceOne')->with(['message' => 'Introduction Section Created Successfully']);
    }

    public function edit($id)
    {

        $AssignmentEditingServiceOne= AssignmentEditingServiceOne::find($id);


        return view('admin.ThesisSupport.AssignmentEditingServiceOne.edit', compact('AssignmentEditingServiceOne'));
    }

    public function servicetwoedit($id)
    {

        $AssignmentEditingServiceOne= AssignmentEditingServiceOne::find($id);


        return view('admin.ThesisSupport.AssignmentEditingTwo.edit', compact('AssignmentEditingServiceOne'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $AssignmentEditingServiceOne = AssignmentEditingServiceOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $AssignmentEditingServiceOne->image = 'public/admin/assets/images/' . $filename;
    }

        // Update other fields
        $AssignmentEditingServiceOne->title = $request->title;
        $AssignmentEditingServiceOne->description = $request->description;
        // $AssignmentEditingServiceOne->feature_title = $request->feature_title;
        // $AssignmentEditingServiceOne->feature = $request->feature;
        // $AssignmentEditingServiceOne->service_title = $request->service_title;
        // $AssignmentEditingServiceOne->service = $request->service;
        $AssignmentEditingServiceOne->save();

        return redirect()->route('AssignmentEditingServiceOne')->with('message', 'Introduction Section Updated Successfully');

    }

    public function servicetwoupdate(Request $request, $id)
    {
        $request->validate([
            'feature_title' => 'required',
            'feature' => 'required',
            'service_title' => 'required',
            'service' => 'required',
        ]);

        $AssignmentEditingServiceOne = AssignmentEditingServiceOne::findOrFail($id);

    // // Update image if a new one is uploaded
    // if ($request->hasFile('image')) {
    //     // Generate a unique filename
    //     $file = $request->file('image');
    //     $filename = time() . '_' . $file->getClientOriginalName();

    //     // Move the file to the target directory
    //     $file->move(public_path('admin/assets/images'), $filename);

    //     // Update the image path relative to 'public'
    //     $AssignmentEditingServiceOne->image = 'public/admin/assets/images/' . $filename;
    // }

        // Update other fields
        // $AssignmentEditingServiceOne->title = $request->title;
        // $AssignmentEditingServiceOne->description = $request->description;
        $AssignmentEditingServiceOne->feature_title = $request->feature_title;
        $AssignmentEditingServiceOne->feature = $request->feature;
        $AssignmentEditingServiceOne->service_title = $request->service_title;
        $AssignmentEditingServiceOne->service = $request->service;
        $AssignmentEditingServiceOne->save();

        return redirect()->route('AssignmentEditingServiceTwo')->with('message', 'Key Features Section Updated Successfully');

    }


    public function destroy($id)
    {
        AssignmentEditingServiceOne::destroy($id);
        return redirect()->route('AssignmentEditingServiceOne')->with(['message' => 'Accidental Plagiarism Section Deleted Successfully']);

    }
}
