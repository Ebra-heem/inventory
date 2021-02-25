<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table='stocks';

    protected $fillable = ['product_id','wirehouse_id','wh_qty','sr_qty','sale_qty','type',
    'avg_price','total_qty','purchase_price','avg'];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
