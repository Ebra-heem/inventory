<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    public function wirehouse()
    {
        return $this->belongsTo('App\Wirehouse');
    }
}
