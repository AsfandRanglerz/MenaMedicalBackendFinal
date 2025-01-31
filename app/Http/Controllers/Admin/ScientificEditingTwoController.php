<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScientificEditingTwo;

class ScientificEditingTwoController extends Controller
{
    public function index()
    {
        $ScientificEditingTwos = ScientificEditingTwo::orderBy('id', 'DESC')->get();
        return view('admin.ScientificEditingTwo.index', compact('ScientificEditingTwos'));
    }

    public function create()
    {
        return view('admin.ScientificEditingTwo.create');
    }

    public function store(Request $request)
    {
      
    
   
$ScientificEditingTwo = ScientificEditingTwo::Create([

           
            'feature_title' => $request->feature_title,
            'feature' => $request->feature,
            'service_title' => $request->service_title,
            'service' => $request->service,
            
        ]);
        return redirect()->route('ScientificEditingTwo')->with(['message' => 'Key Features  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $ScientificEditingTwo= ScientificEditingTwo::find($id);
        

        return view('admin.ScientificEditingTwo.edit', compact('ScientificEditingTwo'));
    }

    public function update(Request $request, $id)
    {
        
        $ScientificEditingTwo = ScientificEditingTwo::findOrFail($id);

   
    
        // Update other fields
       
        $ScientificEditingTwo->feature_title = $request->feature_title;
        $ScientificEditingTwo->feature = $request->feature;
        $ScientificEditingTwo->service_title = $request->service_title;
        $ScientificEditingTwo->service = $request->service;
        $ScientificEditingTwo->save();
    
        return redirect()->route('ScientificEditingTwo')->with('message', 'Key Features Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        ScientificEditingTwo::destroy($id);
        return redirect()->route('ScientificEditingTwo')->with(['message' => 'Key Features Section Deleted Successfully']);

    }
}
