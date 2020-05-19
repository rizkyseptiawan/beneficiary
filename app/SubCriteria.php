<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    protected $guarded = ['id'];

    public function Criteria()
    {
        return $this->belongsTo('App\Criteria');
    }
}
