<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ThesisEditingServiceOne;

class ThesisEditingServiceOneController extends Controller
{
    public function index()
    {
        $ThesisEditingServiceOnes = ThesisEditingServiceOne::orderBy('id', 'DESC')->get();
        return view('admin.ThesisSupport.ThesisEditingServiceOne.index', compact('ThesisEditingServiceOnes'));
    }

    public function create()
    {
        return view('admin.ThesisSupport.ThesisEditingServiceOne.create');
    }

    public function store(Request $request)
    {
      
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }
    
   
$ThesisEditingServiceOne = ThesisEditingServiceOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'link_text' => $request->link_text,
            'image' =>$image,
        ]);
        return redirect()->route('ThesisEditingServiceOne')->with(['message' => 'Introduction  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $ThesisEditingServiceOne= ThesisEditingServiceOne::find($id);
        

        return view('admin.ThesisSupport.ThesisEditingServiceOne.edit', compact('ThesisEditingServiceOne'));
    }

    public function update(Request $request, $id)
    {
        
        $ThesisEditingServiceOne = ThesisEditingServiceOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $ThesisEditingServiceOne->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        $ThesisEditingServiceOne->title = $request->title;
        $ThesisEditingServiceOne->description = $request->description;
        $ThesisEditingServiceOne->link_text = $request->link_text;
        $ThesisEditingServiceOne->save();
    
        return redirect()->route('ThesisEditingServiceOne')->with('message', 'Introduction Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        ThesisEditingServiceOne::destroy($id);
        return redirect()->route('ThesisEditingServiceOne')->with(['message' => 'Introduction Section Deleted Successfully']);

    }
}
