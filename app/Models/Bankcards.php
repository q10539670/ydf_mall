<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bankcards extends Model
{
    protected $table = 'ydf_user_bankcards';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
