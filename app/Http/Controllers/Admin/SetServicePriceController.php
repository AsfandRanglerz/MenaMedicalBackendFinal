<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ServicsPricing;
use App\Http\Controllers\Controller;

class SetServicePriceController extends Controller
{
    public function index(){
        $pricing = ServicsPricing::latest()->get();
        return view('admin.servicesPricing.index',compact('pricing'));
    }

    public function create(){
        return view('admin.servicesPricing.create');
    }

    public function store(Request $request){
        // return $request->package_name;
        $pricing = ServicsPricing::create([
            'service_name'=>$request->service_name,
            'package_check'=>$request->package_check,
            'package_name'=>$request->package_name,
            'price_category'=>$request->price_category,
            'words_limit'=>$request->words_limit,
            'less_equal_price'=>$request->less_equal_price,
            'above_equal_price'=>$request->above_equal_price,
            'delivery_days'=>$request->delivery_days,
        ]);
        return redirect()->route('servicePrice.index')->with(['message'=>'Service Price Created Successfuly']);
    }

    public function edit($id){
        $pricing = ServicsPricing::find($id);
        return view('admin.servicesPricing.edit',compact('pricing'));
    }

    public function update(Request $request, $id){
        $pricing = ServicsPricing::find($id);
        $pricing->update([
            'service_name'=>$request->service_name,
            'package_check'=>$request->package_check,
            'package_name'=>$request->package_name,
            'price_category'=>$request->price_category,
            'words_limit'=>$request->words_limit,
            'less_equal_price'=>$request->less_equal_price,
            'above_equal_price'=>$request->above_equal_price,
            'delivery_days'=>$request->delivery_days,
        ]);
        return redirect()->route('servicePrice.index')->with(['message'=>'Service Price Updated Successfuly']);
    }

    public function delete($id){
        ServicsPricing::destroy($id);
        return redirect()->route('servicePrice.index')->with(['message'=>'Service Price Deleted Successfuly']);
    }
}
