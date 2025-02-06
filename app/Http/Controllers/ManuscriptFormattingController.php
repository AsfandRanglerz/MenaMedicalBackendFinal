<?php

namespace App\Http\Controllers;

use App\Models\Faq;
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
use App\Models\ManuscriptFormattingOne;
use App\Models\ManuscriptFormattingTwo;
use App\Models\ManuscriptFormattingThree;
use App\Models\QuotationAdditionalService;

class ManuscriptFormattingController extends Controller
{
    public function manuscriptFormattingService() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $ManuscriptFormattingOnes = ManuscriptFormattingOne::orderBy('id', 'ASC')->get();
        $ManuscriptFormattingTwos = ManuscriptFormattingTwo::orderBy('id', 'ASC')->get();
        $ManuscriptFormattingThrees = ManuscriptFormattingThree::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name','Manuscript Formatting')->get();
        $regularPrice = ServicsPricing::where('service_name','Manuscript Formatting Service')
        ->where('price_category','Regular')
        ->first();
        $discountedPrice = ServicsPricing::where('service_name','Manuscript Formatting Service')
        ->where('price_category','Discounted')
        ->first();
        return view('manuscript_service',compact('discountedPrice','regularPrice','HomeSectionThrees', 'LanguageEditingFours', 'ManuscriptFormattingOnes', 'ManuscriptFormattingTwos', 'ManuscriptFormattingThrees', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles','Faqs'));
    }

    public function manuscriptFormattingForm(){
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $additionalServices = AdditionalPrices::where('services','Manuscript Formatting Service')->get();
        $regularPrice = ServicsPricing::where('service_name','Manuscript Formatting Service')
        ->where('price_category','Regular')
        ->first();
        $discountedPrice = ServicsPricing::where('service_name','Manuscript Formatting Service')
        ->where('price_category','Discounted')
        ->first();
        return view('manuscript_formatting_service',compact('discountedPrice','regularPrice','additionalServices','FooterContentOnes','Services','Journals','News','Profiles','SocialLinks'));
    }
    public function manuscriptFormattingFormPrices(Request $request){
        $data = ServicsPricing::where('service_name',$request->service_name)
        ->where('package_name',null)
        ->get();
        return response()->json([
            'status'=>'success',
            'message'=>'Price retrived successfully',
            'data'=>$data,
        ]);
    }
    public function calculatePrice(Request $request){
        // return $request;
        $data = ServicsPricing::where('service_name',$request->service_name)
        ->where('package_name',null)
        ->where('price_category',$request->price_category)
        ->first();
        // return $data;
        $price_cat = $request->price_cat;
        $words = $request->words;
        $price_category = null;
        $days = null;
        $genral_price = null;

        if($words <= $data->words_limit){
            $price = $data->less_equal_price;
            $days = $data->delivery_days;
            $genral_price = $data->less_equal_price;
            if($data->price_category == 'Regular'){
                $price_category = 'Regular Price';
             }elseif($data->price_category == 'Discounted'){
                 $price_category = 'Discounted Price';
             }
        }elseif($words > $data->words_limit){
            $price = $data->above_equal_price * $words;
            $days = $data->delivery_days;
            $genral_price = $data->above_equal_price;
            if($data->price_category == 'Regular'){
                $price_category = 'Regular Price';
             }elseif($data->price_category == 'Discounted'){
                 $price_category = 'Discounted Price';
             }
        }
        $total = $price + $request->additional_category_price;
        $rounded_price = round($total, 2);
        // $price = round($price, 2);
        $rounded_price = round($price);

        return response()->json([
            'status'=>'success',
            'message'=>'Price calculated successfully',
            'without_addition'=>$price,
            'total'=>$rounded_price,
            'price_category'=>$price_category,
            'days'=>$days,
            'genral_price'=>$genral_price,
        ]);
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
                'document_type' => 'required',
                'file' => 'required',
                'target_journal' => 'required',
                'agree_check' => 'required|in:yes', // Ensure the checkbox is checked
            ]);

            // Use a try-catch block for better error handling
            try {
                // Begin a transaction
                DB::beginTransaction();

                // Create the QuotationRequest record
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
                    'text' => $request->target_journal,
                    'document_type' => $request->document_type,
                ]);

                // Create the QuotationPersonalInfo record
                QuotationPersonalInfo::create([
                    'quotation_request_id' => $quotationRequest->id,
                    'salutaion' => $request->salutaion,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'study_category' => $request->study_category,
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

                // Handle the file upload if a file is present
                if ($request->additional_service) {
                    QuotationAdditionalService::create([
                        'quotation_request_id' => $quotationRequest->id,
                        'service' => $request->additional_service,
                        'service_price' => $request->additional_service_price,
                    ]);
                }

                // Send the email
                // Mail::to($request->email)->send(new SubmitQuotaionEmail);

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
