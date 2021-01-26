<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable=['date','total','shipping','discount','customer_id','status'];

    public function customers()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
