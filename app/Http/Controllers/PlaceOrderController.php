<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\PlaceOrderOne;
use App\Models\PlaceOrderTwo;
use App\Models\PlaceOrderFour;
use App\Models\PlaceOrderThree;
use App\Models\FooterContentOne;

class PlaceOrderController extends Controller
{
    public function placeOrder() {

        $PlaceOrderOnes = PlaceOrderOne::orderBy('id', 'ASC')->get();
        $PlaceOrderTwos = PlaceOrderTwo::orderBy('id', 'ASC')->get();
        $PlaceOrderThrees = PlaceOrderThree::orderBy('id', 'ASC')->get();
        $PlaceOrderFours = PlaceOrderFour::orderBy('id', 'ASC')->get();

        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        return view('place_order',compact('PlaceOrderOnes','PlaceOrderTwos','PlaceOrderThrees','PlaceOrderFours','SocialLinks','FooterContentOnes','Services','Journals','News','Profiles'));
    }
}
