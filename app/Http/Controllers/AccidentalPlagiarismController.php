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
use App\Models\AdditionalPrices;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\QuotationRequest;
use App\Mail\SubmitQuotaionEmail;
use App\Models\LanguageEditingFour;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\QuotationPersonalInfo;
use App\Models\AccidentalPlagiarismOne;
use App\Models\QuotationAdditionalService;
use App\Mail\QuotationInfoAdmin;use Illuminate\Support\Facades\DB;

class AccidentalPlagiarismController extends Controller
{
    public function accidentalPlagiarism() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();
        $HomeSectionFours = HomeSectionFour::orderBy('id', 'ASC')->get();

        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $AccidentalPlagiarisms = AccidentalPlagiarismOne::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name','Accidental Plagiarism')->get();
        $regularPrice = ServicsPricing::where('service_name','Accidental Plagirisam')
        ->where('price_category','Regular')
        ->first();
        $discountedPrice = ServicsPricing::where('service_name','Accidental Plagirisam')
        ->where('price_category','Discounted')
        ->first();
        $seo_data = SEO::where('section','Accidental Plagiarism')->first();
        // return $packagePrices;
        return view('accidental_plagiarism',compact('HomeSectionFours','seo_data','discountedPrice','regularPrice','HomeSectionThrees', 'LanguageEditingFours', 'AccidentalPlagiarisms', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles','Faqs'));
    }

    public function accidentalPlagiarismForm(){
        $newPrices = NewPricing::where('service_name','Accidental Plagirisam')->orderBy('position', 'asc')->get();
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $additionalServices = AdditionalPrices::where('services','Accidental Plagirisam')->get();
        $regularPrice = ServicsPricing::where('service_name','Accidental Plagirisam')
        ->where('price_category','Regular')
        ->first();
        $discountedPrice = ServicsPricing::where('service_name','Accidental Plagirisam')
        ->where('price_category','Discounted')
        ->first();
        return view('similarty_review_report',compact('newPrices','discountedPrice','regularPrice','additionalServices','FooterContentOnes','Services','Journals','News','Profiles','SocialLinks'));
    }
    public function accidentalPlagiarismFormPrices(Request $request){
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
                'document_type' => 'required',
                'target_journal' => 'required',
                'question' => 'required',
                'file' => 'required',
                'institute_name' => 'required',
                'study_category' => 'required',
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
                    'language_type' => $request->language,
                    'additional_instructions' => $request->additional_instruction,
                    'latest_news' => $request->news_check,
                    'privacy_terms' => $request->agree_check,
                    'total_price' => $request->total_price,
                    'base_price' => $request->service_price,
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
                if ($request->additional_service) {
                    QuotationAdditionalService::create([
                        'quotation_request_id' => $quotationRequest->id,
                        'service' => $request->additional_service,
                        'service_price' => $request->additional_service_price,
                    ]);
                }
                // Send the email
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
