<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectionInvestigation extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','year','demand','offer','gap','model','investigation_id',
    ];

    public function investigation()
    {
    	return $this->belongsTo(Investigation::class);
    }
}
