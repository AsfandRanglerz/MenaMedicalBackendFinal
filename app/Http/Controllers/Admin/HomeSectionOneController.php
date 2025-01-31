<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSectionOne;
use Illuminate\Http\Request;

class HomeSectionOneController extends Controller
{
    public function index()
    {
        $HomeSections = HomeSectionOne::orderBy('id', 'DESC')->get();
        return view('admin.HomeSectionOne.index', compact('HomeSections'));
    }

    public function create()
    {
        return view('admin.HomeSectionOne.create');
    }

    public function store(Request $request)
    {
      



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $image = 'public/admin/assets/images/' . $filename;
        }
    
   
$HomeSectionOne = HomeSectionOne::Create([

            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
            'image_description' => $request->image_description,
        ]);
        return redirect()->route('HomeSectionOne')->with(['message' => 'Introduction Created Successfully']);
    }

    public function edit($id)
    {
        
        $HomeSection= HomeSectionOne::find($id);
        

        return view('admin.HomeSectionOne.edit', compact('HomeSection'));
    }

    public function update(Request $request, $id)
    {
        
        $HomeSection = HomeSectionOne::findOrFail($id);

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
        $HomeSection->image_description = $request->image_description;
        $HomeSection->save();
    
        return redirect()->route('HomeSectionOne')->with('message', 'Introduction Updated Successfully');
    
    }

    public function destroy($id)
    {
        HomeSectionOne::destroy($id);
        return redirect()->route('HomeSectionOne')->with(['message' => 'Home Section Deleted Successfully']);

    }
}
