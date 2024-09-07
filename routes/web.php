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

        Route::get('all-inactive-offers','Offers\AllController@getAllInactiveOffers');
    });
});

################################### Start Ajax ###################################

Route::group(['prefix' => 'ajax-offers'],function (){
    Route::get('create', 'OfferController@create');
    Route::post('store', 'OfferController@store')->name('ajax.offers.store');
    Route::get('all', 'AjaxOffers\AllController@all');
    Route::post('delete', 'AjaxOffers\DeleteController@delete')->name('ajax.offers.delete');
    Route::get('edit/{offer_id}', 'AjaxOffers\UpdateController@edit')->name('ajax.offers.edit');
    Route::post('update', 'AjaxOffers\UpdateController@update')->name('ajax.offers.update');
});

#################################### End Ajax ###################################
                                //////////////////
#################################### Start Auth #################################

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

#################################### End Auth #################################
                               ////////////////////
#################################### Start Relation Routes #################################

Route::get('has-one','Relations\RelationsController@hasOneRelation');

Route::get('has-many','Relations\RelationsController@hasManyRelation');

Route::get('hospitals','Relations\RelationsController@hospitals');

Route::get('doctors/{hospital_id}','Relations\RelationsController@doctors')->name('hospital.doctors');

#################################### End Relation Routes #################################
                              ///////////////////////////////
#################################### Start Many To Many Relation Routes #################################

Route::get('doctors-services','Relations\RelationsController@doctorServices');
Route::get('service-doctors','Relations\RelationsController@serviceDoctors');

Route::get('doctors/services/{doctor_id}','Relations\RelationsController@getDoctorServicesById')->name('doctors.services');
Route::post('saveServices-to-doctor','Relations\RelationsController@saveServicesToDoctors')-> name('save.doctors.services');


#################################### End Many To Many Relation Routes #################################
                               //////////////////////////////////////////////
#################################### Start Has One Through Relation Routes #################################

Route::get('has-one-through','Relations\RelationsController@getPatientDoctor');
Route::get('has-many-through','Relations\RelationsController@getCountryDoctor');

#################################### Start Has One Through Relation Routes #################################
                              ///////////////////////////////////////////////////
################################### Start Accessors And Mutators ###########################################

Route::get('accessors', 'Relations\RelationsController@getDoctors');

################################### End Accessors And Mutators ###########################################
