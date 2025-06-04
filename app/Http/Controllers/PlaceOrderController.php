<?php

namespace App\Http\Controllers;

use App\Models\AdditionalPrices;
use App\Models\News;
use App\Models\Journal;
use App\Models\Profile;
use App\Models\Service;
use App\Models\NewPricing;
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


    public function getPlceOrderForm(Request $request){
        // return $request;
        $newPrices = NewPricing::query()
        ->where('service_name', $request->service)
        ->when(!empty($request->package), function ($query) use ($request) {
            return $query->where('package_name', $request->package);
        })
        ->orderBy('position', 'asc')->get();
        $additionalsServices = AdditionalPrices::where('services',$request->service)->get();
        // return $additionalsServices;
        $service =  $request->service;
        $form_head =  $request->form_head;
        $package =  $request->package;
        $title = $request->title;
        $SocialLinks = SocialLink::orderBy('id', 'ASC')->get();
        $FooterContentOnes = FooterContentOne::orderBy('id', 'ASC')->get();
        $Services = Service::orderBy('id', 'ASC')->get();
        $Journals = Journal::orderBy('id', 'ASC')->get();
        $News = News::orderBy('id', 'ASC')->get();
        $Profiles = Profile::orderBy('id', 'ASC')->get();
        return view('place_order_form', compact(
            'newPrices',
            'SocialLinks',
            'FooterContentOnes',
            'Services',
            'Journals',
            'News',
            'Profiles',
            'title',
            'service',
            'package',
            'form_head',
            'additionalsServices'
        ));

    }
}
