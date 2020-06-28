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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware'=>'cors'], function () {
    Route::post('/brand', 'BrandController@store')->name('brand.store');         //创建品牌
    Route::get('/brand', 'BrandController@index')->name('brand.index');          //查询所有品牌
    Route::get('/brand/{id}', 'BrandController@show')->name('brand.show');       //创建单一品牌
    Route::post('/brand/{id}', 'BrandController@update')->name('brand.update');       //创建单一品牌


});
