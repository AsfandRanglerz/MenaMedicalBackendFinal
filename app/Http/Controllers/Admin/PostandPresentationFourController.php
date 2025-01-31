<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostandPresentationFour;

class PostandPresentationFourController extends Controller
{
    public function index()
    {
        $PostandPresentationFours = PostandPresentationFour::orderBy('id', 'DESC')->get();
        return view('admin.PostandPresentationFour.index', compact('PostandPresentationFours'));
    }

    public function create()
    {
        return view('admin.PostandPresentationFour.create');
    }

    public function store(Request $request)
    {
      
        
    
   
$PostandPresentationFour = PostandPresentationFour::Create([

            
            'description' => $request->description,
        ]);
        return redirect()->route('PostandPresentationFour')->with(['message' => 'Review and Editing Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $PostandPresentationFour= PostandPresentationFour::find($id);
        

        return view('admin.PostandPresentationFour.edit', compact('PostandPresentationFour'));
    }

    public function update(Request $request, $id)
    {
        
        $PostandPresentationFour = PostandPresentationFour::findOrFail($id);

   
    
        // Update other fields
        
        $PostandPresentationFour->description = $request->description;
        $PostandPresentationFour->save();
    
        return redirect()->route('PostandPresentationFour')->with('message', 'Review and Editing Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        PostandPresentationFour::destroy($id);
        return redirect()->route('PostandPresentationFour')->with(['message' => 'Review and Editing Section Deleted Successfully']);

    }
}
