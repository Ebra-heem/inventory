<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['id','employee_id','name','designation','nid','phone','email','join_date','leave_date','address','status'];
}
