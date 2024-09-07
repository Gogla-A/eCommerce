<?php

namespace App\Http\Controllers\Offers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Scopes\OfferScope;
use Illuminate\Http\Request;

define('PAGINATION_COUNT',2);
class AllController extends Controller
{
    public function getAllOffers()
    {
//        $offers = Offer::select('id', 'photo', 'name', 'price', 'details')->get();
//        return view('offers.all', compact('offers'));

        $offers = Offer::select('id',
            'photo',
            'name',
            'price',
            'details'
        )->paginate(PAGINATION_COUNT);
        return view('offers.paginations', compact('offers'));
    }

    public function getAllInactiveOffers(){
                  ############## Global Scope #############
       // return $inactiveOffers = Offer::get();

              ################# How To Remove Global Scope ###############
        return $inactiveOffers = Offer::withoutGlobalScope(OfferScope::class)->get();
    }
}
