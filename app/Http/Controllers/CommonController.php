<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Area;
use App\Models\Images;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Common
 * 公共接口
 * Class CommonController
 * @package App\Http\Controllers
 */
class CommonController extends Controller
{
    protected $ratio = 70; //富文本图片压缩比率

    /**
     * uploadImages
     * 上传图片
     * @bodyParam images[] file 图片文件
     * @param  Request  $request
     * @return JsonResponse
     */
    public function uploadImages(Request $request)
    {
        $file = $request->file('images');
        if (!empty($file)) {
            foreach ($file as $key => $value) {
                $len = $key;
            }
            if ($len > 25) {
                return Helper::Json(-1, '上传失败', ['info' => '最多可以上传25张图片']);
            }
            $m = 0;
            $k = 0;
            for ($i = 0; $i <= $len; $i++) {
                // $n 表示第几张图片
                $n = $i + 1;
                if ($file[$i]->isValid()) {
                    if (in_array(strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        $imagesName = explode('.', $file[$i]->getClientOriginalName());//获取上传文件的名字
                        $ext = $imagesName[1];
                        $jpg = (string) Image::make($file[$i])->encode('jpg', $this->ratio);
                        $filename = '/images/'.date('Ymd').'/'.md5(time().rand(10000, 99999)).".".$ext;
                        if (env('APP_ENV') == 'local') {
                            Storage::disk('public')->put($filename, $jpg);    //保存图片
                            $pathName = strstr($filename, date('Ymd'));
                            $newFileName = 'http://192.168.0.178:8888/storage/images/'.$pathName;
                        } else {
                            Storage::disk('production')->put($filename, $jpg);    //保存图片
                            $pathName = strstr($filename, date('Ymd'));
                            $newFileName = env('APP_URL').'/static/upload/images/'.$pathName;
                        }
                        if ($newFileName) {
                            $m = $m + 1;
                            $image = [
                                'name' => $imagesName[0],
                                'path' => $pathName,
                                'url' => $newFileName,
                                'is_del' => 0
                            ];
                            $image = Images::create($image);
                        } else {
                            $k = $k + 1;
                        }
                        $msg = $m."张图片上传成功 ".$k."张图片上传失败";
                        $return[] = [
                            'ResultData' => 0, 'info' => $msg, 'imagesId' => $image['id'],
                            'newFileName' => $newFileName, 'path' => $pathName,
                        ];
                    } else {
                        return Helper::Json(-1, '上传失败', ['info' => '第'.$n.'张图片后缀名不合法!'.'只支持jpeg/jpg/png/gif格式']);
                    }
                } else {
                    return Helper::Json(-1, '上传失败', ['info' => '第'.$n.'张图片超过最大限制!'.'图片最大支持2M']);
                }
            }
        } else {
            return Helper::Json(-1, '上传失败', ['info' => '请选择文件']);
        }
        return Helper::Json(1, '上传成功', ['info' => $return]);
    }

    /**
     * uploadVideo
     * 上传视频
     * @bodyParam video file 视频文件
     * @param  Request  $request
     * @return JsonResponse
     */
    public function uploadVideo(Request $request)
    {
        $file = $request->file("video");
        if ($file->isValid()) {
            $videoName = explode('.', $file->getClientOriginalName());//获取上传文件的名字
            if (in_array(strtolower($file->extension()), ['mp4'])) {
                if (env('APP_ENV') == 'local') {
                    $path = $file->store('/videos/'.date('Ymd'), 'public');
                    $pathName = strstr($path, date('Ymd'));
                    $newFileName = 'http://192.168.0.178:8888/storage/videos/'.$pathName;
                } else {
                    $path = $file->store('/videos/'.date('Ymd'), 'production');
                    $pathName = strstr($path, date('Ymd'));
                    $newFileName = env('APP_URL').'/static/upload/videos/'.$pathName;
                }

                $image = [
                    'name' => $videoName[0],
                    'path' => $pathName,
                    'url' => $newFileName,
                    'is_del' => 0
                ];
                $video = Images::create($image);
                $return[] = ['ResultData' => 0, 'info' => '视频上传成功', 'imagesId' => $video['id'],
                    'newFileName' => $newFileName, 'path' => $pathName,];
            } else {
                return response()->json(['ResultData' => 3, 'info' => '视频后缀名不合法!<br/>'.'只支持MP4格式']);
            }
        } else {
            return response()->json(['ResultData' => 1, 'info' => '视频超过最大限制!<br/>'.'图片最大支持2M']);
        }
        return Helper::Json(1, '上传成功', ['info' => $return]);
    }

    /**
     * area
     * 获取全国地区
     * @urlParam type boolean 是否更新地区缓存[true:更新 false:不更新] 默认不更新
     * @param  null  $type
     * @return JsonResponse
     */
    public function getAreas($type = null)
    {
        $redis = app('redis');
        $redis->select(12);
        $redisKey = 'wx:area';
        if ($redis->exists($redisKey)) {
            if ($type) {
                $redis->del($redisKey);
                $areas = json_encode(Area::getAreasForTable());
                $redis->set($redisKey, $areas);
            }
        } else {
            $areas = json_encode(Area::getAreasForTable());
            $redis->set($redisKey, $areas);
        }
        $areas = $redis->get($redisKey);
        $areas = json_decode($areas);
        return Helper::Json(1, '地区查询成功', ['areas' => $areas]);
    }
}
