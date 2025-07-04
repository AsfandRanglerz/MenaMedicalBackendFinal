<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LanguageEditingOne;
use App\Http\Controllers\Controller;

class LanguageEditingOneController extends Controller
{
    public function index()
    {
        $LanguageEditings = LanguageEditingOne::orderBy('id', 'DESC')->get();
        return view('admin.LanguageEditingOne.index', compact('LanguageEditings'));
    }

    public function create()
    {
        return view('admin.LanguageEditingOne.create');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }


            $LanguageEditingOne = LanguageEditingOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
            ]);
        return redirect()->route('LanguageEditingOne')->with(['message' => 'Introduction Section Created Successfully']);
    }

    public function edit($id)
    {

        $LanguageEditing= LanguageEditingOne::find($id);


        return view('admin.LanguageEditingOne.edit', compact('LanguageEditing'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $LanguageEditing = LanguageEditingOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $LanguageEditing->image = 'public/admin/assets/images/' . $filename;
    }

        // Update other fields
        $LanguageEditing->title = $request->title;
        $LanguageEditing->description = $request->description;
        $LanguageEditing->save();

        return redirect()->route('LanguageEditingOne')->with('message', 'Introduction Section Updated Successfully');

    }

    public function destroy($id)
    {
        LanguageEditingOne::destroy($id);
        return redirect()->route('LanguageEditingOne')->with(['message' => 'Introduction Section Deleted Successfully']);

    }
}
