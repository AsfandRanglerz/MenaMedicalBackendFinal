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
use App\Mail\QuotationInfoAdmin;
use Illuminate\Support\Facades\DB;
use App\Models\LanguageEditingFour;
use Illuminate\Support\Facades\Mail;
use App\Models\QuotationPersonalInfo;
use App\Models\DataAnalysisServiceOne;
use App\Models\DataAnalysisServiceTwo;
use App\Models\DataAnalysisServiceThree;

class DataAnalysisController extends Controller
{
    public function dataAnalysis()
    {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $DataAnalysisServiceOnes = DataAnalysisServiceOne::orderBy('id', 'ASC')->get();
        $DataAnalysisServiceTwos = DataAnalysisServiceTwo::orderBy('id', 'ASC')->get();
        $DataAnalysisServiceThrees = DataAnalysisServiceThree::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();

        $Faqs = Faq::orderBy('position', 'ASC')->where('navBar_name', 'Data Analysis')->get();
        $regularPriceAdvanceData = ServicsPricing::where('service_name', 'Data Analysis')
            ->where('package_name', 'Advance')
            ->where('price_category', 'Regular')
            ->first();
        $discountedPriceAdvanceData = ServicsPricing::where('service_name', 'Data Analysis')
            ->where('package_name', 'Advance')
            ->where('price_category', 'Discounted')
            ->first();
        $regularPricePremiumData = ServicsPricing::where('service_name', 'Data Analysis')
            ->where('package_name', 'Premium')
            ->where('price_category', 'Regular')
            ->first();
        $discountedPricePremiumData = ServicsPricing::where('service_name', 'Data Analysis')
            ->where('package_name', 'Premium')
            ->where('price_category', 'Discounted')
            ->first();
            $seo_data = SEO::where('section','Data Analysis')->first();

        return view('data_analysis', compact(
            'seo_data',
            'regularPriceAdvanceData',
            'discountedPriceAdvanceData',
            'regularPricePremiumData',
            'discountedPricePremiumData',
            'HomeSectionThrees',
            'LanguageEditingFours',
            'DataAnalysisServiceOnes',
            'DataAnalysisServiceTwos',
            'DataAnalysisServiceThrees',
            'HomeSectionSixs',
            'SocialLinks',
            'FooterContentOnes',
            'Services',
            'Journals',
            'News',
            'Profiles',
            'Faqs'
        ));
    }

    public function dataAnalysisServiceForm($package)
    {
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $regularPrice = null;
        $discountedPrice = null;
        if ($package == 'Advance') {
            $regularPrice = ServicsPricing::where('service_name', 'Data Analysis')
                ->where('package_name', 'Advance')
                ->where('price_category', 'Regular')
                ->first();
            $discountedPrice = ServicsPricing::where('service_name', 'Data Analysis')
                ->where('package_name', 'Advance')
                ->where('price_category', 'Discounted')
                ->first();
        } elseif ($package == 'Premium') {
            $regularPrice = ServicsPricing::where('service_name', 'Data Analysis')
                ->where('package_name', 'Premium')
                ->where('price_category', 'Regular')
                ->first();
            $discountedPrice = ServicsPricing::where('service_name', 'Data Analysis')
                ->where('package_name', 'Premium')
                ->where('price_category', 'Discounted')
                ->first();
        }
        return view(
            'advanced_data_analysis_service',
            compact(
                'discountedPrice',
                'regularPrice',
                'package',
                'FooterContentOnes',
                'Services',
                'Journals',
                'News',
                'Profiles',
                'SocialLinks'
            )
        );
    }

    public function dataAnalysisServiceFormPrices(Request $request)
    {
        $data = ServicsPricing::where('service_name', $request->service_name)
            ->where('package_name', $request->package_name)
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
            ->where('package_name', $request->package_name)
            ->where('price_category', $request->price_category)
            ->first();
        // return $data;
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

    public function submitQuotationRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'question' => 'required',
            'file' => 'required',
            'agree_check' => 'required|in:yes',
            'institute_name' => 'required',
            'study_category' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $quotationRequest = QuotationRequest::create([
                'service_name' => $request->service_name,
                'words' => $request->words,
                'price_category' => $request->price_category,
                'service_package' => $request->package_name,
                'total_price' => $request->total_price,
                'base_price' => $request->service_price,
                'language_type' => $request->language,
                'additional_instructions' => $request->additional_instruction,
                'latest_news' => $request->news_check,
                'privacy_terms' => $request->agree_check,
                'status' => '0',
                'file_explanation_one' => $request->file_explanation_one,
                'file_explanation_two' => $request->file_explanation_two,
            ]);
            QuotationPersonalInfo::create([
                'quotation_request_id' => $quotationRequest->id,
                'salutaion' => $request->salutaion,
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
            // if ($request->hasFile('file')) {
            //     foreach ($request->file('file') as $file) {
            //         $filename = time() . '_' . $file->getClientOriginalName();
            //         $file->move(public_path('/assets/files'), $filename);
            //         $quotationFilePath = 'public/assets/files/' . $filename;
            //         QuotationFile::create([
            //             'quotation_request_id' => $quotationRequest->id,
            //             'file' => $quotationFilePath,
            //         ]);
            //     }
            // }
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
            Mail::to($request->email)->send(new SubmitQuotaionEmail);
            $admin = 'info@menamedicalresearch.com';
            $data['name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['email'] = $request->email;
            Mail::to($admin)->send(new QuotationInfoAdmin($data));
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
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
