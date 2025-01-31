<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManuscriptFormattingOne;

class ManuscriptFormattingOneController extends Controller
{
    public function index()
    {
        $ManuscriptFormattingOnes = ManuscriptFormattingOne::orderBy('id', 'DESC')->get();
        return view('admin.PublicationSupport.ManuscriptFormattingOne.index', compact('ManuscriptFormattingOnes'));
    }

    public function create()
    {
        return view('admin.PublicationSupport.ManuscriptFormattingOne.create');
    }

    public function store(Request $request)
    {
      
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }
    
   
$ManuscriptFormattingOne = ManuscriptFormattingOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('ManuscriptFormattingOne')->with(['message' => 'Introduction  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $ManuscriptFormattingOne= ManuscriptFormattingOne::find($id);
        

        return view('admin.PublicationSupport.ManuscriptFormattingOne.edit', compact('ManuscriptFormattingOne'));
    }

    public function update(Request $request, $id)
    {
        
        $ManuscriptFormattingOne = ManuscriptFormattingOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $ManuscriptFormattingOne->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        $ManuscriptFormattingOne->title = $request->title;
        $ManuscriptFormattingOne->description = $request->description;
        $ManuscriptFormattingOne->save();
    
        return redirect()->route('ManuscriptFormattingOne')->with('message', 'Introduction Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        ManuscriptFormattingOne::destroy($id);
        return redirect()->route('ManuscriptFormattingOne')->with(['message' => 'Introduction Section Deleted Successfully']);

    }
}
