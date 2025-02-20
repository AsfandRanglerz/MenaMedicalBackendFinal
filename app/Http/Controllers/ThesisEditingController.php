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
use App\Models\AdditionalPrices;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\QuotationRequest;
use App\Mail\SubmitQuotaionEmail;
use Illuminate\Support\Facades\DB;
use App\Models\LanguageEditingFour;
use Illuminate\Support\Facades\Mail;
use App\Models\QuotationPersonalInfo;
use App\Models\ThesisEditingServiceOne;
use App\Models\ThesisEditingServiceTwo;
use App\Models\ThesisEditingServiceThree;
use App\Models\QuotationAdditionalService;

class ThesisEditingController extends Controller
{
    public function thesisEditingService() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $ThesisEditingServiceOnes = ThesisEditingServiceOne::orderBy('id', 'ASC')->get();
        $ThesisEditingServiceTwos = ThesisEditingServiceTwo::orderBy('id', 'ASC')->get();
        $ThesisEditingServiceThrees = ThesisEditingServiceThree::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name','Thesis Editing Service')->get();
        $additionalsServices = AdditionalPrices::where('services','Thesis Editing Service')->get();
        $regularPrice = ServicsPricing::where('service_name','Thesis Editing Service')
        ->where('package_name','Advance')
        ->where('price_category','Regular')
        ->first();
        $discountedPrice = ServicsPricing::where('service_name','Thesis Editing Service')
        ->where('package_name','Advance')
        ->where('price_category','Discounted')
        ->first();
        $seo_data = SEO::where('section','Thesis Editing Service')->first();

        return view('thesis_editing_service',compact('seo_data','discountedPrice','regularPrice','additionalsServices','HomeSectionThrees', 'LanguageEditingFours', 'ThesisEditingServiceOnes','ThesisEditingServiceTwos','ThesisEditingServiceThrees', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles','Faqs'));
    }

    public function thesisEditingServiceForm($package){
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $additionalsServices = AdditionalPrices::where('services','Thesis Editing Service')->get();
        return view('thesis_editing',compact('package','additionalsServices','FooterContentOnes','Services','Journals','News','Profiles','SocialLinks'));
    }
    public function thesisEditingServiceFormPrices(Request $request){
        $data = ServicsPricing::where('service_name',$request->service_name)
        ->where('package_name',$request->package_name)
        ->get();
        $additionalsServices = AdditionalPrices::where('services',$request->service_name)
        ->get();
        // return $additionalsServices;
        return response()->json([
            'status'=>'success',
            'message'=>'Price retrived successfully',
            'data'=>$data,
            'additionalsServices'=>$additionalsServices,
        ]);
    }
    public function calculatePrice(Request $request){
        $data = ServicsPricing::where('service_name', $request->service_name)
            ->where('package_name', $request->package_name)
            ->get();

        $words = $request->words;
        $additionalPrice = $request->additional_price ? $request->additional_price : 0;

        $results = []; // Array to store the calculation results for each record

        foreach ($data as $record) {
            $price = 0;
            $days = $record->delivery_days;
            $general_price = 0;
            $price_category = null;

            if ($words <= $record->words_limit) {
                $price = $record->less_equal_price;
                $general_price = $record->less_equal_price;
                $price_category = $record->price_category == 'Regular' ? 'Regular Price' : 'Discounted Price';
            } elseif ($words > $record->words_limit) {
                $price = $record->above_equal_price * $words;
                $general_price = $record->above_equal_price;
                $price_category = $record->price_category == 'Regular' ? 'Regular Price' : 'Discounted Price';
            }

            $total = $price + $additionalPrice;
            $rounded_price = round($total, 2);
            // $price = round($price, 2);
            $rounded_price = round($price);


            // Add the result for the current record to the results array
            $results[] = [
                'id' => $record->id,
                'status' => 'success',
                'message' => 'Price calculated successfully',
                'without_addition' => $price,
                'total' => $rounded_price,
                'price_category' => $price_category,
                'days' => $days,
                'general_price' => $general_price,
            ];
        }

        return response()->json($results);
    }
    public function submitQuotationRequest(Request $request){

            // return $request;
            // Validate the request data
            $request->validate([
                'email' => 'required|email',
                'first_name' => 'required',
                'last_name' => 'required',
                'location' => 'required',
                'question' => 'required',
                'institute_name' => 'required',
                'study_category' => 'required',
                'file' => 'required',
                'agree_check' => 'required|in:yes', // Ensure the checkbox is checked
            ]);

            // Use a try-catch block for better error handling
            try {
                // Begin a transaction
                DB::beginTransaction();

                // Create the QuotationRequest record
                $quotationRequest = QuotationRequest::create([
                    'service_name' => $request->service_name,
                    'service_package' => $request->package_name,
                    'total_price' => $request->total_price,
                    'base_price' => $request->service_price,
                    'words' => $request->words,
                    'price_category' => $request->price_category,
                    'language_type' => $request->language,
                    'additional_instructions' => $request->additional_instruction,
                    'latest_news' => $request->latest_news,
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
                    'study_category' => $request->study_category,
                    'other_study_category' => $request->other_study_category,
                    'institute_name' => $request->institute_name,
                    'location' => $request->location,
                    'other_location' => $request->other_location,
                    'question' => $request->question,
                ]);

                // Handle the file upload if a file is present
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('/assets/files'), $filename);
                    $quotationFile = 'public/assets/files/' . $filename;
                    // Create the QuotationFile record
                    QuotationFile::create([
                        'quotation_request_id' => $quotationRequest->id,
                        'requirement' => $request->requirement,
                        'file' => $quotationFile,
                    ]);
                }


                 // Handle the file upload if a file is present
                 if($request->package_name !== 'Premium'){
                    if ($request->additional_service && $request->additional_service_price) {
                        $services = json_decode($request->additional_service, true);
                        $prices = json_decode($request->additional_service_price, true);

                        if (is_array($services) && is_array($prices)) {
                            foreach ($services as $index => $service) {
                                $price = $prices[$index] ?? 0; // Use 0 if price is not available
                                QuotationAdditionalService::create([
                                    'quotation_request_id' => $quotationRequest->id,
                                    'service' => $service,
                                    'service_price' => $price,
                                ]);
                            }
                        }
                    }
                }
                // Mail::to($re quest->email)->send(new SubmitQuotaionEmail);
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
