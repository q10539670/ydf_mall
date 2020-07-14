<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'ydf_goods';

    protected $guarded = [];

    public function product()
    {
        return $this->hasMany('App\Models\Products')->where('is_del',0);
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Images');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\GoodsCategory','goods_category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\GoodsType','goods_type_id');
    }
}
