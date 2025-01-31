<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PlaceOrderThree;
use App\Http\Controllers\Controller;

class PlaceOrderThreeController extends Controller
{
    public function index()
    {
        $PlaceOrderThrees = PlaceOrderThree::orderBy('id', 'DESC')->get();
        return view('admin.PlaceOrderThree.index', compact('PlaceOrderThrees'));
    }

    public function create()
    {
        return view('admin.PlaceOrderThree.create');
    }

    public function store(Request $request)
    {
    
   
    $PlaceOrderThree = PlaceOrderThree::Create([

            'description' => $request->description,
        ]);
        return redirect()->route('PlaceOrderThree')->with(['message' => 'Payment and Delivery  Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $PlaceOrderThree= PlaceOrderThree::find($id);
        

        return view('admin.PlaceOrderThree.edit', compact('PlaceOrderThree'));
    }

    public function update(Request $request, $id)
    {
        
        $PlaceOrderThree = PlaceOrderThree::findOrFail($id);

    
    
        
        $PlaceOrderThree->description = $request->description;
        $PlaceOrderThree->save();
    
        return redirect()->route('PlaceOrderThree')->with('message', 'Payment and Delivery Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        PlaceOrderThree::destroy($id);
        return redirect()->route('PlaceOrderThree')->with(['message' => 'Payment and Delivery Section Deleted Successfully']);

    }
}
