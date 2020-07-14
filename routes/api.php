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
Route::group(['middleware' => 'cors'], function () {
    Route::post('/images', 'UploadImagesController@uploadImages')->name('images');         //上传图片

});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'cors'], function () {
    Route::resource('brand', 'BrandController')->names('brand');                       //品牌
    Route::resource('category', 'GoodsCategoryController')->names('category');         //分类
    Route::resource('type', 'GoodsTypeController')->names('type');                     //类型
    Route::resource('spec', 'SpecController')->names('spec');                          //属性
    Route::resource('goods', 'GoodsController')->names('goods');                       //商品


    Route::get('user/index', 'UserController@index')->name('user.index'); //用户列表
    Route::patch('user/status/{user}', 'UserController@status')->name('user.status'); //更改用户状态
    Route::patch('category/status/{category}', 'GoodsCategoryController@status')->name('category.status'); //更改分类状态
});
