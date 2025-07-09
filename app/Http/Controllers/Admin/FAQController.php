<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\NavBar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FAQController extends Controller
{
    // public function faqData()
    // {
    //     $faqs = Faq::orderBy('position')->get();
    //     $json_data["data"] = $faqs;
    //     return json_encode($json_data);
    // }

    public function faqData(Request $request)
    {
        // $return
        $navName = $request->input('navName','Language Editing');
        $faqs = Faq::with('navbar')->where('navbar_name',$navName)->orderBy('position')->get();

        $json_data["data"] = $faqs->map(function ($faq) {
            return [
                'id' => $faq->id,
                'navBar_name' => $faq->navbar_name, // Safely get the name
                'questions' => $faq->questions,
                'answers' => $faq->answers,
                'position' => $faq->position,
            ];
        });

        return response()->json($json_data);
    }

    public function faqIndex()
    {
        $faqs = Faq::all();
        $navBars = NavBar::select('id', 'text')->get();
        $service = 'Language Editing';
        return view('admin.faq.index', compact('faqs', 'navBars','service'));
    }
    public function faqCreate(Request $request)
    {
        $navBars = NavBar::all();
        return view('admin.faq.create', compact('navBars'));
    }

    public function faqStore(Request $request)
    {

        $request->validate([
            'questions' => 'required|string',
            'answers' => 'required|string',
            ]);
            $Faq = Faq::Create([
            // 'navBar_id' => $request->navBar_id,
            'navbar_name' => $request->navbar_name,
            'questions' => $request->questions,
            'answers' =>$request->answers,
            ]);
        return redirect()->route('faq.index')->with(['message' => 'Faq Created Successfully']);
    }

    public function showfaq($id)
    {
        $faq = Faq::with('navBar')->find($id);
        // return $faq;
        $navBars = NavBar::all();

        if (!$faq) {
            return response()->json(['alert' => 'error', 'message' => 'faq Not Found'], 500);
        }
        return response()->json([
            'faq' => $faq,
            'navBars' => $navBars
        ]);
    }

    public function faqedit($id)
    {

        $faq= Faq::find($id);


        return view('admin.faq.edit', compact('faq'));
    }

    public function updatefaq(Request $request, $id)
    {
        $request->validate([
            'questions' => 'required|string',
            'answers' => 'required|string',
            ]);
        $faq = Faq::find($id);
        $faq->navBar_id = $request->navBar_id;
        $faq->questions = $request->questions;
        $faq->answers = $request->answers;
        $faq->save();

        return redirect()->route('faq.index')->with('message', 'Faq Updated Successfully');
    }

    public function deletefaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faq.index')->with(['message' => 'Faq Deleted Successfully']);
    }

    public function faqReorder(Request $request)
    {
        // return $request->navName;
        foreach ($request->order as $item) {
            Faq::where('id', $item['id'])->update(['position' => $item['position']]);
        }

        return response()->json(['message' => 'Order updated successfully']);
    }
}
