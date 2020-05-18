<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $guarded = ['id'];

    public function SubCriterias()
    {
        return $this->hasMany('App\SubCriteria');
    }

    public function BeneficiaryCriterias()
    {
        return $this->hasMany('App\BeneficiaryCriteria');
    }


}
