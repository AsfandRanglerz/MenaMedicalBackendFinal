<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\HomeSectionSix;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\LanguageEditingFour;
use App\Models\DataAnalysisServiceOne;
use App\Models\DataAnalysisServiceTwo;
use App\Models\DataAnalysisServiceThree;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;

class PrivacyPolicyTermConditionController extends Controller
{
    public function privacyPage(){
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
        return view('pricacyPolicy.privacy_policy',compact('data','SocialLinks','Profiles','News','FooterContentOnes','Services','Journals'));
    }
    public function termsPage(){
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
        return view('pricacyPolicy.terms_and_conditions',compact('data','SocialLinks','Profiles','News','FooterContentOnes','Services','Journals'));
    }
}
