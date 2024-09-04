<?php

namespace App\Http\Controllers\AjaxOffers;

use App\Http\Controllers\Controller;
use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function edit(Request $request)
    {
        $offer = Offer::find($request->offer_id);
        if (!$offer)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' =>  $request -> id
            ]);
        $offer = Offer::select('id', 'name', 'photo', 'price', 'details')->find($request->offer_id);
        return view('ajaxoffers.edit', compact('offer'));
    }

    public  function update(Request $request){
        $offer = Offer::find($request -> offer_id);
        if (!$offer)
            return response()->json([
                'status' => false,
                'msg' => 'هذ العرض غير موجود',
            ]);

        //update data
        $offer->update($request->all());

        return response()->json([
            'status' => true,
            'msg' => 'تم  التحديث بنجاح',
        ]);
    }
}
