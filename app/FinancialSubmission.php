<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialSubmission extends Model
{
    protected $guarded = ['id'];

    public function SubCriteria()
    {
        return $this->belongsTo('App\SubCriteria');
    }

    public function Beneficiary()
    {
        return $this->belongsTo('App\Beneficiary');
    }


}
