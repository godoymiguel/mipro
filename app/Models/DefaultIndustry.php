<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultIndustry extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title','criterion',
    ];
}
