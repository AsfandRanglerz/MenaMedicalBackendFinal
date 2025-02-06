<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\SocialLink;

use App\Models\QuotationFile;
use App\Models\HomeSectionSix;
use App\Models\ServicsPricing;
use App\Models\FooterContentOne;
use App\Models\HomeSectionThree;
use App\Models\LanguageEditingFour;
use App\Models\AssignmentEditingServiceOne;

use App\Models\QuotationRequest;

class JournalsController extends Controller
{
    public function journalModule() {
        $HomeSectionThrees = HomeSectionThree::orderBy('id', 'ASC')->get();
        $HomeSectionSixs = HomeSectionSix::orderBy('id', 'ASC')->get();

        $LanguageEditingFours = LanguageEditingFour::orderBy('id', 'ASC')->get();

        $AssignmentEditingServiceOnes = AssignmentEditingServiceOne::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        return view('journals',compact('HomeSectionThrees', 'LanguageEditingFours', 'AssignmentEditingServiceOnes', 'HomeSectionSixs','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }
}
