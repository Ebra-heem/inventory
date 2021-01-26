<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['date','supplier_id','total','paid','due','status'];
    
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

  
}
