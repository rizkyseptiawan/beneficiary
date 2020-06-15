<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCriteria extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function criteria()
    {
        return $this->belongsTo('App\Criteria');
    }

}
