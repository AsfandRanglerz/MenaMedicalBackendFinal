<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HomeSectionSix;
use App\Http\Controllers\Controller;

class HomeSectionSixController extends Controller
{
    public function index()
    {
        $HomeSections = HomeSectionSix::orderBy('id', 'DESC')->get();
        return view('admin.CommonSections.HomeSectionSix.index', compact('HomeSections'));
    }

    public function create()
    {
        return view('admin.CommonSections.HomeSectionSix.create');
    }

    public function store(Request $request)
    {
      
    
   
$HomeSectionSix = HomeSectionSix::Create([

            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('HomeSectionSix')->with(['message' => 'Partner Text Created Successfully']);
    }

    public function edit($id)
    {
        
        $HomeSection= HomeSectionSix::find($id);
        

        return view('admin.CommonSections.HomeSectionSix.edit', compact('HomeSection'));
    }

    public function update(Request $request, $id)
    {
        
        $HomeSection = HomeSectionSix::findOrFail($id);

    
    
        // Update other fields
        $HomeSection->title = $request->title;
        $HomeSection->description = $request->description;
        $HomeSection->save();
    
        return redirect()->route('HomeSectionSix')->with('message', 'Partner Text Updated Successfully');
    
    }

    public function destroy($id)
    {
        HomeSectionSix::destroy($id);
        return redirect()->route('HomeSectionSix')->with(['message' => 'Partner Text Deleted Successfully']);

    }
}
