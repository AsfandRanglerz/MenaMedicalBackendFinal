<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LanguageEditingTwo;
use App\Http\Controllers\Controller;

class LanguageEditingTwoController extends Controller
{
    public function index()
    {
        $LanguageEditingTwos = LanguageEditingTwo::orderBy('id', 'ASC')->get();
        return view('admin.LanguageEditingTwo.index', compact('LanguageEditingTwos'));
    }

    public function create()
    {
        return view('admin.LanguageEditingTwo.create');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }


$LanguageEditingTwo = LanguageEditingTwo::Create([

            'title' => $request->title,
            'description' => $request->description,
            'colour' => $request->colour,
        ]);
        return redirect()->route('LanguageEditingTwo')->with(['message' => 'Packages Section Created Successfully']);
    }

    public function edit($id)
    {

        $LanguageEditingTwo= LanguageEditingTwo::find($id);


        return view('admin.LanguageEditingTwo.edit', compact('LanguageEditingTwo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $LanguageEditingTwo = LanguageEditingTwo::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $LanguageEditingTwo->image = 'public/admin/assets/images/' . $filename;
    }

        // Update other fields
        $LanguageEditingTwo->title = $request->title;
        $LanguageEditingTwo->description = $request->description;
        // $LanguageEditing->colour =  $request->colour;
        $LanguageEditingTwo->save();

        return redirect()->route('LanguageEditingTwo')->with('message', 'Packages Section Updated Successfully');

    }

    public function destroy($id)
    {
        LanguageEditingTwo::destroy($id);
        return redirect()->route('LanguageEditingTwo')->with(['message' => 'Packages Section Deleted Successfully']);

    }
}
