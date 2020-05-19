<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundsAssistancePeriod extends Model
{
    protected $guarded = ['id'];

    public function financial_submissions()
    {
        return $this->hasMany('App\FinancialSubmission');
    }
}
