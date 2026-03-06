<?php

namespace App\Http\Controllers;

use App\Models\FooterContentOne;
use App\Models\HomeSectionSix;
use App\Models\HomeSectionThree;
use App\Models\Journal;
use App\Models\News;
use App\Models\Profile;
use App\Models\SEO;
use App\Models\Service;
use App\Models\SocialLink;
use App\Models\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $trainings = Training::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $seo_data = SEO::where('section','Index')->first();
        return view('index',compact('trainings','seo_data','HomeSectionThrees','HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }

    public function tranings() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $trainings = Training::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $seo_data = SEO::where('section','Tranings')->first();
        return view('training',compact('trainings','seo_data','HomeSectionThrees','HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }

}
