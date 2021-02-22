<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable=['date','total','shipping','advance','customer_id','status','paid'];

    public function customers()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
