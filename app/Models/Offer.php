<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','model','investigation_id','competitors','capacity','people_served','rate','offer',
    ];

    public function investigation()
    {
    	return $this->belongsTo(Investigation::class);
    }
}
