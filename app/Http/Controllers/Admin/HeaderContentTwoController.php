<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HeaderContentTwo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HeaderContentTwoController extends Controller
{

    public function index()
    {
        $headerContents = HeaderContentTwo::orderBy('id', 'ASC')->get();
        return view('admin.headerContentTwo.index', compact('headerContents'));
    }

    public function create()
    {
        return view('admin.headerContentTwo.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $status = '0';

        $headerContentTwo = HeaderContentTwo::Create([

            'text' => $request->text,
            'url' => $request->url,
            'status' => $status,
        ]);
        return redirect()->route('headerContentTwo')->with(['message' => 'Header Content Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $headerContent = HeaderContentTwo::find($id);

        return view('admin.headerContentTwo.edit', compact('headerContent'));
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
        $headerContentTwo = HeaderContentTwo::find($id);

        // Update the category
        $headerContentTwo->update([
            'text' => $request->text,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('headerContentTwo')->with(['message' => 'Header Content Updated Successfully']);
    }

    public function destroy($id)
    {
        HeaderContentTwo::destroy($id);
        return redirect()->route('headerContentTwo')->with(['message' => 'Header Content Deleted Successfully']);

    }

}
