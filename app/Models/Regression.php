<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regression extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','coefficient_r1','coefficient_r2','coefficient_r31','coefficient_r32','model','project_id',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
