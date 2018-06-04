<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pastel extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','model','project_id','title','factor','value','justification',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
