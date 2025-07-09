<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TermCondition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TermsAndConditionController extends Controller
{
    public function index()
    {
        $isAdmin = true;
        $canView = true;
        return view('admin.termCondition.index',compact('isAdmin','canView'));
    }

    public function webView()
    {
        $data = TermCondition::first();
        return view('admin.termCondition.webview',compact('data'));
    }

    public function read()
    {
        try {
            $terms = TermCondition::get();
                return response()->json([
                    'data' => $terms,
                    'isAdmin' => true,
                    'permissions' => [
                        'can_edit' => true,
                        'can_delete' => true,
                    ]
                ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }

    public function edit($id)
    {
        try {
            $term = TermCondition::find($id);
            return view('admin.termCondition.edit',compact('term'));
            return response()->json([
                'status' => 'success',
                'message' => 'user get successfully',
                'data' => $term,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
            'description' => 'required|string',
            ]);
            $data = TermCondition::find($request->decId);
            if ($data) {
                $data->description = $request->description;
                $data->update();
                return redirect()->route('termCondition.index')->with('success','Data Updated Successfully');
                return response()->json([
                    'status' => 'success',
                    'message' => 'data updated successfully',
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No data Found.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the document.',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function contactUs()
    {
        return view('admin.contactUs.index');
    }
}
