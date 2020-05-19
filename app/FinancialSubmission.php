<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialSubmission extends Model
{
    protected $guarded = ['id'];

    public function beneficiary()
    {
        return $this->belongsTo('App\Beneficiary');
    }

    public function funds_assistance_period()
    {
        return $this->belongsTo('App\FundsAssistancePeriod');
    }

}
