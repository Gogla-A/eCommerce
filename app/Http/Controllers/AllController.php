<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function getAllOffers()
    {
        $offers = Offer::select('id', 'photo', 'name', 'price', 'details')->get();
        return view('offers.all', compact('offers'));
    }
}
