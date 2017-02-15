<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static $rules = [
        'ascendant_id'=>'required|integer|min:1|max:12',
        'date'=>'required|date',
        'message'=>'required'
    ];

    public function ascendant()
    {
        return $this->belongsTo(Ascendant::class);
    }
}
