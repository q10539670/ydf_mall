<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'ydf_order';

    protected $guarded = [];

    public function item()
    {
        return $this->hasMany('App\Models\OrderItem','order_id');
    }

    public function ship()
    {
        return $this->belongsTo('App\Models\Ship','logistics_id');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area','ship_area_code');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
