<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultPastel extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title','factor',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
