<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmountChange extends Model
{
    protected $table = 'ydf_sale_amount_change_log';

    protected $guarded = [];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
