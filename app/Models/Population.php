<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','model','investigation_id','population','size','list','sample_point','units','type_sampling','proportion','level','error','sample_size',
    ];

    public function investigation()
    {
    	return $this->belongsTo(Investigation::class);
    }
}
