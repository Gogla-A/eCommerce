<?php

namespace App\Http\Controllers;

use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;


class CrudController extends Controller
{
    public function __construct() {

    }

    public function create() {
        return view('offers.create');
    }

    public function store(offerRequest $request) {
        $data = $request->except('_token');
        Offer::create($data);

        return redirect()->route('offers.create')->with(['message' => 'data stored successfully']);
   }
public function getAllOffers()
{
    $offers = Offer::select('id','name','price','details')->get();
    return view('offers.all',compact('offers'));
}
}
