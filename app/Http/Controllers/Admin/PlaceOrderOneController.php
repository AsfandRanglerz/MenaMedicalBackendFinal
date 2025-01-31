<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PlaceOrderOne;
use App\Http\Controllers\Controller;

class PlaceOrderOneController extends Controller
{
    public function index()
    {
        $PlaceOrderOnes = PlaceOrderOne::orderBy('id', 'DESC')->get();
        return view('admin.PlaceOrderOne.index', compact('PlaceOrderOnes'));
    }

    public function create()
    {
        return view('admin.PlaceOrderOne.create');
    }

    public function store(Request $request)
    {
      
    
   
$PlaceOrderOne = PlaceOrderOne::Create([

            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('PlaceOrderOne')->with(['message' => 'Introduction  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $PlaceOrderOne= PlaceOrderOne::find($id);
        

        return view('admin.PlaceOrderOne.edit', compact('PlaceOrderOne'));
    }

    public function update(Request $request, $id)
    {
        
        $PlaceOrderOne = PlaceOrderOne::findOrFail($id);
   
        // Update other fields
        $PlaceOrderOne->title = $request->title;
        $PlaceOrderOne->description = $request->description;
        $PlaceOrderOne->save();
    
        return redirect()->route('PlaceOrderOne')->with('message', 'Introduction Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        PlaceOrderOne::destroy($id);
        return redirect()->route('PlaceOrderOne')->with(['message' => 'Introduction Section Deleted Successfully']);

    }
}
