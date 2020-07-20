<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'china_area';

    protected $guarded = [];


    public static function getAreasForTable()
    {
        $areas = self::getdata();
        $data = self::getChildTree($areas);
        return $data;
    }

    public static function getData()
    {
        return self::all()->toArray();
    }

    //排序权限
    public static function getTree($data, $pid = 0)
    {
        $tree = [];
        foreach ($data as $val) {
            if ($val['pid'] == $pid) {
                $tree[] = $val;
                $tree = array_merge($tree, self::getTree($data, $val['id']));
            }
        }
        return $tree;
    }

    //多维数组结构
    public static function getChildTree($areas, $pid = 0)
    {
        $tree = [];
        foreach ($areas as $val) {
            if ($val['pid'] == $pid) {
                $data = $val;
                if ($val['level'] < 3) {
                    $data['children'] = self::getChildTree($areas, $val['id']);
                }
                $tree[] = $data;
            }
        }
        return $tree;
    }
}
