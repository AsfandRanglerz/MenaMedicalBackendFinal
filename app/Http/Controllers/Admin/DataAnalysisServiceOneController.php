<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataAnalysisServiceOne;

class DataAnalysisServiceOneController extends Controller
{
    public function index()
    {
        $DataAnalysisServiceOnes = DataAnalysisServiceOne::orderBy('id', 'DESC')->get();
        return view('admin.DataAnalysisServiceOne.index', compact('DataAnalysisServiceOnes'));
    }

    public function create()
    {
        return view('admin.DataAnalysisServiceOne.create');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }


$DataAnalysisServiceOne = DataAnalysisServiceOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'link_text' => $request->link_text,
            'image' =>$image,
        ]);
        return redirect()->route('DataAnalysisServiceOne')->with(['message' => 'Introduction  Section Created Successfully']);
    }

    public function edit($id)
    {

        $DataAnalysisServiceOne= DataAnalysisServiceOne::find($id);


        return view('admin.DataAnalysisServiceOne.edit', compact('DataAnalysisServiceOne'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link_text' => 'required',
        ]);

        $DataAnalysisServiceOne = DataAnalysisServiceOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $DataAnalysisServiceOne->image = 'public/admin/assets/images/' . $filename;
    }

        // Update other fields
        $DataAnalysisServiceOne->title = $request->title;
        $DataAnalysisServiceOne->description = $request->description;
        $DataAnalysisServiceOne->link_text = $request->link_text;
        $DataAnalysisServiceOne->save();

        return redirect()->route('DataAnalysisServiceOne')->with('message', 'Introduction Section Updated Successfully');

    }

    public function destroy($id)
    {
        DataAnalysisServiceOne::destroy($id);
        return redirect()->route('DataAnalysisServiceOne')->with(['message' => 'Introduction Section Deleted Successfully']);

    }
}
