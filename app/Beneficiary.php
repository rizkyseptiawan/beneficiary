<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Beneficiary extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['tanggal_lahir'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function financial_submissions()
    {
        return $this->hasMany('App\FinancialSubmission');
    }
}
