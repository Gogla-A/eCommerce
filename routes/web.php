<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\AllController;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', fn() => view('welcome'));

Route::group(['prefix' => LaravelLocalization::setLocale(),], function(){
    Route::group(['prefix' => 'offers'], function () {
        Route::get('create','CrudController@create')->name('offers.create');
        Route::post('store','CrudController@store') -> name('offers.store');
        Route::get('edit/{offer_id}','UpdateController@editOffer');
        Route::post('update/{offer_id}','UpdateController@updateOffer') -> name('offers.update');
        Route::get('delete/{offer_id}', 'DeleteController@delete')->name('offers.delete');
        Route::get('all','AllController@getAllOffers');
    });
});

############### ajax ###########
Route::group(['prefix' => 'ajax-offers'],function (){
    Route::get('create', 'OfferController@create');
    Route::post('store', 'OfferController@store')->name('ajax.offers.store');
});
