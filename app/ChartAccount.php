<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    protected $fillable=['account','name','parent_id'];

    public function childs(){
        return $this->hasMany('App\ChartAccount','parent_id');
      }
}
