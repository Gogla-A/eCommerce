<?php

namespace App\Http\Controllers;

use App\Http\Requests\offerRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use OfferTrait;
    public function create()
    {
        return view('ajaxoffers.create');       //
    }
    public function store(offerRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');
        Offer::create([
            'photo' => $file_name,
            'name' => $request->name,
            'price' =>  $request->price,
            'details' => $request->details,
        ]);
        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',
            ]);

        else
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
    }
}
