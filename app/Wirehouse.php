<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wirehouse extends Model
{
    public function racks()
    {
        return $this->hasMany(Rack::class);
    }
}
