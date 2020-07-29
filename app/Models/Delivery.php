<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'ydf_delivery';

    protected $guarded = [];

    protected $keyType = 'string';

    public function item()
    {
        return $this->hasMany('App\Models\DeliveryItems');
    }
}
