<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HomeSectionFour;
use App\Http\Controllers\Controller;

class HomeSectionFourController extends Controller
{
    public function index()
    {
        $HomeSections = HomeSectionFour::orderBy('id', 'DESC')
        ->whereNull('title')
        ->whereNull('description')
        ->whereNull('image')
        ->select(['id','main_title'])
        ->get();
        return view('admin.HomeSectionFour.index', compact('HomeSections'));
    }

    public function works()
    {

        $HomeSections = HomeSectionFour::orderBy('id', 'ASC')
        ->whereNotNull('title')
        ->whereNotNull('description')
        ->select(['id','title','description','image'])
        ->get();
        return view('admin.HomeSectionFour.HowItWorks.index', compact('HomeSections'));
    }

    public function create()
    {
        return view('admin.HomeSectionFour.create');
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


$HomeSectionOne = HomeSectionFour::Create([

            'main_title' => $request->main_title,
            'title' => $request->title,
            'description' => $request->description,
            'image' =>$image,
        ]);
        return redirect()->route('HomeSectionFour')->with(['message' => 'How it works Section Created Successfully']);
    }

    public function edit($id)
    {

        $HomeSection= HomeSectionFour::find($id);


        return view('admin.HomeSectionFour.edit', compact('HomeSection'));
    }

    public function Worksedit($id)
    {

        $HomeSection= HomeSectionFour::find($id);


        return view('admin.HomeSectionFour.HowItWorks.edit', compact('HomeSection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required|string|max:255',
        ]);

        $HomeSection = HomeSectionFour::findOrFail($id);

    // // Update image if a new one is uploaded
    // if ($request->hasFile('image')) {
    //     // Generate a unique filename
    //     $file = $request->file('image');
    //     $filename = time() . '_' . $file->getClientOriginalName();

    //     // Move the file to the target directory
    //     $file->move(public_path('admin/assets/images'), $filename);

    //     // Update the image path relative to 'public'
    //     $HomeSection->image = 'public/admin/assets/images/' . $filename;
    // }

        // Update other fields
        $HomeSection->main_title = $request->main_title;
        // $HomeSection->title = $request->title;
        // $HomeSection->description = $request->description;
        $HomeSection->save();

        return redirect()->route('HomeSectionFour')->with('message', 'How it works Section Updated Successfully');

    }

    public function Worksupdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $HomeSection = HomeSectionFour::findOrFail($id);

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
        // $HomeSection->main_title = $request->main_title;
        $HomeSection->title = $request->title;
        $HomeSection->description = $request->description;
        $HomeSection->save();

        return redirect()->route('Works')->with('message', 'How it works Section Updated Successfully');

    }

    public function destroy($id)
    {
        HomeSectionFour::destroy($id);
        return redirect()->route('HomeSectionFour')->with(['message' => 'How it works Section Deleted Successfully']);

    }
}
