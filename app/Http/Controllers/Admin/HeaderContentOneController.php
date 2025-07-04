<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HeaderContentOne;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class HeaderContentOneController extends Controller
{
    public function index()
    {
        $headerContents = HeaderContentOne::orderBy('id', 'ASC')->get();
        return view('admin.headerContentOne.index', compact('headerContents'));
    }

    public function create()
    {
        return view('admin.headerContentOne.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
            'icon' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Added validation for the file
        ]);

        // Handle file upload
        $image = null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('admin/assets/images/users/'), $filename); // Save file to the specified directory
            $image = 'public/admin/assets/images/users/' . $filename; // Store relative path
        } else {
            $image = null; // Ensure $image is defined even if no file is uploaded
        }

        // Default status
        $status = '0';

        // Create the record
        $headerContentOne = HeaderContentOne::create([
            'text' => $request->text,
            'url' => $request->url,
            'icon' => $image, // Save the image path in the 'icon' column
            'status' => $status,
        ]);



        // Redirect with a success message
        return redirect()->route('headerContentOne')->with(['message' => 'Header Content Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $headerContent = HeaderContentOne::find($id);

        return view('admin.headerContentOne.edit', compact('headerContent'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'required|url',
            // 'status' => 'required|boolean',
        ]);

        $headerContentOne = HeaderContentOne::find($id);
        $image = null;
        if ($request->hasFile('icon')) {
            $destination = 'public/admin/assets/images/users/' . $headerContentOne->icon;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('admin/assets/images/users/'), $filename);
            $image = 'public/admin/assets/images/users/' . $filename;
        }
        else{
            $image = $headerContentOne->icon;
        }

        $headerContentOne->update([
            'text' => $request->text,
            'url' => $request->url,
            'icon' => $image,
            // 'status' => $request->status,
        ]);

        return redirect()->route('headerContentOne')->with(['message' => 'Header Content Updated Successfully']);
    }

    public function destroy($id)
    {
        HeaderContentOne::destroy($id);
        return redirect()->route('headerContentOne')->with(['message' => 'Header Content Deleted Successfully']);

    }
}
