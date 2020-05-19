<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FinancialSubmissionDetail extends Model
{
    use SoftDeletes;
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
