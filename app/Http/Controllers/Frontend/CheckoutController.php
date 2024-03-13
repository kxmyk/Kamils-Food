<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DeliveryArea;

class CheckoutController extends Controller
{
    public function index()
    {
        $addresses = Address::where(['user_id' => auth()->user()->id])->get();
        $deliveryAreas = DeliveryArea::where('status', 1)->get();

        return view('frontend.pages.checkout', compact('addresses', 'deliveryAreas'));

    }

}
