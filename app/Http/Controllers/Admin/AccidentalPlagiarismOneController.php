<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccidentalPlagiarismOne;

class AccidentalPlagiarismOneController extends Controller
{
    public function index()
    {
        $AccidentalPlagiarisms = AccidentalPlagiarismOne::orderBy('id', 'DESC')->get();
        return view('admin.PublicationSupport.AccidentalPlagiarismOne.index', compact('AccidentalPlagiarisms'));
    }

    public function create()
    {
        return view('admin.PublicationSupport.AccidentalPlagiarismOne.create');
    }

    public function store(Request $request)
    {
      
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }
    
   
$AccidentalPlagiarismOne = AccidentalPlagiarismOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('AccidentalPlagiarismOne')->with(['message' => 'Introduction  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $AccidentalPlagiarism= AccidentalPlagiarismOne::find($id);
        

        return view('admin.PublicationSupport.AccidentalPlagiarismOne.edit', compact('AccidentalPlagiarism'));
    }

    public function update(Request $request, $id)
    {
        
        $AccidentalPlagiarism = AccidentalPlagiarismOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $AccidentalPlagiarism->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        $AccidentalPlagiarism->title = $request->title;
        $AccidentalPlagiarism->description = $request->description;
        $AccidentalPlagiarism->save();
    
        return redirect()->route('AccidentalPlagiarismOne')->with('message', 'Introduction Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        AccidentalPlagiarismOne::destroy($id);
        return redirect()->route('AccidentalPlagiarismOne')->with(['message' => 'Introduction Section Deleted Successfully']);

    }
}
