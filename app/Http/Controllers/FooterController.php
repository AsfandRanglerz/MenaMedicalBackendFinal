<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\FooterContentOne;

class FooterController extends Controller
{
    public function index(){
    $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
    $Services = Service::orderBy('id', 'ASC')->get();
    $Services = Service::orderBy('id', 'ASC')->get();
    $Journals = Journal::orderBy('id', 'ASC')->get();
    $News = News::orderBy('id', 'ASC')->get();
    $Profiles = Profile::orderBy('id', 'ASC')->get();

    $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
    
    return view('footer', compact('SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }
}