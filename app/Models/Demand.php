<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','model','investigation_id','total_population','population','population_detail','age','age_detail','interested','interested_detail','potential_market','buy','buy_detail','available_market','entry','entry_detail','qualified_market','cup',
    ];

    public function investigation()
    {
    	return $this->belongsTo(Investigation::class);
    }
}
