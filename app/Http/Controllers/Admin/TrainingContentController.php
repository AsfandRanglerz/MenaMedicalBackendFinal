<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingContentController extends Controller
{
     public function index()
    {
        $services = Training::orderBy('id', 'ASC')->get();
        return view('admin.trainings.index',compact('services'));
    }

    public function create()
    {
        return view('admin.trainings.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $status = '0';

        $service = Training::Create([

            'text' => $request->text,
            'url' => $request->url,
            'status' => $status,
        ]);
        return redirect()->route('training')->with(['message' => 'Training Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $service = Training::find($id);

        return view('admin.trainings.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'required|url',
            // 'status' => 'required|boolean',
        ]);

        // Find the existing header content by ID
        $service = Training::find($id);

        // Update the category
        $service->update([
            'text' => $request->text,
            'url' => $request->url,
            // 'status' => $request->status,
        ]);

        return redirect()->route('training')->with(['message' => 'Training Updated Successfully']);
    }

    public function destroy($id)
    {
        Training::destroy($id);
        return redirect()->route('training')->with(['message' => 'Training Deleted Successfully']);

    }
}
