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
use App\Mail\QuotationInfoAdmin;use App\Models\LanguageEditingOne;
use App\Models\LanguageEditingTwo;
use Illuminate\Support\Facades\DB;
use App\Models\LanguageEditingFour;
use App\Models\LanguageEditingThree;
use Illuminate\Support\Facades\Mail;
use App\Models\QuotationPersonalInfo;
use App\Models\QuotationAdditionalService;

class LanguageEditingController extends Controller
{
    public function languageEditing() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $LanguageEditings = LanguageEditingOne::orderBy('id', 'ASC')->get();
        $LanguageEditingTwos = LanguageEditingTwo::orderBy('id', 'ASC')->get();
        $LanguageEditingThrees = LanguageEditingThree::orderBy('id', 'ASC')->get();
        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name','Language Editing')->get();
        $seo_data = SEO::where('section','Language Editing')->first();

        $additionalsServices = AdditionalPrices::where('services','Language Editing')->get();
        return view('language_editing',compact('seo_data','additionalsServices','HomeSectionThrees', 'LanguageEditings', 'LanguageEditingTwos', 'LanguageEditingThrees', 'LanguageEditingFours', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles','Faqs'));
    }

    public function advanceEditingService(){
        return view('advanced_editing_service');
    }

    public function languageEditingServiceForm($package){
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $additionalsServices = AdditionalPrices::where('services','Language Editing')->get();
        return view('advanced_editing_service',compact('package','additionalsServices','FooterContentOnes','Services','Journals','News','Profiles','SocialLinks'));
    }
    public function languageEditingServiceFormPrices(Request $request){
        $data = ServicsPricing::where('service_name',$request->service_name)
        ->where('package_name',$request->package_name)
        ->get();
        $additionalsServices = AdditionalPrices::where('services',$request->service_name)
        ->get();
        // return $additionalsServices;
        // return $request;
        return response()->json([
            'status'=>'success',
            'message'=>'Price retrived successfully',
            'data'=>$data,
            'additionalsServices'=>$additionalsServices,
        ]);
    }
    public function calculatePrice(Request $request)
    {
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
                'file' => 'required',
                'agree_check' => 'required|in:yes', // Ensure the checkbox is checked
                'institute_name' => 'required',
                'study_category' => 'required',
            ]);

            try {
                DB::beginTransaction();
                $quotationRequest = QuotationRequest::create([
                    'service_name' => $request->service_name,
                    'service_package' => $request->package_name,
                    'total_price' => $request->total_price,
                    'base_price' => $request->service_price,
                    'words' => $request->words,
                    'price_category' => $request->price_category,
                    'language_type' => $request->language,
                    'additional_instructions' => $request->additional_instruction,
                    'latest_news' => $request->news_check,
                    'privacy_terms' => $request->agree_check,
                    'status' => '0',
                    'requirement' => $request->requirement,
                ]);
                QuotationPersonalInfo::create([
                    'quotation_request_id' => $quotationRequest->id,
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
               Mail::to($request->email)->send(new SubmitQuotaionEmail);
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
