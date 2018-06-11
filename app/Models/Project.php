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
    
    public function canvas()
    {
        return $this->hasMany(Canvas::class);
    }
    
    public function idea()
    {
        return $this->hasMany(Idea::class);
    }
    
    public function criterio()
    {
        return $this->hasMany(Criterios::class);
    }
    
    public function antecedentes()
    {
        return $this->hasMany(Antecedentes::class);
    }
    
    public function projections()
    {
        return $this->hasMany(Projection::class);
    }

    public function regressions()
    {
        return $this->hasMany(Regression::class);
    }

    public function pastels()
    {
        return $this->hasMany(Pastel::class);
    }

    public function industry()
    {
        return $this->hasOne(Industry::class);
    }
    
    public function arbol_problema()
    {
        return $this->hasMany(Arbol_Problema::class);
    }
    
    public function causas_efectos()
    {
        return $this->hasMany(CausasEfectos::class);
    }
    
    public function arbol_objetivo()
    {
        return $this->hasMany(Arbol_Objetivo::class);
    }
    
    public function medios_fin()
    {
        return $this->hasMany(MediosFin::class);
    }
    
    public function interesados()
    {
        return $this->hasMany(Interesados::class);
    }

    
    
}
