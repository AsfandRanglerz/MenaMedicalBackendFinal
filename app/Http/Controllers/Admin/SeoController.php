<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        return view('admin.seo.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'section' => 'required|string',
            // 'title' => 'required|string',
            // 'og_title' => 'required|string',
            // 'description' => 'required|string',
            // 'og_description' => 'required|string',
            // 'keywords' => 'required|string',
        ]);
        // return $request;
        $section = $request->section;
        $data = [
            'title' => $request->title,
            'description' => $request->decsription,
            'og_title' => $request->og_title,
            'og_description' => $request->og_decsription,
            'keywords' => $request->keywords,
        ];
        // return $request;
        $seo = SEO::updateOrCreate(
            ['section' => $section],
            $data,
        );
        return response()->json([
            'message' => 'Section processed successfully!',
            'data' => $seo,
        ]);
    }

    public function getHomeSeo(Request $request)
    {
        $section = $request->section;

        if (!$section) {
            return response()->json(['message' => 'Section parameter is missing.'], 400);
        }

        $data = SEO::where('section', $section)->first();

        if (!$data) {
            return response()->json(['message' => 'No SEO data found for the given section.'], 200);
        }

        return response()->json($data);
    }

    public function getlanguageEditingSeo(Request $request) {}

    public function getdataAnalysisSeo(Request $request) {}
    public function getthesisSupportSeo(Request $request) {}
    public function getposterPresentationSeo(Request $request) {}
    public function getpublicationSupportSeo(Request $request) {}
    public function getscientificEditingSeo(Request $request) {}
}
