<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function ascendant()
    {
        return $this->belongsTo(Ascendant::class);
    }
}
