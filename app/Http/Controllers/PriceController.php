<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicsPricing;


class PriceController extends Controller
{
    public function showPrice(Request $request)
    {
        $data = ServicsPricing::where('service_name', $request->service_name)->get();
        $words = $request->words;

        $data->each(function ($item) use ($words) {
            // Determine the price per word based on the price category
            $pricePerWord = $item->price_category == 'Regular' ? $item->above_equal_price : $item->less_equal_price;

            // Calculate the price based on the words limit
            if ($words <= $item->words_limit) {
                $calculatedPrice = $item->less_equal_price;
            } else {
                $calculatedPrice = $words * $item->above_equal_price;
            }

            // Format the calculated price to two decimal places
            // $item->calculated_price = number_format($calculatedPrice, 2, '.', '');
            $item->calculated_price = round($calculatedPrice);

        });

        return response()->json($data);
    }


}
