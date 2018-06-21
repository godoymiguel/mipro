<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arbol_Problema extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla Arbol_Problema
     */
    protected $fillable = [
        'id', 'problema', 'estudio', 'proyecto_id',
    ];
    
    
     /**
     * El arbol del problema pertenece a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
     /**
     * La  arbol del problema tiene muchas causasefectos
     */
    public function causasefectos()
    {
    	return $this->hasMany(CausasEfectos::class);
    }
}
