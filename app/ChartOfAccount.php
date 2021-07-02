<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    protected $guarded=[];

    public function group()
    {
        return $this->belongsTo(AccountGroup::class,'account_group_id');
    }

    public function ledger()
    {
        return $this->hasMany(GeneralLedger::class,'chart_account_id');
    }

}
