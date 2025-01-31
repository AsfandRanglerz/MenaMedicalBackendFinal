<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScientificEditingThree;

class ScientificEditingThreeController extends Controller
{
    public function index()
    {
        $ScientificEditings = ScientificEditingThree::orderBy('id', 'ASC')
        ->whereNull('description')
        ->whereNull('image')
        ->select(['id','title'])
        ->get();
        return view('admin.ScientificEditingThree.index', compact('ScientificEditings'));
    }

    public function features()
    {
        $ScientificEditings = ScientificEditingThree::orderBy('id', 'ASC')
        ->whereNotNull('image')
        ->whereNotNull('description')
        ->select(['id','description','image'])
        ->get();
        return view('admin.ScientificEditingThree.FeaturesAndBenefits.index', compact('ScientificEditings'));
    }

    public function create()
    {
        return view('admin.ScientificEditingThree.create');
    }

    public function store(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }
    
   
$ScientificEditingThree = ScientificEditingThree::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('ScientificEditingThree')->with(['message' => 'Features and Benefits  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $ScientificEditing= ScientificEditingThree::find($id);
        

        return view('admin.ScientificEditingThree.edit', compact('ScientificEditing'));
    }

    public function featuresedit($id)
    {
        
        $ScientificEditing= ScientificEditingThree::find($id);
        

        return view('admin.ScientificEditingThree.FeaturesAndBenefits.edit', compact('ScientificEditing'));
    }

    public function update(Request $request, $id)
    {
        
        $ScientificEditing = ScientificEditingThree::findOrFail($id);

    
    
        // Update other fields
        $ScientificEditing->title = $request->title;
        // $ScientificEditing->description = $request->description;
        $ScientificEditing->save();
    
        return redirect()->route('ScientificEditingThree')->with('message', 'Features and Benefits Section Updated Successfully');
    
    }

    public function featuresupdate(Request $request, $id)
    {
        
        $ScientificEditing = ScientificEditingThree::findOrFail($id);

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
        // $ScientificEditing->title = $request->title;
        $ScientificEditing->description = $request->description;
        $ScientificEditing->save();
    
        return redirect()->route('Features')->with('message', 'Features and Benefits Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        ScientificEditingThree::destroy($id);
        return redirect()->route('ScientificEditingThree')->with(['message' => 'Features and Benefits Section Deleted Successfully']);

    }
}
