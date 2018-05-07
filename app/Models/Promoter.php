<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'type', 'cedula', 'email', 'model', 'project_id',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

}
