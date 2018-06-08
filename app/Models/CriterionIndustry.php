<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriterionIndustry extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','model','title','criterion','value','industry_id',
    ];

    public function industry()
    {
    	return $this->belongsTo(Industry::class);
    }
}
