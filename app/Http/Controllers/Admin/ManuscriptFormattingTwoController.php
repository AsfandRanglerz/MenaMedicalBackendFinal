<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManuscriptFormattingTwo;

class ManuscriptFormattingTwoController extends Controller
{
    public function index()
    {
        $ManuscriptFormattingTwos = ManuscriptFormattingTwo::orderBy('id', 'ASC')
        ->whereNull('title')
        ->whereNull('description')
        ->whereNull('image')
        ->select(['id','main_title'])
        ->get();
        return view('admin.PublicationSupport.ManuscriptFormattingTwo.index', compact('ManuscriptFormattingTwos'));
    }

    public function features()
    {
        $ManuscriptFormattingTwos = ManuscriptFormattingTwo::orderBy('id', 'ASC')
        ->whereNotNull('title')
        ->whereNotNull('image')
        ->whereNotNull('description')
        ->select(['id','title','description','image'])
        ->get();
        return view('admin.PublicationSupport.ManuscriptFormattingTwo.FeaturesAndBenefits.index', compact('ManuscriptFormattingTwos'));
    }

    public function create()
    {
        return view('admin.PublicationSupport.ManuscriptFormattingTwo.create');
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
    
   
$ManuscriptFormattingTwo = ManuscriptFormattingTwo::Create([
            
            'main_title' => $request->main_title,        
            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('ManuscriptFormattingTwo')->with(['message' => 'Features and Benefits Created Successfully']);
    }

    public function edit($id)
    {
        
        $ManuscriptFormattingTwo= ManuscriptFormattingTwo::find($id);
        

        return view('admin.PublicationSupport.ManuscriptFormattingTwo.edit', compact('ManuscriptFormattingTwo'));
    }

    public function featuresedit($id)
    {
        
        $ManuscriptFormattingTwo= ManuscriptFormattingTwo::find($id);
        

        return view('admin.PublicationSupport.ManuscriptFormattingTwo.FeaturesAndBenefits.edit', compact('ManuscriptFormattingTwo'));
    }

    public function update(Request $request, $id)
    {
        
        $ManuscriptFormattingTwo = ManuscriptFormattingTwo::findOrFail($id);

    // // Update image if a new one is uploaded
    // if ($request->hasFile('image')) {
    //     // Generate a unique filename
    //     $file = $request->file('image');
    //     $filename = time() . '_' . $file->getClientOriginalName();
        
    //     // Move the file to the target directory
    //     $file->move(public_path('admin/assets/images'), $filename);

    //     // Update the image path relative to 'public'
    //     $ManuscriptFormattingTwo->image = 'public/admin/assets/images/' . $filename;
    // }
    
        // Update other fields
        $ManuscriptFormattingTwo->main_title = $request->main_title;
        // $ManuscriptFormattingTwo->title = $request->title;
        // $ManuscriptFormattingTwo->description = $request->description;
        $ManuscriptFormattingTwo->save();
    
        return redirect()->route('ManuscriptFormattingTwo')->with('message', 'Features and Benefits Updated Successfully');
    
    }

    public function featuresupdate(Request $request, $id)
    {
        
        $ManuscriptFormattingTwo = ManuscriptFormattingTwo::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $ManuscriptFormattingTwo->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        // $ManuscriptFormattingTwo->main_title = $request->main_title;
        $ManuscriptFormattingTwo->title = $request->title;
        $ManuscriptFormattingTwo->description = $request->description;
        $ManuscriptFormattingTwo->save();
    
        return redirect()->route('ManuscriptFeatures')->with('message', 'Features and Benefits Updated Successfully');
    
    }

    public function destroy($id)
    {
        ManuscriptFormattingTwo::destroy($id);
        return redirect()->route('ManuscriptFormattingTwo')->with(['message' => 'Features and Benefits Deleted Successfully']);

    }
}
