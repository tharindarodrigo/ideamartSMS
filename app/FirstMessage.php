<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirstMessage extends Model
{
    public static $rules = [];

    public function ascendant()
    {
        return $this->belongsTo(Ascendant::class);
    }
}
