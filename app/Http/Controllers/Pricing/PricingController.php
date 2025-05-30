<?php

namespace App\Http\Controllers\Pricing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewPricing;

class PricingController extends Controller
{
    public function index(){
        $pricing = NewPricing::latest()->get();
        return view('admin.newServicePricing.index',compact('pricing'));
    }

    public function create(){
        return view('admin.newServicePricing.create');
    }

    public function store(Request $request){
        // return $request;
        $count = count($request->range);
        for ($i = 0; $i < $count; $i++) {
            NewPricing::create([
                'range'         => $request->range[$i],
                'limit'         => $request->limit[$i],
                'price'         => $request->price[$i],
                'service_name'  => $request->service_name,
                'package_name'  => is_array($request->package_name) ? ($request->package_name[$i] ?? null) : $request->package_name,
                'package_check' => is_array($request->package_check) ? ($request->package_check[$i] ?? null) : $request->package_check,
                'delivery_time' => $request->delivery_days[$i],
            ]);
        }
        return redirect()->route('newServicePrice.index')->with(['message'=>'Service Price Created Successfuly']);
    }

    public function edit($id){
        $pricing = NewPricing::find($id);
        return view('admin.newServicePricing.edit',compact('pricing'));
    }

    public function update(Request $request, $id){
        $pricing = NewPricing::find($id);
        $pricing->update([
            'range'=>$request->range,
            'limit'=>$request->limit,
            'price'=>$request->price,
            'service_name'=>$request->service_name,
            'package_name'=>$request->package_name,
            'package_check'=>$request->package_check,
            'delivery_time'=>$request->delivery_days,
        ]);
        return redirect()->route('newServicePrice.index')->with(['message'=>'Service Price Updated Successfuly']);
    }

    public function delete($id){
        NewPricing::destroy($id);
        return redirect()->route('newServicePrice.index')->with(['message'=>'Service Price Deleted Successfuly']);
    }
}
