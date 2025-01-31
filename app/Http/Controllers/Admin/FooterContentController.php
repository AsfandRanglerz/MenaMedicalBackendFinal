<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FooterContentOne;
use App\Http\Controllers\Controller;

class FooterContentController extends Controller
{
    public function index()
    {
        $footerContents = FooterContentOne::orderBy('id', 'ASC')->get();
        return view('admin.footerContentOne.index',compact('footerContents'));
    }

    public function create()
    {
        return view('admin.footerContentOne.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'heading' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $status = '0';

         FooterContentOne::Create([

            'heading' => $request->heading,
            'content' => $request->content,
            'status' => $status,
        ]);
        return redirect()->route('footerContentOne')->with(['message' => 'Footer Content Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $footer = FooterContentOne::find($id);

        return view('admin.footerContentOne.edit', compact('footer'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'heading' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Find the existing header content by ID
        $footerContentOne = FooterContentOne::find($id);

        // Update the category
        $footerContentOne->update([
            'heading' => $request->heading,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()->route('footerContentOne')->with(['message' => 'Footer Content Updated Successfully']);
    }

    public function destroy($id)
    {
        FooterContentOne::destroy($id);
        return redirect()->route('footerContentOne')->with(['message' => 'Footer Content Deleted Successfully']);

    }
}
