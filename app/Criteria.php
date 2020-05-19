<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $guarded = ['id'];

    public function sub_criterias()
    {
        return $this->hasMany('App\SubCriteria');
    }

    public function financial_submissions()
    {
        return $this->hasMany('App\FinancialSubmission');
    }


}
