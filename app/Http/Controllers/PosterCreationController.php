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
use App\Models\LanguageEditingFour;
use Illuminate\Support\Facades\Mail;
use App\Models\AdditionalInformation;
use App\Models\QuotationPersonalInfo;
use App\Models\PostandPresentationOne;
use App\Models\PostandPresentationTwo;
use App\Models\PostandPresentationFour;
use App\Models\PostandPresentationThree;

class PosterCreationController extends Controller
{
    public function posterCreationService() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $PostandPresentationOnes = PostandPresentationOne::orderBy('id', 'ASC')->get();
        $PostandPresentationTwos = PostandPresentationTwo::orderBy('id', 'ASC')->get();
        $PostandPresentationThrees = PostandPresentationThree::orderBy('id', 'ASC')->get();
        $PostandPresentationFours = PostandPresentationFour::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name','Posters & Presentations')->get();
        $regularPowerPointPrice = ServicsPricing::where('service_name','Power Point Presentations')
        ->where('price_category','Regular')
        ->first();
        $discountedPowerPointPrice = ServicsPricing::where('service_name','Power Point Presentations')
        ->where('price_category','Discounted')
        ->first();
        $regularPosterPrice = ServicsPricing::where('service_name','Posters')
        ->where('price_category','Regular')
        ->first();
        $discountedposterPrice = ServicsPricing::where('service_name','Posters')
        ->where('price_category','Discounted')
        ->first();
        $seo_data = SEO::where('section','Posters & Presentations')->first();

        // return [$regularPosterPrice,$regularPosterPrice];
        return view('poster_creation_service',compact('seo_data','discountedposterPrice','regularPosterPrice','discountedPowerPointPrice','regularPowerPointPrice','HomeSectionThrees', 'LanguageEditingFours', 'PostandPresentationOnes','PostandPresentationTwos','PostandPresentationThrees','PostandPresentationFours', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles','Faqs'));
    }

    public function postersAndPresentationForm($service_name){
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $service = null;
        $regularPrice = null;
        $discountedPrice = null;
        if($service_name == 'Power-Point-Presentations'){
            $service = 'Power Point Presentations';
            $regularPrice = ServicsPricing::where('service_name','Power Point Presentations')
            ->where('price_category','Regular')
            ->first();
            $discountedPrice = ServicsPricing::where('service_name','Power Point Presentations')
            ->where('price_category','Discounted')
            ->first();
        }elseif($service_name == 'Posters'){
            $service = 'Posters';
            $regularPrice = ServicsPricing::where('service_name','Posters')
            ->where('price_category','Regular')
            ->first();
            $discountedPrice = ServicsPricing::where('service_name','Posters')
            ->where('price_category','Discounted')
            ->first();
        }
        return view('poster_presentation_service',compact('regularPrice','discountedPrice','service','FooterContentOnes','Services','Journals','News','Profiles','SocialLinks'));
    }
    public function postersAndPresentationFormPrices(Request $request){
        $data = ServicsPricing::where('service_name',$request->service_name)
        ->where('package_name',null)
        ->get();
        // return $data;
        return response()->json([
            'status'=>'success',
            'message'=>'Price retrived successfully',
            'data'=>$data,
        ]);
    }
    public function calculatePrice(Request $request)
    {
        // return $request;
        $data = ServicsPricing::where('service_name', $request->service_name)
            ->where('package_name', null)
            ->where('price_category', $request->price_category)
            ->first();
        // return [ $request->price_category,$request->service_name];
        $price_cat = $request->price_cat;
        $words = $request->words;
        $price_category = null;
        $days = null;
        $genral_price = null;

        if ($words <= $data->words_limit) {
            $price = $data->less_equal_price;
            $days = $data->delivery_days;
            $genral_price = $data->less_equal_price;
            if ($data->price_category == 'Regular') {
                $price_category = 'Regular Price';
            } elseif ($data->price_category == 'Discounted') {
                $price_category = 'Discounted Price';
            }
        } elseif ($words > $data->words_limit) {
            $price = $data->above_equal_price * $words;
            $days = $data->delivery_days;
            $genral_price = $data->above_equal_price;
            if ($data->price_category == 'Regular') {
                $price_category = 'Regular Price';
            } elseif ($data->price_category == 'Discounted') {
                $price_category = 'Discounted Price';
            }
        }
        // $rounded_price = round($price, 2);
        $rounded_price = round($price);

        return response()->json([
            'status' => 'success',
            'message' => 'Price calculated successfully',
            'data' => $rounded_price,
            'price_category' => $price_category,
            'days' => $days,
            'genral_price' => $genral_price,
        ]);
    }
    public function submitQuotationRequest(Request $request){

            // return $request;
            $request->validate([
                'institute_name' => 'required',
                'program_category' => 'required',
                'email' => 'required|email',
                'first_name' => 'required',
                'last_name' => 'required',
                'location' => 'required',
                'question' => 'required',
                'answer' => 'required|array|min:2',  // Ensure it's an array with at least 2 answers
                'agree_check' => 'required|in:yes', // Ensure the checkbox is checked
                'file' => [
                    'required',
                    'array',
                    function ($attribute, $value, $fail) use ($request) {
                        $files = $request->file('file');
                        $totalSize = 0;

                        foreach ($files as $index => $file) {
                            if ($index > 0) { // Exclude the first file
                                $totalSize += $file->getSize();
                            }
                        }

                        if ($totalSize > 10 * 1024 * 1024) { // Check if the total size exceeds 10MB
                            $fail('The combined size of all files except the first must not exceed 10MB.');
                        }
                    },
                ],
                // 'file.*' => 'file|mimes:pdf,doc,docx,ppt,pptx', // Individual file validations
            ]);

            // return $request;

            // Use a try-catch block for better error handling
            try {
                // Begin a transaction
                DB::beginTransaction();

                // Create the QuotationRequest record
                $quotationRequest = QuotationRequest::create([
                    'service_name' => $request->service_name,
                    'words' => $request->words,
                    'price_category' => $request->price_category,
                    'language_type' => $request->language,
                    'additional_instructions' => $request->additional_instruction,
                    'latest_news' => $request->latest_news,
                    'privacy_terms' => $request->agree_check,
                    'total_price' => $request->total_price,
                    'base_price' => $request->service_price,
                    'status' => '0',
                ]);

                // Create the QuotationPersonalInfo record
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
                // Handle multiple file inputs with the same name
                if ($request->hasFile('file')) {
                    foreach ($request->file('file') as $file) {
                        if ($file->isValid()) {
                            // Generate unique filename
                            $filename = time() . '_' . $file->getClientOriginalName();

                            // Move file to the specified path
                            $file->move(public_path('assets/files'), $filename);

                            // Save file path to the database
                            QuotationFile::create([
                                'quotation_request_id' => $quotationRequest->id,
                                'text' => $request->target_journal,
                                'document_type' => $request->document_type,
                                'file' => 'public/assets/files/' . $filename,
                            ]);
                        }
                    }
                }
                foreach ($request->questions as $index => $question) {
                    AdditionalInformation::create([
                        'quotation_request_id' => $quotationRequest->id,
                        'question' => $question,
                        'answer' => $request->answer[$index],
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
