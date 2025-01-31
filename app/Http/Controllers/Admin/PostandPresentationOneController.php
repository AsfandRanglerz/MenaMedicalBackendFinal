<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostandPresentationOne;

class PostandPresentationOneController extends Controller
{
    public function index()
    {
        $PostandPresentationOnes = PostandPresentationOne::orderBy('id', 'ASC')->get();
        return view('admin.PostandPresentationOne.index', compact('PostandPresentationOnes'));
    }

    public function create()
    {
        return view('admin.PostandPresentationOne.create');
    }

    public function store(Request $request)
    {
      
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }
    
   
$PostandPresentationOne = PostandPresentationOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('PostandPresentationOne')->with(['message' => 'Intoduction Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $PostandPresentationOne= PostandPresentationOne::find($id);
        

        return view('admin.PostandPresentationOne.edit', compact('PostandPresentationOne'));
    }

    public function update(Request $request, $id)
    {
        
        $PostandPresentationOne = PostandPresentationOne::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $PostandPresentationOne->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        $PostandPresentationOne->title = $request->title;
        $PostandPresentationOne->description = $request->description;
        $PostandPresentationOne->save();
    
        return redirect()->route('PostandPresentationOne')->with('message', 'Intoduction Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        PostandPresentationOne::destroy($id);
        return redirect()->route('PostandPresentationOne')->with(['message' => 'Intoduction Section Deleted Successfully']);

    }
}
