<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\Offers\AllController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', fn() => view('welcome'));

Route::group(['prefix' => LaravelLocalization::setLocale(),], function(){
    Route::group(['prefix' => 'offers'], function () {
        Route::get('create','CrudController@create')->name('offers.create');
        Route::post('store','CrudController@store') -> name('offers.store');
        Route::get('edit/{offer_id}','Offers\UpdateController@editOffer');
        Route::post('update/{offer_id}','Offers\UpdateController@updateOffer') -> name('offers.update');
        Route::get('delete/{offer_id}', 'Offers\DeleteController@delete')->name('offers.delete');
        Route::get('all','Offers\AllController@getAllOffers');
    });
});

############### ajax ###########
Route::group(['prefix' => 'ajax-offers'],function (){
    Route::get('create', 'OfferController@create');
    Route::post('store', 'OfferController@store')->name('ajax.offers.store');
    Route::get('all', 'AjaxOffers\AllController@all');
    Route::post('delete', 'AjaxOffers\DeleteController@delete')->name('ajax.offers.delete');
    Route::get('edit/{offer_id}', 'AjaxOffers\UpdateController@edit')->name('ajax.offers.edit');
    Route::post('update', 'AjaxOffers\UpdateController@update')->name('ajax.offers.update');
});


###############Auth############
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard',function () {
    return 'Not Adult';
})->name('check');


Route::group(['middleware' => 'CheckAge'],function(){
    Route::get('adults','Auth\CustomAuthController@adults')->name('adults');
});
Route::get('site','Auth\CustomAuthController@site')->middleware('auth:web')->name('site');
Route::get('admin','Auth\CustomAuthController@admin')->middleware('auth:admin')->name('admin');

Route::get('admin/login', 'Auth\CustomAuthController@adminLogin')-> name('admin.login');
Route::post('admin/login', 'Auth\CustomAuthController@checkAdminLogin')-> name('save.admin.login');



