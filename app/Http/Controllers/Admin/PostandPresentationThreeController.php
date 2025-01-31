<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostandPresentationThree;

class PostandPresentationThreeController extends Controller
{
    public function index()
    {
        $PostandPresentationThrees = PostandPresentationThree::orderBy('id', 'DESC')->get();
        return view('admin.PostandPresentationThree.index', compact('PostandPresentationThrees'));
    }

    public function create()
    {
        return view('admin.PostandPresentationThree.create');
    }

    public function store(Request $request)
    {
      
    
   
$PostandPresentationThree = PostandPresentationThree::Create([

           
            'title' => $request->title,
            'description' => $request->description,
            
        ]);
        return redirect()->route('PostandPresentationThree')->with(['message' => 'What we need  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $PostandPresentationThree= PostandPresentationThree::find($id);
        

        return view('admin.PostandPresentationThree.edit', compact('PostandPresentationThree'));
    }

    public function update(Request $request, $id)
    {
        
        $PostandPresentationThree = PostandPresentationThree::findOrFail($id);

   
    
        // Update other fields
       
        $PostandPresentationThree->title = $request->title;
        $PostandPresentationThree->description = $request->description;
      
        $PostandPresentationThree->save();
    
        return redirect()->route('PostandPresentationThree')->with('message', 'What we need Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        PostandPresentationThree::destroy($id);
        return redirect()->route('PostandPresentationThree')->with(['message' => 'What we need Section Deleted Successfully']);

    }
}
