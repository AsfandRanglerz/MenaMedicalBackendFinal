<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSectionTwo;
use Illuminate\Http\Request;

class HomeSectionTwoController extends Controller
{


    public function index()
    {
        $HomeSections = HomeSectionTwo::orderBy('id', 'DESC')
        ->whereNull('title')
        ->whereNull('description')
        ->whereNull('image')
        ->whereNull('link')
        ->whereNull('link_text')
        ->select(['id','main_title'])
        ->get();
        return view('admin.HomeSectionTwo.index', compact('HomeSections'));
    }

    public function services()
    {
        $HomeSections = HomeSectionTwo::orderBy('id', 'ASC')

        ->whereNotNull('link')
        ->whereNotNull('link_text')
        ->select(['id','title','description','image','link','link_text'])
        ->get();
        return view('admin.HomeSectionTwo.Services.index', compact('HomeSections'));
    }

    public function create()
    {
        return view('admin.HomeSectionTwo.create');
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


$HomeSectionTwo = HomeSectionTwo::Create([

            'main_title' => $request->main_title,
            'image' =>$image,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'link_text' => $request->link_text,

        ]);
        return redirect()->route('HomeSectionTwo')->with(['message' => 'Our Services Created Successfully']);
    }

    public function edit($id)
    {

        $HomeSection= HomeSectionTwo::find($id);


        return view('admin.HomeSectionTwo.edit', compact('HomeSection'));
    }

    public function servicesedit($id)
    {


        $HomeSection= HomeSectionTwo::find($id);


        return view('admin.HomeSectionTwo.Services.edit', compact('HomeSection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required|string|max:255',
        ]);

        $HomeSection = HomeSectionTwo::findOrFail($id);



        // Update other fields
        $HomeSection->main_title = $request->main_title;
        // $HomeSection->title = $request->title;
        // $HomeSection->description = $request->description;
        // $HomeSection->link = $request->link;
        // $HomeSection->link_text = $request->linktext;
        $HomeSection->save();

        return redirect()->route('HomeSectionTwo')->with('message', 'Our Services Updated Successfully');

    }

    public function servicesupdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'link' => 'required|url',
            'linktext' => 'required|string|max:255',
        ]);

        $HomeSection = HomeSectionTwo::findOrFail($id);

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
        $HomeSection->link = $request->link;
        $HomeSection->link_text = $request->linktext;
        $HomeSection->save();

        return redirect()->route('Services')->with('message', 'Our Services Updated Successfully');

    }

    public function destroy($id)
    {
        HomeSectionTwo::destroy($id);
        return redirect()->route('HomeSectionTwo')->with(['message' => 'Our Services Deleted Successfully']);

    }
}
