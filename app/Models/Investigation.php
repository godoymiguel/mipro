<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','model','project_id','title',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function populations()
    {
        return $this->hasMany(Population::class);
    }

    public function demand()
    {
        return $this->hasOne(Demand::class);
    }

    public function offer()
    {
        return $this->hasOne(Offer::class);
    }

    public function projection()
    {
        return $this->hasMany(ProjectionInvestigation::class);
    }
}
