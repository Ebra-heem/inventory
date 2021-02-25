<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable=['date','particular','description','chart_account_id',
    'supplier_id','customer_id','amount','account_type','purchase_id','sale_invoice_id','stock_id'];
}
