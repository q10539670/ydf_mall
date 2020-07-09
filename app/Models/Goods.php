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
}
