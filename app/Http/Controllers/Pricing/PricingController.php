<?php

namespace App\Http\Controllers\Pricing;

use App\Models\NavBar;
use App\Models\NewPricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{

    public function index(Request $request)
    {
        $navBars = [
            'Language Editing - Basic',
            'Language Editing - Advance',
            'Language Editing - Premium',
            'Scientific Editing',
            'Accidental Plagirisam',
            'Manuscript Formatting Service',
            'Power Point Presentations',
            'Poster Creation Service',
            'Assignment Editing Service',
            'Thesis Editing Service - Advance',
            'Thesis Editing Service - Premium',
            'Data Analysis - Advance',
            'Data Analysis - Premium'
        ];

        $service = $request->get('service', 'Language Editing - Basic');

        // Split service and package if applicable
        $serviceParts = explode(' - ', $service);
        $serviceName = $serviceParts[0];
        $packageName = $serviceParts[1] ?? null;
        if($serviceName === 'Poster Creation Service'){
            $serviceName = 'Power Point Poster';
        }
        // return   $serviceName;
        $query = NewPricing::where('service_name', $serviceName);
        if ($packageName) {
            $query->where('package_name', $packageName);
        }
        $pricing = $query->orderBy('position', 'asc')->get();
        return view('admin.newServicePricing.index', compact('pricing', 'navBars', 'service'));
    }


        public function sort(Request $request)
        {
            $service = $request->input('service');

            // Split the service string: "ServiceName - PackageName"
            $serviceParts = explode(' - ', $service);
            $serviceName = $serviceParts[0];
            $packageName = $serviceParts[1] ?? null;

            foreach ($request->order as $item) {
                $query = NewPricing::where('id', $item['id'])
                    ->where('service_name', $serviceName);

                if ($packageName) {
                    $query->where('package_name', $packageName);
                } else {
                    $query->whereNull('package_name');
                }

                $query->update(['position' => $item['position']]);
            }

            return response()->json(['success' => true]);
        }





    public function create()
    {
        return view('admin.newServicePricing.create');
    }

   public function store(Request $request)
{
    $count = count($request->range);
    for ($i = 0; $i < $count; $i++) {
        $serviceName = $request->service_name;
        $packageName = is_array($request->package_name) ? ($request->package_name[$i] ?? null) : $request->package_name;

        // Get the current max position for this service + package
        $maxPosition = NewPricing::where('service_name', $serviceName)
            ->when($packageName, function ($query, $packageName) {
                return $query->where('package_name', $packageName);
            })
            ->max('position');

        $nextPosition = $maxPosition ? $maxPosition + 1 : 1;

        NewPricing::create([
            'range'         => $request->range[$i],
            'limit'         => $request->limit[$i],
            'price'         => $request->price[$i],
            'service_name'  => $serviceName,
            'package_name'  => $packageName,
            'package_check' => is_array($request->package_check) ? ($request->package_check[$i] ?? null) : $request->package_check,
            'delivery_time' => $request->delivery_days[$i],
            'position'      => $nextPosition,
        ]);
    }

    return redirect()->route('newServicePrice.index')->with(['message' => 'Service Price Created Successfully']);
}


    public function edit($id)
    {
        $pricing = NewPricing::find($id);
        return view('admin.newServicePricing.edit', compact('pricing'));
    }

    public function update(Request $request, $id)
    {
        $pricing = NewPricing::find($id);
        $pricing->update([
            'range' => $request->range,
            'limit' => $request->limit,
            'price' => $request->price,
            'service_name' => $request->service_name,
            'package_name' => $request->package_name,
            'package_check' => $request->package_check,
            'delivery_time' => $request->delivery_days,
        ]);
        return redirect()->route('newServicePrice.index')->with(['message' => 'Service Price Updated Successfuly']);
    }

    public function delete($id)
    {
        NewPricing::destroy($id);
        return redirect()->route('newServicePrice.index')->with(['message' => 'Service Price Deleted Successfuly']);
    }
}
