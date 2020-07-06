<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsType extends Model
{
    protected $table = 'ydf_goods_type';

    protected $guarded = [];

    public function spec()
    {
        return $this->belongsToMany('App\Models\Spec','ydf_type_spec_rel','type_id','spec_id');
    }
    static function checkSafeOfDestroy($id)
    {
        if (GoodsCategory::where('goods_type_id',$id)->first()) {
            return '请先删除该类型下分类';
        }
        if (Goods::where('goods_type_id',$id)->first()) {
            return '请先删除该类型下商品';
        }
        return false;
    }
}
