<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logistics extends Model
{
    protected $table = 'ydf_logistics';

    protected $guarded = [];

    /**
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;
}
