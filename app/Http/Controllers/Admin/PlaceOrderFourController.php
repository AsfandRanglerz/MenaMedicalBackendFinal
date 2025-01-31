<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PlaceOrderFour;
use App\Http\Controllers\Controller;

class PlaceOrderFourController extends Controller
{
    public function index()
    {
        $PlaceOrderFours = PlaceOrderFour::orderBy('id', 'ASC')
        ->whereNull('title')
        ->whereNull('description')
        ->whereNull('link')
        ->whereNull('link_text')
        ->whereNull('colour')
        ->select(['id','main_title'])
        ->get();
        return view('admin.PlaceOrderFour.index', compact('PlaceOrderFours'));
    }

    public function services()
    {
        $PlaceOrderFours = PlaceOrderFour::orderBy('id', 'ASC')
        ->whereNotNull('title')
        ->whereNotNull('description')
        ->whereNotNull('link')
        ->whereNotNull('link_text')
        ->whereNotNull('colour')
        ->select(['id','title','description','link','link_text','colour'])
        ->get();
        return view('admin.PlaceOrderFour.Services.index', compact('PlaceOrderFours'));
    }

    public function create()
    {
        return view('admin.PlaceOrderFour.create');
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
   
        $PlaceOrderFour = PlaceOrderFour::Create([
            'main_title' => $request->main_title,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'link_text' => $request->link_text,
            'colour' => $request->colour,
        ]);
        return redirect()->route('PlaceOrderFour')->with(['message' => 'Service Section Created Successfully']);
    }

    public function edit($id)
    {
        
        $PlaceOrderFour= PlaceOrderFour::find($id);
        

        return view('admin.PlaceOrderFour.edit', compact('PlaceOrderFour'));
    }

    public function servicesedit($id)
    {
        
        $PlaceOrderFour= PlaceOrderFour::find($id);
        

        return view('admin.PlaceOrderFour.Services.edit', compact('PlaceOrderFour'));
    }

    public function update(Request $request, $id)
    {
        
        $PlaceOrderFour = PlaceOrderFour::findOrFail($id);

       
        // Update other fields
        $PlaceOrderFour->main_title = $request->main_title;
        // $PlaceOrderFour->title = $request->title;
        // $PlaceOrderFour->description = $request->description;
        // $PlaceOrderFour->link =  $request->link;
        // $PlaceOrderFour->link_text = $request->link_text;
        // $PlaceOrderFour->colour =  $request->colour;

        $PlaceOrderFour->save();
    
        return redirect()->route('PlaceOrderFour')->with('message', 'Service Section Updated Successfully');
    
    }

    public function servicesupdate(Request $request, $id)
    {
        
        $PlaceOrderFour = PlaceOrderFour::findOrFail($id);

       
   
        // Update other fields
        // $PlaceOrderFour->main_title = $request->main_title;
        $PlaceOrderFour->title = $request->title;
        $PlaceOrderFour->description = $request->description;
        $PlaceOrderFour->link =  $request->link;
        $PlaceOrderFour->link_text = $request->link_text;
        // $PlaceOrderFour->colour =  $request->colour;

        $PlaceOrderFour->save();
    
        return redirect()->route('OrderServices')->with('message', 'Service Section Updated Successfully');
    
    }

    public function destroy($id)
    {
        PlaceOrderFour::destroy($id);
        return redirect()->route('PlaceOrderFour')->with(['message' => 'Accidental Plagiarism Section Deleted Successfully']);

    }
}
