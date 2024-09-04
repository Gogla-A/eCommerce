<?php

namespace App\Http\Controllers\AjaxOffers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function all()
    {
        $offers = Offer::select('id', 'photo', 'name', 'price', 'details')->limit(10)->get();
        return view('ajaxoffers.all', compact('offers'));
    }
}
