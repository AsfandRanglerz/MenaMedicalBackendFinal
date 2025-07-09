<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $isAdmin = true;
        $canView = true;
        return view('admin.privacyPolicy.index',compact('isAdmin','canView'));
    }

    public function webView()
    {
        $data = PrivacyPolicy::first();
        return view('admin.privacyPolicy.webview',compact('data'));
    }

    public function read()
    {
        try {
            $privacy = PrivacyPolicy::get();
            $isAdmin = true;
            $canEdit = true;
            $canDelete = true;
                return response()->json([
                    'data' => $privacy,
                    'isAdmin' => $isAdmin,
                    'permissions' => [
                        'can_edit' => true,
                        'can_delete' => true,
                    ]
                ]);
            return response()->json(['data' => $privacy]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }

    // public function store(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required',
    //         ]);
    //         if ($validator->fails()) {
    //             return response()->json(['errors' => $validator->errors()], 422);
    //         }
    //         $names = $request->input('name');
    //         foreach ($names as $name) {
    //             $category = Ethnicity::create([
    //                 'name' => $name,
    //             ]);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
    //     }
    // }

    public function edit($id)
    {
        try {

            $privacy = PrivacyPolicy::find($id);
            return view('admin.privacyPolicy.edit',compact("privacy"));
            return response()->json([
                'status' => 'success',
                'message' => 'user get successfully',
                'data' => $privacy,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = PrivacyPolicy::find($request->decId);
            if ($data) {
                $request->validate([
                'description' => 'required|string',
                ]);
                $data->description = $request->description;
                $data->update();
                return redirect()->route('privacy.index')->with('success','Data Updated Successfully');
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

}
