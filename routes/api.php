<?php

use Illuminate\Http\Request;

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

Route::post('/customer/create', 'CustomerController@store');
Route::post('/survey/socials/create', 'SurveyController@socials');
Route::post('/survey/ads/create', 'SurveyController@ads');
Route::post('/survey/products/create', 'SurveyController@products');
Route::get('/branches', 'BranchController@fetch_branches');

Route::post('/create', 'SurveyController@store');
