<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierDetail extends Model
{
    protected $fillable = ['date','supplier_id','purchase_id','particular','amount','account_type','section'];
}
