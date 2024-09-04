<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function delete($offer_id)
    {
        $offer = Offer::find($offer_id);
        if (!$offer)
            return redirect()->back()->with(['error' => __('messages.offer not exist')]);
        $offer->delete();
        return redirect()
            ->back()
            ->with(['success' => __('messages.offer deleted successfully')]);
    }
}
