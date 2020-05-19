<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialSubmissionDetail extends Model
{
    protected $guarded = ['id'];

    public function financial_submission()
    {
        return $this->belongsTo('App\FinancialSubmission');
    }

    public function criteria()
    {
        return $this->belongsTo('App\Criteria');
    }
}
