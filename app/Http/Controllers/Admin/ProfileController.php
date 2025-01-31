<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderBy('id', 'ASC')->get();
        return view('admin.profile.index',compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $status = '0';

        $profile = Profile::Create([

            'text' => $request->text,
            'url' => $request->url,
            'status' => $status,
        ]);
        return redirect()->route('profile')->with(['message' => 'Profile Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $profile = Profile::find($id);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
            'status' => 'required|boolean',
        ]);

        // Find the existing header content by ID
        $profile = Profile::find($id);

        // Update the category
        $profile->update([
            'text' => $request->text,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('profile')->with(['message' => 'Profile Updated Successfully']);
    }

    public function destroy($id)
    {
        Profile::destroy($id);
        return redirect()->route('profile')->with(['message' => 'Profile Deleted Successfully']);

    }
}
