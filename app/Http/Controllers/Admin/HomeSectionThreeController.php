<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSectionThree;
use Illuminate\Http\Request;

class HomeSectionThreeController extends Controller
{
    public function index()
    {
        // $HomeSections = HomeSectionThree::select('image')->orderBy('id', 'DESC')->get();
        $HomeSections = HomeSectionThree::orderBy('id', 'DESC')
        ->whereNull('title')  // Alternative for checking null
        ->whereNull('description')
        ->select(['id', 'image']) // Select only id and image
        ->get();
    

        return view('admin.CommonSections.HomeSectionThree.index', compact('HomeSections'));
    }

    public function create()
    {
        return view('admin.CommonSections.HomeSectionThree.create');
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
    
   
$HomeSectionOne = HomeSectionThree::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('HomeSectionThree')->with(['message' => 'Partner Image Created Successfully']);
    }

    public function edit($id)
    {
        
        $HomeSection= HomeSectionThree::find($id);
        

        return view('admin.CommonSections.HomeSectionThree.edit', compact('HomeSection'));
    }

    public function update(Request $request, $id)
    {
        
        $HomeSection = HomeSectionThree::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $HomeSection->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        $HomeSection->title = $request->title;
        $HomeSection->description = $request->description;
        $HomeSection->save();
    
        return redirect()->route('HomeSectionThree')->with('message', 'Partner Image Updated Successfully');
    
    }

    public function destroy($id)
    {
        HomeSectionThree::destroy($id);
        return redirect()->route('HomeSectionThree')->with(['message' => 'Partner Image Deleted Successfully']);

    }
}
