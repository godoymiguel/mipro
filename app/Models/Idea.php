<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla Idea
     */
    protected $fillable = [
        'id', 'name', 'valor', 'estudio', 'proyecto_id',
    ];
    
     /**
     * La idea pertenece a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
     /**
     * La idea tiene muchos criterios
     */
    public function criterios()
    {
    	return $this->hasMany(Criterios::class);
    }
    
}
