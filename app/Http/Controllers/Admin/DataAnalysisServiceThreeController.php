<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataAnalysisServiceThree;

class DataAnalysisServiceThreeController extends Controller
{
    public function index()
    {
        $DataAnalysisServiceThrees = DataAnalysisServiceThree::orderBy('id', 'DESC')->get();
        return view('admin.DataAnalysisServiceThree.index', compact('DataAnalysisServiceThrees'));
    }

    public function create()
    {
        return view('admin.DataAnalysisServiceThree.create');
    }

    public function store(Request $request)
    {
      
    
   
$DataAnalysisServiceThree = DataAnalysisServiceThree::Create([

           
            'feature_title' => $request->feature_title,
            'feature' => $request->feature,
            'service_title' => $request->service_title,
            'service' => $request->service,
            
        ]);
        return redirect()->route('DataAnalysisServiceThree')->with(['message' => 'Features of Premium Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $DataAnalysisServiceThree= DataAnalysisServiceThree::find($id);
        

        return view('admin.DataAnalysisServiceThree.edit', compact('DataAnalysisServiceThree'));
    }

    public function update(Request $request, $id)
    {
        
        $DataAnalysisServiceThree = DataAnalysisServiceThree::findOrFail($id);

   
    
        // Update other fields
       
        $DataAnalysisServiceThree->feature_title = $request->feature_title;
        $DataAnalysisServiceThree->feature = $request->feature;
        $DataAnalysisServiceThree->service_title = $request->service_title;
        $DataAnalysisServiceThree->service = $request->service;
        $DataAnalysisServiceThree->save();
    
        return redirect()->route('DataAnalysisServiceThree')->with('message', 'Features of Premium Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        DataAnalysisServiceThree::destroy($id);
        return redirect()->route('DataAnalysisServiceThree')->with(['message' => 'Features of Premium Section Deleted Successfully']);

    }
}
