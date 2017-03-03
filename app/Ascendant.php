<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ascendant extends Model
{
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
