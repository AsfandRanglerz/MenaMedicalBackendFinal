<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\SEO;
use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\QuotationFile;
use App\Models\HomeSectionSix;
use App\Models\ServicsPricing;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\QuotationRequest;
use App\Mail\SubmitQuotaionEmail;
use Illuminate\Support\Facades\DB;
use App\Models\ScientificEditingOne;
use App\Models\ScientificEditingTwo;
use Illuminate\Support\Facades\Mail;
use App\Models\QuotationPersonalInfo;
use App\Models\ScientificEditingThree;


class ScientificEditingServiceController extends Controller
{
    public function scientificEditingService()
    {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();

        $ScientificEditingOnes = ScientificEditingOne::orderBy('id', 'ASC')->get();
        $ScientificEditingTwos = ScientificEditingTwo::orderBy('id', 'ASC')->get();
        $ScientificEditingThrees = ScientificEditingThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $seo_data = SEO::where('section','Scientific Editing')->first();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name', 'Scientific Editing')->get();
        return view('scientific_editing_service', compact('seo_data','HomeSectionThrees', 'ScientificEditingOnes', 'ScientificEditingTwos', 'ScientificEditingThrees', 'HomeSectionSixs', 'SocialLinks', 'FooterContentOnes', 'Services', 'Journals', 'News', 'Profiles', 'Faqs'));
    }

    public function scientificEditingForm()
    {
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        return view('scientific_editing_service_forms', compact('FooterContentOnes', 'Services', 'Journals', 'News', 'Profiles', 'SocialLinks'));
    }

    public function scientificEditingFormPrices(Request $request)
    {
        $data = ServicsPricing::where('service_name', $request->service_name)
            ->where('package_name', null)
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Price retrived successfully',
            'data' => $data,
        ]);
    }
    public function calculatePrice(Request $request)
    {
        $data = ServicsPricing::where('service_name', $request->service_name)
            ->where('package_name', null)
            ->get(); // Retrieve the data as a collection

            $words = $request->words; // Number of words input
            $results = []; // Initialize the results array

            foreach ($data as $record) {
                $price = 0;
                $days = $record->delivery_days;
                $general_price = 0;
                $price_category = null;

                // Calculate price based on word count
                if ($words <= $record->words_limit) {
                    $price = $record->less_equal_price;
                    $general_price = $record->less_equal_price;
                    $price_category = $record->price_category == 'Regular' ? 'Regular Price' : 'Discounted Price';
                } elseif ($words > $record->words_limit) {
                    $price = $record->above_equal_price * $words;
                    $general_price = $record->above_equal_price;
                    $price_category = $record->price_category == 'Regular' ? 'Regular Price' : 'Discounted Price';
                }

                // $rounded_price = round($price, 2); // Round price to 2 decimal places
                $rounded_price = round($price);
                // $rounded_price = $price;

                // Add the result for the current record to the results array
                $results[] = [
                    'id' => $record->id,
                    'status' => 'success',
                    'message' => 'Price calculated successfully',
                    'price' => $rounded_price, // Final calculated price
                    'price_category' => $price_category,
                    'days' => $days,
                    'general_price' => $general_price,
                ];
            }

            // Return the results array as JSON
            return response()->json([
                'status' => 'success',
                'message' => 'Prices calculated successfully',
                'results' => $results, // Include the results for all records
            ]);

    }

    public function submitQuotationRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'question' => 'required',
            'institute_name' => 'required',
            'file' => 'required',
            'program_category' => 'required',
            'agree_check' => 'required|in:yes', // Ensure the checkbox is checked
        ]);
        try {
            DB::beginTransaction();
            $quotationRequest = QuotationRequest::create([
                'service_name' => $request->service_name,
                'words' => $request->words,
                'price_category' => $request->price_category,
                'total_price' => $request->total_price,
                'base_price' => $request->service_price,
                'language_type' => $request->language,
                'additional_instructions' => $request->additional_instruction,
                'latest_news' => $request->latest_news,
                'privacy_terms' => $request->agree_check,
                'status' => '0',
            ]);
            QuotationPersonalInfo::create([
                'quotation_request_id' => $quotationRequest->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'study_category' => $request->program_category,
                'other_study_category' => $request->other_category,
                'institute_name' => $request->institute_name,
                'location' => $request->location,
                'other_location' => $request->other_location,
                'question' => $request->question,
            ]);
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/assets/files'), $filename);
                $quotationFile = 'public/assets/files/' . $filename;
                QuotationFile::create([
                    'quotation_request_id' => $quotationRequest->id,
                    'file' => $quotationFile,
                ]);
            }
            // Mail::to($request->email)->send(new SubmitQuotaionEmail);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Quotation requested successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while processing your request.',
                'error' => $e->getMessage(), // Optional: Include the error message for debugging
            ], 500);
        }
    }
}
