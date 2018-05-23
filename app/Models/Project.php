<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','user_id','active',
    ];

    public function projectUser($user)
    {
        return $this->where('active',true)->where('user_id',$user)->value('id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function promoters()
    {
    	return $this->hasMany(Promoter::class);
    }

    public function timeSeries()
    {
        return $this->hasMany(TimeSerie::class);
    }
}
