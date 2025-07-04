<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'ASC')->get();
        return view('admin.service.index',compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $status = '0';

        $service = Service::Create([

            'text' => $request->text,
            'url' => $request->url,
            'status' => $status,
        ]);
        return redirect()->route('service')->with(['message' => 'Service Created Successfully']);
    }

    public function edit($id)
    {
        // return $id;
        $service = Service::find($id);

        return view('admin.service.edit', compact('service'));
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
        $service = Service::find($id);

        // Update the category
        $service->update([
            'text' => $request->text,
            'url' => $request->url,
            // 'status' => $request->status,
        ]);

        return redirect()->route('service')->with(['message' => 'Service Updated Successfully']);
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->route('service')->with(['message' => 'Service Deleted Successfully']);

    }
}
