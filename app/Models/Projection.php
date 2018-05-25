<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
	public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','year','demand','offer','gap','model','project_id',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
