<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LanguageEditingThree;

class LanguageEditingThreeController extends Controller
{
    public function index()
    {
        $LanguageEditingThrees = LanguageEditingThree::orderBy('id', 'DESC')->get();
        return view('admin.LanguageEditingThree.index', compact('LanguageEditingThrees'));
    }

    public function create()
    {
        return view('admin.LanguageEditingThree.create');
    }

    public function store(Request $request)
    {
    
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path('admin/assets/images'), $filename);
        //     $image = 'public/admin/assets/images/' . $filename;
        // }
    
   
$LanguageEditingThree = LanguageEditingThree::Create([

            
            
            'description' => $request->description,
            'link' => $request->link,
            'link_text' => $request->link_text,
            'text' => $request->text,

        ]);
        return redirect()->route('LanguageEditingThree')->with(['message' => 'Quality Guarantee Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $LanguageEditingThree= LanguageEditingThree::find($id);
        

        return view('admin.LanguageEditingThree.edit', compact('LanguageEditingThree'));
    }

    public function update(Request $request, $id)
    {
        
        $LanguageEditingThree = LanguageEditingThree::findOrFail($id);

    // Update image if a new one is uploaded
    // if ($request->hasFile('image')) {
    //     // Generate a unique filename
    //     $file = $request->file('image');
    //     $filename = time() . '_' . $file->getClientOriginalName();
        
    //     // Move the file to the target directory
    //     $file->move(public_path('admin/assets/images'), $filename);

    //     // Update the image path relative to 'public'
    //     $HomeSection->image = 'public/admin/assets/images/' . $filename;
    // }
    
        // Update other fields
        
        $LanguageEditingThree->description = $request->description;
        $LanguageEditingThree->link = $request->link;
        $LanguageEditingThree->link_text = $request->linktext;
        $LanguageEditingThree->text = $request->text;
        $LanguageEditingThree->save();
    
        return redirect()->route('LanguageEditingThree')->with('message', 'Quality Guarantee Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        LanguageEditingThree::destroy($id);
        return redirect()->route('LanguageEditingThree')->with(['message' => 'Quality Guarantee Deleted Successfully']);

    }
}
