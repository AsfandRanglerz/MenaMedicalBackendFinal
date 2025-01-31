<?php

namespace App\Http\Controllers\Admin;

use App\Models\Journal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::orderBy('id', 'ASC')->get();
        return view('admin.journal.index',compact('journals'));
    }

    public function create()
    {
        return view('admin.journal.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $status = '0';

        $journal = Journal::Create([

            'text' => $request->text,
            'url' => $request->url,
            'status' => $status,
        ]);
        return redirect()->route('journal')->with(['message' => 'Journal Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $journal = Journal::find($id);

        return view('admin.journal.edit', compact('journal'));
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
        $journal = Journal::find($id);

        // Update the category
        $journal->update([
            'text' => $request->text,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('journal')->with(['message' => 'Journal Updated Successfully']);
    }

    public function destroy($id)
    {
        Journal::destroy($id);
        return redirect()->route('journal')->with(['message' => 'Journal Deleted Successfully']);

    }
}
