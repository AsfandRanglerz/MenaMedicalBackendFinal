<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PlaceOrderTwo;
use App\Http\Controllers\Controller;

class PlaceOrderTwoController extends Controller
{
    public function index()
    {
        $PlaceOrderTwos = PlaceOrderTwo::orderBy('id', 'ASC')
        ->whereNull('title')
        ->whereNull('description')
        ->whereNull('image')
        ->select(['id','main_title'])
        ->get();
        return view('admin.PlaceOrderTwo.index', compact('PlaceOrderTwos'));
    }

    public function works()
    {
        
        $PlaceOrderTwos = PlaceOrderTwo::orderBy('id', 'ASC')
        ->whereNotNull('title')
        ->whereNotNull('description')
        ->select(['id','title','description','image'])
        ->get();
        return view('admin.PlaceOrderTwo.HowItWorks.index', compact('PlaceOrderTwos'));
    }

    public function create()
    {
        return view('admin.PlaceOrderTwo.create');
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
    
   
$PlaceOrderTwo = PlaceOrderTwo::Create([

            'main_title' => $request->main_title,
            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('PlaceOrderTwo')->with(['message' => 'How it Works Created Successfully']);
    }

    public function edit($id)
    {
        
        $PlaceOrderTwo= PlaceOrderTwo::find($id);
        

        return view('admin.PlaceOrderTwo.edit', compact('PlaceOrderTwo'));
    }

    public function worksedit($id)
    {
        
        $PlaceOrderTwo= PlaceOrderTwo::find($id);
        

        return view('admin.PlaceOrderTwo.HowItWorks.edit', compact('PlaceOrderTwo'));
    }

    public function update(Request $request, $id)
    {
        
        $PlaceOrderTwo = PlaceOrderTwo::findOrFail($id);

    // // Update image if a new one is uploaded
    // if ($request->hasFile('image')) {
    //     // Generate a unique filename
    //     $file = $request->file('image');
    //     $filename = time() . '_' . $file->getClientOriginalName();
        
    //     // Move the file to the target directory
    //     $file->move(public_path('admin/assets/images'), $filename);

    //     // Update the image path relative to 'public'
    //     $PlaceOrderTwo->image = 'public/admin/assets/images/' . $filename;
    // }
    
        // Update other fields
        $PlaceOrderTwo->main_title = $request->main_title;
        // $PlaceOrderTwo->title = $request->title;
        // $PlaceOrderTwo->description = $request->description;
        $PlaceOrderTwo->save();
    
        return redirect()->route('PlaceOrderTwo')->with('message', 'How It Works Updated Successfully');
    
    }

    public function Worksupdate(Request $request, $id)
    {
        
        $PlaceOrderTwo = PlaceOrderTwo::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $PlaceOrderTwo->image = 'public/admin/assets/images/' . $filename;
    }
    
        // Update other fields
        // $PlaceOrderTwo->main_title = $request->main_title;
        $PlaceOrderTwo->title = $request->title;
        $PlaceOrderTwo->description = $request->description;
        $PlaceOrderTwo->save();
    
        return redirect()->route('OrderWorks')->with('message', 'How it Works Updated Successfully');
    
    }

    public function destroy($id)
    {
        PlaceOrderTwo::destroy($id);
        return redirect()->route('PlaceOrderTwo')->with(['message' => 'Scientific Editing Section Deleted Successfully']);

    }
}
