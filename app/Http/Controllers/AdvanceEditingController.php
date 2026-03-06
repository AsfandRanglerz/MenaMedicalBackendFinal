<?php

namespace App\Http\Controllers;

use App\Models\FooterContentOne;
use App\Models\Journal;
use App\Models\News;
use App\Models\Profile;
use App\Models\SEO;
use App\Models\Service;
use App\Models\SocialLink;
use App\Models\Training;
use Illuminate\Http\Request;

class AdvanceEditingController extends Controller
{
    public function advanceEditingService() {

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $trainings = Training::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        $seo_data = SEO::where('section','Index')->first();

        return view('advanced_editing_service',compact('trainings','seo_data','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }
}
