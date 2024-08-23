<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', fn() => view('welcome'));

Route::group(['prefix' => LaravelLocalization::setLocale(),], function(){
    Route::group(['prefix' => 'offers'], function () {
        Route::get('create','CrudController@create')->name('offers.create');
        Route::post('store','CrudController@store') -> name('offers.store');
        Route::get('all','CrudController@getAllOffers');
    });
});
