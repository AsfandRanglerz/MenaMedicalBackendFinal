<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $newss = News::orderBy('id', 'ASC')->get();
        return view('admin.news.index',compact('newss'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $status = '0';

        $news = News::Create([

            'text' => $request->text,
            'url' => $request->url,
            'status' => $status,
        ]);
        return redirect()->route('news')->with(['message' => 'News Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $news = News::find($id);

        return view('admin.news.edit', compact('news'));
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
        $news = News::find($id);

        // Update the category
        $news->update([
            'text' => $request->text,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('news')->with(['message' => 'News Updated Successfully']);
    }

    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('news')->with(['message' => 'News Deleted Successfully']);

    }

}

