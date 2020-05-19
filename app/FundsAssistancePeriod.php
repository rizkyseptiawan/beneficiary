<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FundsAssistancePeriod extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function financial_submissions()
    {
        return $this->hasMany('App\FinancialSubmission');
    }
}
