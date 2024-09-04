<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function editOffer($offer_id)
    {
        $offer = Offer::find($offer_id);
        if (!$offer)
            return redirect()->back();
        $offer = Offer::select('id', 'name', 'photo', 'price', 'details')->find($offer_id);
        return view('offers.edit', compact('offer'));
    }

    public function updateOffer(offerRequest $request, $offer_id){
        $offer = Offer::find($offer_id);
        if(!$offer)
            return redirect()->back();
        $offer->update($request->all());
        return redirect()->back()->with(['message' => __('messages.data updated successfully')]);
    }
}
