<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AfterSales extends Model
{

    protected $table = 'ydf_aftersales';

    protected $guarded = [];

    //声明主键类型为字符串
    protected $keyType = 'string';

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function orderItem()
    {
        return $this->hasOne('App\Models\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
