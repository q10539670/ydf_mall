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
Route::group(['middleware'=>'cors'], function () {
    Route::post('/images', 'UploadImagesController@uploadImages')->name('images');         //上传图片

});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware'=>'cors'], function () {
    Route::resource('brand', 'BrandController')->names('brand');                       //品牌
    Route::resource('category', 'GoodsCategoryController')->names('category');         //分类

});
