<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'ydf_lunbo';

    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo('App\Models\Images');
    }
}
