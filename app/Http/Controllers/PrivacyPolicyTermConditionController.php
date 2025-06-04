<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\SocialLink;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use App\Models\HomeSectionSix;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\LanguageEditingFour;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\DataAnalysisServiceOne;
use App\Models\DataAnalysisServiceTwo;
use App\Models\DataAnalysisServiceThree;


class PrivacyPolicyTermConditionController extends Controller
{
    public function privacyPage()
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
        $data = PrivacyPolicy::first();
        return view('pricacyPolicy.privacy_policy', compact('data', 'SocialLinks', 'Profiles', 'News', 'FooterContentOnes', 'Services', 'Journals'));
    }
    public function termsPage()
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
        $data = TermCondition::first();
        return view('pricacyPolicy.terms_and_conditions', compact('data', 'SocialLinks', 'Profiles', 'News', 'FooterContentOnes', 'Services', 'Journals'));
    }
    public function contctPage()
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
        $data = TermCondition::first();
        return view('pricacyPolicy.contct-us', compact('SocialLinks', 'Profiles', 'News', 'FooterContentOnes', 'Services', 'Journals'));
    }

    public function contactPost(Request $request)
    {
        // reCAPTCHA validation
        $recaptcha = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (! $recaptcha->json('success')) {
            return response()->json([
                'status' => 'error',
                'type' => 'recaptcha',
                'message' => 'reCAPTCHA verification failed.',
            ], 422); // STOP here
        }

        // Honeypot check
        if ($request->filled('bot')) {
            return response()->json([
                'status' => 'error',
                'type' => 'honeypot',
                'message' => 'Bot detected.',
            ], 422); // STOP here
        }


        // Send mail (you can keep this after validations)
        $to = 'usman0725.ranglerz@gmail.com';
        $data = [
            'name' => $request->contact_name,
            'email' => $request->contact_email,
            'message' => $request->contact_message,
        ];
        Mail::to($to)->send(new ContactUsMail($data));

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!',
        ]);
    }
}
