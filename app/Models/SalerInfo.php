<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalerInfo extends Model
{
    protected $table = 'ydf_user_saler_info';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
