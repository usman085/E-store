<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/random-product','HomeController@RandamData');

Route::get('/search-product/{searchQuery}','HomeController@SearchQuery');

Route::post('/add-Carton-Product','AddProductController@addCartonProduct');

Route::post('/add-Bag-Product','AddProductController@addBagProduct');

Route::get('/all-carton','GetProducts@getAllProductCarton');

Route::get('/all-bag','GetProducts@getAllProductBag');

Route::get('/del-bag/{id}','DelProduct@delBagProduct');

Route::get('/del-carton/{id}','DelProduct@delCartonProduct');

Route::post('update-carton','UpdateProduct@updateCarton');

Route::post('update-bag','UpdateProduct@updateBag');