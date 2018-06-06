<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultIndustry extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title','criterion',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
