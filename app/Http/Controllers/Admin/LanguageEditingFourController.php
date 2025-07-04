<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LanguageEditingFour;
use App\Http\Controllers\Controller;

class LanguageEditingFourController extends Controller
{
    public function index()
    {
        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'DESC')
        ->whereNull('title')
        // ->whereNull('description')
        ->whereNull('image')
        ->select(['id','main_title','description','main_image'])
        ->get();
        return view('admin.CommonSections.LanguageEditingFour.index', compact('LanguageEditingFours'));
    }

    public function commitment()
    {
        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')
            ->whereNotNull('title') // Ensure 'title' is not null
            ->whereNotNull('description') // Ensure 'description' is not null
            ->select(['id', 'title', 'description', 'image', 'colour']) // Select required columns
            ->get();

        return view('admin.CommonSections.LanguageEditingFour.Commitment.index', compact('LanguageEditingFours'));
    }


    public function create()
    {
        return view('admin.CommonSections.LanguageEditingFour.create');
    }

    public function store(Request $request)
    {
      $image = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/images'), $filename);
            $main_image = 'public/admin/assets/images/' . $filename;
        }


$LanguageEditingFour = LanguageEditingFour::Create([

            'main_title' => $request->main_title,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'main_image' => $main_image,
            'colour' => $request->colour,
        ]);
        return redirect()->route('LanguageEditingFour')->with(['message' => 'Commitment Section Created Successfully']);
    }

    public function edit($id)
    {

        $LanguageEditingFour= LanguageEditingFour::find($id);


        return view('admin.CommonSections.LanguageEditingFour.edit', compact('LanguageEditingFour'));
    }

    public function commitmentedit($id)
    {

        $LanguageEditingFour= LanguageEditingFour::find($id);


        return view('admin.CommonSections.LanguageEditingFour.Commitment.edit', compact('LanguageEditingFour'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $LanguageEditingFour = LanguageEditingFour::findOrFail($id);

     // Update image if a new one is uploaded
     if ($request->hasFile('main_image')) {
        // Generate a unique filename
        $file = $request->file('main_image');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $LanguageEditingFour->main_image = 'public/admin/assets/images/' . $filename;
    }

        // Update other fields
        $LanguageEditingFour->main_title = $request->main_title;
        // $LanguageEditing->title = $request->title;
        $LanguageEditingFour->description = $request->description;
        // $LanguageEditingFour->main_image = $request->main_image;
        // $LanguageEditing->colour =  $request->colour;
        $LanguageEditingFour->save();

        return redirect()->route('LanguageEditingFour')->with('message', 'Commitment Section Updated Successfully');

    }

    public function commitmentupdate(Request $request, $id)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:90000',
    ]);

        $LanguageEditingFour = LanguageEditingFour::findOrFail($id);

    // Update image if a new one is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique filename
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the target directory
        $file->move(public_path('admin/assets/images'), $filename);

        // Update the image path relative to 'public'
        $LanguageEditingFour->image = 'public/admin/assets/images/' . $filename;
    }
        // Update other fields
        // $LanguageEditingFour->main_image = $request->main_image;
        $LanguageEditingFour->title = $request->title;
        $LanguageEditingFour->description = $request->description;
        // $LanguageEditing->colour =  $request->colour;
        $LanguageEditingFour->save();

        return redirect()->route('commitment')->with('message', 'Commitment Section Updated Successfully');

    }

    public function destroy($id)
    {
        LanguageEditingFour::destroy($id);
        return redirect()->route('LanguageEditingFour')->with(['message' => 'Commitment Section Deleted Successfully']);

    }
}
