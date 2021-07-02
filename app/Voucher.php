<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $guarded=[];

    public function ledger()
    {
        return $this->hasMany(GeneralLedger::class);
    }
}
