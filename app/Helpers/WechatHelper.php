<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Redis;

class WechatHelper
{

    /*
    //自定义 获取和设置 access_token 方式
    $config = [
            'app_id' => 'wx948e9215c4c1d501',
            'secret' => 'ecb9a9fb8d64d13e3908a56230f7748c',
            'token' => 'TestToken',
            'response_type' => 'array',
            'getTokenFunc'=>WechatHelper::getTokenFunc(),
            'setTokenFunc'=>WechatHelper::setTokenFunc(),
        ];
    $app = \EasyWeChat\Factoryy::officialAccount($config);
     * */
    public static function getTokenFunc()
    {
        return function (): array {
            $key = config('h5account.' . env('APP_ENV'))['accessTokenCacheKey'];
            $redis = Redis::connection('token');
            $redis->select('11');
            return json_decode($redis->get($key), true);
        };
    }

    public static function setTokenFunc(string $token, int $lifetime = 7200)
    {
        return 0;
    }

    public static function getJsapiTicket()
    {
        return function (): array {
            $key = config('h5account.' . env('APP_ENV'))['jsapiTicketCacheKey'];
            $redis = Redis::connection('token');
            $redis->select('11');
            return json_decode($redis->get($key), true);
        };
    }

}