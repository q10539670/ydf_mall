<?php

namespace App\Helpers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class Helper
{
    /*
     * 测试
     * */
    public static function test()
    {
        return 55556665;
    }

    public static function getH5AccountConf()
    {
        $h5AccountConf = config('h5account');
        $conf = $h5AccountConf[$h5AccountConf['default']];
        return $conf;
    }

    public static function getH5AccessToken()
    {
        $conf = self::getH5AccountConf();
        $redis = app('redis');
        $redis->select(11);
        return json_decode($redis->get($conf['accessTokenCacheKey']), true)['access_token'];
    }

    public static function getH5JsapiTicket()
    {
        $conf = self::getH5AccountConf();
        $redis = app('redis');
        $redis->select(11);
        return json_decode($redis->get($conf['jsapiTicketCacheKey']), true)['jsapi_ticket'];
    }

    /*
     * 缓存数据
     * */
    public static function redisCacheStore($cacheKey, \Closure $getDataFunc, $expireSecond = 5)
    {
        $redis = app('redis');
        $redis->select(12);
        $cacheKeyExpireAt = $cacheKey.'ExpireAt';
        $nowTime = now()->timestamp;
        /*不存在或者过期*/
        if ((!$redis->exists($cacheKeyExpireAt)) || $redis->get($cacheKeyExpireAt) < $nowTime) {
            $cacheData = $getDataFunc();
            $redis->set($cacheKey, json_encode($cacheData, JSON_UNESCAPED_UNICODE));
            $redis->set($cacheKeyExpireAt, time() + $expireSecond);
            $result = $cacheData;
        } else {
            $result = json_decode($redis->get($cacheKey), true);
        }
        return $result;
    }

    public static function stopResubmit($itemName, $userId, $limitSecond = 5)
    {
        $redis = app('redis');
        $redis->select(12);
        $rKey = 'wx:'.$itemName.':stopResubmit:'.$userId;
        $rVal = $redis->incr($rKey);
        if ($rVal > 1) {
            return false;
        }
        $redis->setex($rKey, $limitSecond, $rVal);
        return true;
    }

    /**
     * 保存微信头像
     * @param $avatar  //微信头像地址
     * @param $controllerName  //前控制器名称
     * @return string   返回存储的路径
     */
    public static function generateAvatar($avatar, $controllerName)
    {
        $client = new Client();
        $res = $client->request('GET', $avatar);
        $avatarPath = 'upload/items/'.$controllerName.'/avatar/'.md5(date('YmdHis').str_random(8)).'.png';
        $storage = Storage::disk('public');
        $storage->put($avatarPath, $res->getBody());
        return $avatarPath;
    }


    /**
     * @param  int  $code
     * @param  string  $message
     * @param $data
     * @param  bool  $type
     * @return \Illuminate\Http\JsonResponse
     */
    public static function Json($code = 1, $message = '', $data = [], $type = false)
    {
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        if (!is_string($data)) {
            /**
             * @var ResourceCollection $data
             * @var LengthAwarePaginator $resource
             */
            $response['data'] = $data;
            if (is_array($data)) {
                foreach ($data as $k => $v) {
                    if ($v instanceof ResourceCollection && $v->resource instanceof LengthAwarePaginator) {
                        $resource = $v->resource;
                        $response['data']['meta'] = [
                            'current_page' => $resource->currentPage(),
                            'per_page' => $resource->perPage(),
                            'total' => $resource->total(),
                            'last_page' => $resource->lastPage(),
                        ];
//                        unset($data[$k]);
                    }
                }

            }


//            if ($data instanceof ResourceCollection && $data->resource instanceof LengthAwarePaginator) {
//                $resource = $data->resource;
//                $response['meta'] = [
//                    'current_page' => $resource->currentPage(),
//                    'per_page' => $resource->perPage(),
//                    'total' => $resource->total(),
//                    'last_page' => $resource->lastPage(),
//                ];
//            }

//            if ($data instanceof LengthAwarePaginator) {
//                $response['data'] = $data->items();
//                $response['meta'] = [
//                    'current_page' => $data->currentPage(),
//                    'per_page' => $data->perPage(),
//                    'total' => $data->total(),
//                    'last_page' => $data->lastPage(),
//                ];
//            }
        }
        if ($type) {
            return response()->json($response, JSON_UNESCAPED_UNICODE);
        }
        return response()->json($response);
    }

    /**
     * 递归创建文件夹
     * @param $dir
     * @return bool
     */
    public static function makeDirectory($dir)
    {
        return is_dir($dir) or self::makeDirectory(dirname($dir)) and mkdir($dir, 0777);
    }


    /*
     * 获取当前类名 小写
     * */
    public static function getControllerName($class)
    {
        $arr = explode('\\', $class);
        return strtolower(str_replace('Controller', '', $arr[count($arr) - 1]));
    }

    /*获取分享数据*/
    public static function getRedisShareData($itemName)
    {
        Redis::connection()->select(0);
        $res = Redis::hgetall('wx:view:'.$itemName);
        if (!isset($res['tl'])) {
            $res['tl'] = 0;
        }
        if (!isset($res['firend'])) {
            $res['firend'] = 0;
        }
        return $res;
    }

    /*
     * 导出excel 过滤微信昵称
     * */
    public static function filterEmoji($emojiStr)
    {
        $emojiStr = preg_replace_callback('/./u', function (array $match) {
            return strlen($match[0]) >= 4 ? '' : $match[0];
        }, $emojiStr);
        return '`'.$emojiStr;    //昵称前面加半角符号 防止 EXCEL报错
    }

    /**
     * 获取真实IP地址
     */
    public static function getRealIp()
    {
        $ip = false;
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
                $ips = explode(", ", getenv("HTTP_X_FORWARDED_FOR"));
                if ($ip) {
                    array_unshift($ips, $ip);
                    $ip = false;
                }
                $ipsCount = count($ips);
                for ($i = 0; $i < $ipsCount; $i++) {
                    if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
                        $ip = $ips[$i];
                        break;
                    }
                }
            } else {
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
                    $ip = getenv("REMOTE_ADDR");
                } else {
                    if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],
                            "unknown")) {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    } else {
                        $ip = "unknown";
                    }
                }
            }
        }
        return self::isIp($ip) ? $ip : "unknown";
    }

    /**
     * 检查是否是合法的IP
     */
    public static function isIp($ip)
    {
        if (preg_match('/^((\d|[1-9]\d|2[0-4]\d|25[0-5]|1\d\d)(?:\.(\d|[1-9]\d|2[0-4]\d|25[0-5]|1\d\d)){3})$/', $ip)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 验证手机号
     */
    public static function checkMobile($mobile)
    {
        return preg_match('/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/i',
            $mobile);
    }

    public static function formatDateString($dateRange)
    {
        return $dateRange[0] != '' && $dateRange[1] != '' ? [
            $dateRange[0].' 00:00:00', $dateRange[1].' 23:59:59'
        ] : '';
    }

    public static function formatTimeString($date, $type = '')
    {
        if ($type == 'start') {
            return $date != '' ? $date.' 00:00:00' : '';
        }
        return $date != '' ? $date.' 23:59:59' : '';
    }
}
