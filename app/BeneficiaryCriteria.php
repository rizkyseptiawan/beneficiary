<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryCriteria extends Model
{
    protected $guarded =['id'];
    
    public function criteria()
    {
        return $this->belongsTo('App\Criteria');
    }

    public function FundsAssistancePeriod()
    {
        return $this->belongsTo('App\FundsAssistancePeriod');
    }

    public function FinancialSubmission()
    {
        return $this->belongsTo('App\FinancialSubmission');
    }
}
