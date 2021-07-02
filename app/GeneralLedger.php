<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralLedger extends Model
{
    protected $guarded=[];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class,'voucher_id');
    }
    public function group()
    {
        return $this->belongsTo(AccountGroup::class,'account_group_id');
    }

    public function chart()
    {
        return $this->belongsTo(ChartOfAccount::class,'chart_account_id');
    }
}
