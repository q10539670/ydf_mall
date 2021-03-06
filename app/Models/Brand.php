<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'ydf_brand';

    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo('App\Models\Images');
    }
}
