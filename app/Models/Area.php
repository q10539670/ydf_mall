<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $guarded = [];


    public static function getAreasForTable()
    {
        $areas = self::getdata();
        return self::getChildTree($areas);
    }

    public static function getData()
    {
        return self::get(['id','parent_id','level_type','name','zip_code','first_char'])->toArray();
    }

    //排序权限
    public static function getTree($data, $pid = 0)
    {
        $tree = [];
        foreach ($data as $val) {
            if ($val['parent_id'] == $pid) {
                $tree[] = $val;
                $tree = array_merge($tree, self::getTree($data, $val['id']));
            }
        }
        return $tree;
    }

    //多维数组结构
    public static function getChildTree($areas, $pid = 100000)
    {
        $tree = [];
        foreach ($areas as $val) {
            if ($val['parent_id'] == $pid) {
                $data = $val;
                if ($val['level_type'] < 3) {
                    $data['children'] = self::getChildTree($areas, $val['id']);
                }
                $tree[] = $data;
            }
        }
        return $tree;
    }
}
