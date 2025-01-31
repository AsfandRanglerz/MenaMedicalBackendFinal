<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::orderBy('id', 'ASC')->get();
        return view('admin.socialLink.index',compact('socialLinks'));
    }

    public function create()
    {
        return view('admin.socialLink.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'nullable',
            'icon' => 'nullable|string|max:255', // Image file, specific formats, max 2MB
            'url' => 'nullable|url',
        ]);
        
        $status = '0';

        $icon = null;
        // if ($request->hasFile('icon')) {
        //     $file = $request->file('icon');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move(public_path('admin/assets/images/users/'), $filename);
        //     $icon = 'public/admin/assets/images/users/' . $filename;
        // }

          SocialLink::Create([

            'text' => $request->text,
            'url' => $request->url,
            'icon'=> $request->icon,
            'class'=> $request->class,
            'status' => $status,
        ]);
        return redirect()->route('socialLink')->with(['message' => 'Social Link Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $socialLink = SocialLink::find($id);

        return view('admin.socialLink.edit', compact('socialLink'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'text' => 'nullable',
            'url' => 'nullable|url',
            'icon' => 'nullable|string|max:255', // Image file, specific formats, max 2MB
            'status' => 'required|boolean',
        ]);


        // Find the existing header content by ID
        $socialLink = SocialLink::find($id);

        // if ($request->hasFile('icon')) {
        //     $destination = 'public/admin/assets/img/users/' . $socialLink->icon;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }

        //     $file = $request->file('icon');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('public/admin/assets/images/users', $filename);
        //     $icon = 'public/admin/assets/images/users/' . $filename;
        //     $socialLink->icon = $icon;
        // }

        // Update the category
        $socialLink->update([
            'text' => $request->text,
            'url' => $request->url,
            'icon'=> $request->icon,
            'class'=> $request->class,
            'status' => $request->status,
        ]);

        return redirect()->route('socialLink')->with(['message' => 'Social Link Updated Successfully']);
    }

    public function destroy($id)
    {
        SocialLink::destroy($id);
        return redirect()->route('socialLink')->with(['message' => 'Social Link Deleted Successfully']);

    }
}
