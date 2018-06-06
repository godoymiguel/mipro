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
        'id','model','project_id','name','title','value','criterion',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
