<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $table = 'ydf_spec';

    protected $guarded = [];

    public function value()
    {
        return $this->hasMany('App\Models\SpecValue');
    }
}
