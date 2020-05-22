<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialSubmission extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function beneficiary()
    {
        return $this->belongsTo('App\Beneficiary');
    }

    public function funds_assistance_period()
    {
        return $this->belongsTo('App\FundsAssistancePeriod');
    }

    public function financial_submission_details()
    {
        return $this->hasMany('App\FinancialSubmissionDetail');
    }

}
