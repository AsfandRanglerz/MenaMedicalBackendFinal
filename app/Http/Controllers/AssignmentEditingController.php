<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\SEO;
use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\NewPricing;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\QuotationFile;
use App\Models\HomeSectionSix;
use App\Models\ServicsPricing;
use App\Models\HomeSectionFour;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\QuotationRequest;
use App\Mail\SubmitQuotaionEmail;
use App\Models\LanguageEditingFour;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\QuotationPersonalInfo;
use App\Models\AssignmentEditingServiceOne;
use App\Mail\QuotationInfoAdmin;use Illuminate\Support\Facades\DB;

class AssignmentEditingController extends Controller
{
    public function assignmentEditingService() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();
        $HomeSectionFours = HomeSectionFour::orderBy('id', 'ASC')->get();

        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $AssignmentEditingServiceOnes = AssignmentEditingServiceOne::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $seo_data = SEO::where('section','Assignemnt Editing Service')->first();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name','Assignment Editing Service')->get();
        return view('assignment_editing_service',compact('HomeSectionFours','seo_data','HomeSectionThrees', 'LanguageEditingFours', 'AssignmentEditingServiceOnes', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles','Faqs'));
    }



    public function assignmentEditingServiceForm()
    {
        $newPrices = NewPricing::where('service_name','Assignment Editing Service')->orderBy('position', 'asc')->get();
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        return view('assignment_editing_service_form', compact('newPrices','FooterContentOnes', 'Services', 'Journals', 'News', 'Profiles', 'SocialLinks'));
    }

    public function assignmentEditingServiceFormPrices(Request $request)
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
        // return $request;
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
        // Validate reCAPTCHA
        $recaptcha = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => config('services.recaptcha.secret_key'),
        'response' => $request->input('g-recaptcha-response'),
        'remoteip' => $request->ip(),
        ]);

        if (! $recaptcha->json('success')) {
        return response()->json(['status' => 'error', 'message' => 'reCAPTCHA verification failed.'], 422);
        }
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'question' => 'required',
            'file' => 'required',
            'institute_name' => 'required',
            'program_category' => 'required',
            'agree_check' => 'required|in:yes', // Ensure the checkbox is checked
        ]);
           if ($request->filled('contact_time')) {
                        abort(403, 'Bot detected.');
                    }
        // Use a try-catch block for better error handling
        try {
            // Begin a transaction
            DB::beginTransaction();

            // Create the QuotationRequest record
            $quotationRequest = QuotationRequest::create([
                'service_name' => $request->service_name,
                // 'words' => $request->words,
                'price_category' => $request->price_category,
                'total_price' => $request->total_price,
                'base_price' => $request->service_price,
                'language_type' => $request->language,
                'additional_instructions' => $request->additional_instruction,
                'latest_news' => $request->news_check,
                'privacy_terms' => $request->agree_check,
                'status' => '0',
            ]);

            // Create the QuotationPersonalInfo record
            QuotationPersonalInfo::create([
                'quotation_request_id' => $quotationRequest->id,
                'salutaion' => $request->salutation,
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

            // Handle the file upload if a file is present
            if ($request->hasFile('file')) {
                // return "ok";
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/assets/files'), $filename);
                $quotationFile = 'public/assets/files/' . $filename;

                // Create the QuotationFile record
                QuotationFile::create([
                    'quotation_request_id' => $quotationRequest->id,
                    'file' => $quotationFile,
                ]);
            }

            // Send the email
            Mail::to($request->email)->send(new SubmitQuotaionEmail);

            // Commit the transaction
            DB::commit();

            // Return a success response
            return response()->json([
                'status' => 'success',
                'message' => 'Quotation requested successfully',
            ]);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Return an error response
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while processing your request.',
                'error' => $e->getMessage(), // Optional: Include the error message for debugging
            ], 500);
        }
    }
}
