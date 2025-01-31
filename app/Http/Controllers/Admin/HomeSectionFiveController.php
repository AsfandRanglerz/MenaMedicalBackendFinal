<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HomeSectionFive;
use App\Http\Controllers\Controller;

class HomeSectionFiveController extends Controller
{
    public function index()
    {
        $HomeSections = HomeSectionFive::orderBy('id', 'DESC') 
        ->whereNull('title')  // Alternative for checking null
        ->whereNull('description')
        ->whereNull('image')
        ->select(['id', 'main_title','main_image']) // Select only id and image
        ->get();
        return view('admin.CommonSections.HomeSectionFive.index', compact('HomeSections'));
    }

    public function maintitle()
    {
        $HomeSections = HomeSectionFive::orderBy('id', 'ASC')
        ->whereNull('main_title')  // Alternative for checking null
        ->select(['id', 'title', 'description', 'image']) // Select only id and image
        ->get();
        return view('admin.CommonSections.MainTitle.index', compact('HomeSections'));
    }

    public function create()
    {
        return view('admin.CommonSections.HomeSectionFive.create');
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
    
   
$HomeSectionFive = HomeSectionFive::Create([
            'main_title' => $request->main_title,
            'title' => $request->title,
            'description' => $request->description,
            'colour' => $request->colour,
            'image' =>$image,
        ]);
        return redirect()->route('HomeSectionFive')->with(['message' => 'Satisfaction Guarantee Created Successfully']);
    }

    public function edit($id)
    {
        
        $HomeSection= HomeSectionFive::find($id);
        

        return view('admin.CommonSections.HomeSectionFive.edit', compact('HomeSection'));
    }

    public function maintitleedit($id)
    {
        
        $HomeSection= HomeSectionFive::find($id);
        

        return view('admin.CommonSections.MainTitle.edit', compact('HomeSection'));
    }

    public function update(Request $request, $id)
    {
        
        $HomeSection = HomeSectionFive::findOrFail($id);

        if ($request->hasFile('main_image')) {
            // Generate a unique filename
            $file = $request->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Move the file to the target directory
            $file->move(public_path('admin/assets/images'), $filename);
    
            // Update the image path relative to 'public'
            $HomeSection->main_image = 'public/admin/assets/images/' . $filename;
        }
    
        // Update other fields
        $HomeSection->main_title = $request->main_title;
        $HomeSection->save();
    
        return redirect()->route('HomeSectionFive')->with('message', 'Satisfaction Guarantee Updated Successfully');
    
    }

    public function maintitleupdate(Request $request, $id)
    {
        
        $HomeSection = HomeSectionFive::findOrFail($id);

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
        // $HomeSection->colour = $request->colour;
        $HomeSection->save();
    
        return redirect()->route('main-title')->with('message', 'Satisfaction Guarantee Updated Successfully');
    
    }

    public function destroy($id)
    {
        HomeSectionFive::destroy($id);
        return redirect()->route('HomeSectionFive')->with(['message' => 'Satisfaction Guarantee Deleted Successfully']);

    }
}
