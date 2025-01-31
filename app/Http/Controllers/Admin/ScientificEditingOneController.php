<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScientificEditingOne;

class ScientificEditingOneController extends Controller
{
    public function index()
    {
        $ScientificEditings = ScientificEditingOne::orderBy('id', 'DESC')->get();
        return view('admin.ScientificEditingOne.index', compact('ScientificEditings'));
    }

    public function create()
    {
        return view('admin.ScientificEditingOne.create');
    }

    public function store(Request $request)
    {
      
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }
    
   
$ScientificEditingOne = ScientificEditingOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('ScientificEditingOne')->with(['message' => 'Introduction Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $ScientificEditing= ScientificEditingOne::find($id);
        

        return view('admin.ScientificEditingOne.edit', compact('ScientificEditing'));
    }

    public function update(Request $request, $id)
    {
        
        $ScientificEditing = ScientificEditingOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $ScientificEditing->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        $ScientificEditing->title = $request->title;
        $ScientificEditing->description = $request->description;
        $ScientificEditing->save();
    
        return redirect()->route('ScientificEditingOne')->with('message', 'Introduction Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        ScientificEditingOne::destroy($id);
        return redirect()->route('ScientificEditingOne')->with(['message' => 'Introduction Section Deleted Successfully']);

    }
}
