<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManuscriptFormattingThree;

class ManuscriptFormattingThreeController extends Controller
{
    public function index()
    {
        $ManuscriptFormattingThrees = ManuscriptFormattingThree::orderBy('id', 'DESC')->get();
        return view('admin.PublicationSupport.ManuscriptFormattingThree.index', compact('ManuscriptFormattingThrees'));
    }

    public function create()
    {
        return view('admin.PublicationSupport.ManuscriptFormattingThree.create');
    }

    public function store(Request $request)
    {
      
    
   
$ManuscriptFormattingThree = ManuscriptFormattingThree::Create([

            'description' => $request->description,
           
        ]);
        return redirect()->route('ManuscriptFormattingThree')->with(['message' => 'Manuscript Review Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $ManuscriptFormattingThree= ManuscriptFormattingThree::find($id);
        

        return view('admin.PublicationSupport.ManuscriptFormattingThree.edit', compact('ManuscriptFormattingThree'));
    }

    public function update(Request $request, $id)
    {
        
    $ManuscriptFormattingThree = ManuscriptFormattingThree::findOrFail($id);

   
    
        // Update other fields
       
        $ManuscriptFormattingThree->description = $request->description;
        
        $ManuscriptFormattingThree->save();
    
        return redirect()->route('ManuscriptFormattingThree')->with('message', 'Manuscript Review Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        ManuscriptFormattingThree::destroy($id);
        return redirect()->route('ManuscriptFormattingThree')->with(['message' => 'Manuscript Review Section Deleted Successfully']);

    }
}
