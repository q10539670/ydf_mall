<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'ydf_products';

    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo('App\Models\Images');
    }
}
