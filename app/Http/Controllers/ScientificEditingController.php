<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\HomeSectionOne;
use App\Models\HomeSectionSix;
use App\Models\HomeSectionTwo;
use App\Models\HomeSectionFive;
use App\Models\HomeSectionFour;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\SEO;

class ScientificEditingController extends Controller
{
    public function scientificEditing() {
        $HomeSectionOnes = HomeSectionOne::orderBy('id', 'DESC')->get();
        $HomeSections = HomeSectionTwo::orderBy('id', 'ASC')->get();
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionFours = HomeSectionFour::orderBy('id', 'ASC')->get();
        $HomeSectionFives = HomeSectionFive::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $seo_data = SEO::where('section','Home')->first();
        return view('scientific_editing', compact('seo_data','HomeSectionOnes', 'HomeSections', 'HomeSectionThrees', 'HomeSectionFours', 'HomeSectionFives', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }



}
