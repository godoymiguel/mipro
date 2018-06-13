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
        'id','model','investigation_id','size','list','sample_point','units','type_sampling','proportion','level','error','sample_size','know_population',
    ];

    public function investigation()
    {
    	return $this->belongsTo(Investigation::class);
    }
}
