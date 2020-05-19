<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Criteria extends Model
{
    use SoftDeletes;
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
