<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class GoodsCategory extends Model
{
    protected $table = 'ydf_goods_category';

    protected $guarded = [];


    //获取权限数组
    public function getCatesWithPrefix()
    {
        $cates = $this->getdata();
        $data = $this->getTree($cates);
        return $this->setPrefix($data);
    }

    //获取权限数组
    public function getCatesForTable()
    {
        $cates = $this->getdata();
        $data = $this->getTree($cates);
        $prefixData = $this->setPrefix($data);
        foreach ($prefixData as $k => $v) {
            $prefixData[$k]['is_more'] = 0;
            foreach ($prefixData as $vv) {
                if ($vv['pid'] == $v['id']) {
                    $prefixData[$k]['is_more'] = 1;
                    break;
                }
            }
        }
        return $prefixData;
    }


    public function getData()
    {
        return self::select(['id', 'pid', 'name','status'])->get()->toArray();
    }

    //排序权限
    public function getTree($cates, $pid = 0)
    {
        $tree = [];
        foreach ($cates as $val) {
            if ($val['pid'] == $pid) {
                $tree[] = $val;
                $tree = array_merge($tree, $this->getTree($cates, $val['id']));
            }
        }
        return $tree;
    }

    //多维数组结构
    public function getChildTree($cates, $pid = 0)
    {
        $tree = [];
        foreach ($cates as $val) {
            if ($val['pid'] == $pid) {
                $data = $val;
                $data['children'] = $this->getChildTree($cates, $val['id']);
                $tree[] = $data;
            }
        }
        return $tree;
    }

    public function getChildId($id = 0, $level = 0)
    {
        $res = [];
        $nextLevel = $level++;
        if ($p = self::where('pid', $id)->get()) {
            foreach ($p as $v) {
                $res[] = array_merge($v, ['level' => $level]);
                $res = array_merge($res, $this->getChildId($v->id, $nextLevel));
            }
        }
        return $res;
    }

    //加前缀
    public function setPrefix($data, $p = '|----')
    {
        $tree = [];
        $num = 1;
        $prefix = [0 => 1];
        while ($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['pid'] != $val['pid']) {
                    $num++;
                }
            }
            if (array_key_exists($val['pid'], $prefix)) {
                $num = $prefix[$val['pid']];
            }
            $val['name'] = str_repeat($p, $num) . $val['name'];
            $prefix[$val['pid']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }

    /**
     * 验证器
     * @param $data
     * @return JsonResponse
     */
    public static function validator($data)
    {
        $validator = Validator::make($data, [
            'pid' =>['required','numeric'],
            'name' => ['required', 'max:32'],
            'goods_type_id' => ['nullable|exists:ydf_goods_type,id'],
            'sort' => ['required','numeric'],
            'image_id' => ['sometimes','required','exists:ydf_images,id'],
            'status' => ['required','regex:/^[1,2]$/']
        ], [
            'pid.required' => 'PID不能为空',
            'pid.numeric' => 'PID只能是数字',
            'name.required' => '分类名称不能为空',
            'name.max' => '分类名称最大长度为64个字符',
            'goods_type_id.exists' => '商品类型不存在',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'image_id.exists' => '图片不存在',
            'status.required' => '状态不能为空',
            'status.regex' => '状态参数错误',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
    }

    /**
     * 更改状态
     * @param $status
     * @param $id
     */
    public static function setStatus($status,$id)
    {
        $cate = self::find($id);
        if ($status == 1) {
            //同步修改父分类状态为显示
            self::where('id', $cate->pid)->where('status', 2)->update(['status' => $status]);
            //TODO 需要同步修改商品状态
            //...
        } else {
            //同步修改子分类状态为隐藏
            self::where('pid', $id)->where('status', 1)->update(['status' => $status]);
            //TODO 需要同步修改商品状态
            //...
        }
    }
}
