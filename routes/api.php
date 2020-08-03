<?php

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
    Route::post('/images', 'CommonController@uploadImages')->name('images');         //上传图片
    Route::get('/areas/{type?}', 'CommonController@getAreas')->name('areas');                //获取全国地区信息
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::resource('brand', 'BrandController')->names('brand');                       //品牌
        Route::resource('category', 'GoodsCategoryController')->names('category');         //分类
        Route::resource('type', 'GoodsTypeController')->names('type');                     //类型
        Route::resource('spec', 'SpecController')->names('spec');                          //属性
        Route::resource('goods', 'GoodsController')->names('goods');                       //商品
        Route::resource('coupon', 'CouponController')->names('coupon');                    //优惠券
        Route::resource('promotion', 'PromotionController')->names('promotion');           //促销
        Route::resource('logi', 'LogisticsController')->names('logi');                     //物流公司
        Route::resource('ship', 'ShipController')->names('ship');                          //配送方式
        Route::resource('order', 'OrderController')->names('order');                       //订单

        Route::get('delivery','DeliveryController@index')->name('delivery');
        Route::get('delivery/{delivery}','DeliveryController@show')->name('delivery.show');
        Route::get('user', 'UserController@index')->name('user'); //用户列表
        Route::post('order/ship/{order}', 'OrderController@ship')->name('order.ship'); //用户列表
        Route::patch('user/status/{user}', 'UserController@status')->name('user.status'); //更改用户状态
        Route::patch('category/status/{category}', 'GoodsCategoryController@status')->name('category.status'); //更改分类状态
        Route::get('goods/attr/{good}','GoodsController@setGoodsAttribute')->name('goods.attr');  //设置商品属性
    });
});

