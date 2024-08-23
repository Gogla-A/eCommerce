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

    public function store(Request $request) {
        $rules = [
            'name' => 'required|max:255|unique:offers,name',
            'detail' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules,[
                'name.required' => 'offer name is required.',
                'details.required' => 'details is required.',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        Offer::create([
           'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->detail,
        ]);
        return redirect()->to('offers.create')->withErrors($validator)->withInputs($request->all());
   }
public function getAllOffers()
{
    $offers = Offer::select('id','name','price','details')->get();
    return view('offers.all',compact('offers'));
}
}
