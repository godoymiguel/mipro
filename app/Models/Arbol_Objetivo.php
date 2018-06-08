<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arbol_Objetivo extends Model
{
     public $incrementing = false;
     
     /**
     * Atributos de la tabla Arbol_Objetivo
     */
    protected $fillable = [
        'id', 'objetivo', 'estudio', 'proyecto_id',
    ];
    
    
     /**
     * El arbol de objetivos pertenece a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
     /**
     * La  arbol del objetivos tiene muchos medios y fin
     */
    public function mediosfin()
    {
    	return $this->hasMany(MediosFin::class);
    }
}
