<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountGroup extends Model
{
    protected $guarded=[];

    public function chart()
    {
        return $this->hasMany(ChartOfAccount::class);
    }

    public function ledger()
    {
        return $this->hasMany(GeneralLedger::class,'account_group_id');
    }
}
