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
use App\Models\SEO;

class HomeController extends Controller
{
    public function index() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $seo_data = SEO::where('section','Index')->first();
        return view('index',compact('seo_data','HomeSectionThrees','HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }
}
