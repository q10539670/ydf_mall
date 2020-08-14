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
    Route::post('/images', 'CommonController@uploadImages')->name('images');                                   //上传图片
    Route::post('/video', 'CommonController@uploadVideo')->name('video');                                      //上传视频
    Route::get('/areas/{type?}', 'CommonController@getAreas')->name('areas');                                  //获取全国地区信息
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::resource('brand', 'BrandController')->names('brand');                                      //品牌
        Route::resource('category', 'GoodsCategoryController')->names('category');                        //分类
        Route::resource('type', 'GoodsTypeController')->names('type');                                    //类型
        Route::resource('spec', 'SpecController')->names('spec');                                         //属性
        Route::resource('goods', 'GoodsController')->names('goods');                                      //商品
        Route::resource('coupon', 'CouponController')->names('coupon');                                   //优惠券
        Route::resource('promotion', 'PromotionController')->names('promotion');                          //促销
        Route::resource('logi', 'LogisticsController')->names('logi');                                    //物流公司
        Route::resource('ship', 'ShipController')->names('ship');                                         //配送方式
        Route::resource('order', 'OrderController')->names('order');                                      //订单
        Route::resource('carousel', 'CarouselController')->names('carousel');                             //轮播图
        Route::resource('keyword', 'SearchHotKeywordsController')->names('keyword');                      //热搜

        Route::get('delivery','DeliveryController@index')->name('delivery.index');                             //发货单列表
        Route::get('delivery/{delivery}','DeliveryController@show')->name('delivery.show');                    //查询发货单(单一)
        Route::get('user', 'UserController@index')->name('user.index');                                        //用户列表
        Route::patch('user/status/{user}', 'UserController@status')->name('user.status');                      //更改用户状态
        Route::post('order/ship/{order}', 'OrderController@ship')->name('order.ship');                         //订单发货
        Route::patch('category/status/{category}', 'GoodsCategoryController@status')->name('category.status'); //更改分类状态
        Route::get('goods/attr/{good}','GoodsController@setGoodsAttribute')->name('goods.attr');               //设置商品属性
        Route::get('distribution','DistributionController@index')->name('distribution.index');                 //分销详情列表
        Route::get('cashout','CashoutController@index')->name('cashout.index');                                //提现列表
        Route::get('cashout/refuse/{cashout}','CashoutController@reduse')->name('cashout.refuse');             //提现拒绝
        Route::get('cashout/{cashout}','CashoutController@cashout')->name('cashout.cashout');                  //提现
        Route::get('amount','AmountChangeController@index')->name('amount.index');                             //资金变动
        Route::get('sale_item','SaleItemController@index')->name('sale_item.index');                           //分销结算
        Route::get('saler_info','SalerInfoController@index')->name('saler_info.index');                        //用户分销列表
        Route::get('saler_info/{saler_info}','SalerInfoController@show')->name('saler_info.show');             //用户分销(单一)
    });
});

