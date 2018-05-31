<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSerie extends Model
{

	public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id','year','production','import','existence','export','apparent_consumption','population','precapita_consumption','price','real_income','model','project_id',
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
