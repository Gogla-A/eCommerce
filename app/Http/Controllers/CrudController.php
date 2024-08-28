<?php

namespace App\Http\Controllers;

use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use App\Traits\OfferTrait;


class CrudController extends Controller
{
    use OfferTrait;
    public function __construct()
    {
        //
    }
    public function create()
    {
        return view('offers.create');
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
//        $data = $request->except('_token');
//        Offer::create($data);
        return redirect()->route('offers.create')->with(['message' => __('messages.data stored successfully')]);
    }
}
