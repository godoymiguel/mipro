<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $incrementing = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','value', 'title','active',
    ];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function defaultUuid()
    {
        return $this->where('value','STUDENT')->value('id');
    }
}
