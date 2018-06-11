<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','model','project_id','name','suppliers','competitors','consumers','new','substitutes',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function criterion_industries()
    {
        return $this->hasMany(CriterionIndustry::class);
    }
}
