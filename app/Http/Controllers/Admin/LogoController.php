<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    public function index()
    {
        $logos = logo::orderBy('id', 'DESC')->get();
        return view('admin.logo.index',compact('logos'));
    }

    public function create()
    {
        return view('admin.logo.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('admin/assets/images/products/'), $filename); // Updated directory
            $image = 'public/admin/assets/images/products/' . $filename; // Updated path
        } else {
            $image = null; // Handle the case where no image is uploaded
        }
        $status = '0';

        $headerContentOne = logo::Create([

            'logo' => $image,

        ]);
        return redirect()->route('logo')->with(['message' => 'Logo Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $logo = Logo::find($id);

        return view('admin.logo.edit', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'logo' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = Logo::find($id);

        $image = $logo->logo;
        // return $image;

        if ($request->hasFile('logo')) {
            $destination = 'public/admin/assets/images/users/' . $logo->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('admin/assets/images/users/'), $filename);
            $image = 'public/admin/assets/images/users/' . $filename;
        }

        // Update the category
        $logo->update([

            'logo' => $image,
        ]);

        return redirect()->route('logo')->with(['message' => 'Logo Updated Successfully']);
    }

    public function destroy($id)
    {
        Logo::destroy($id);
        return redirect()->route('logo')->with(['message' => 'Logo Deleted Successfully']);

    }
}
