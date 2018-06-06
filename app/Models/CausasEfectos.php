<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CausasEfectos extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla CausasEfectos
     */
    protected $fillable = [
        'id', 'causa_raiz', 'causa_directa', 'causa_indirecta', 'efecto_directo', 'efecto_indirecto', 'proyecto_id',
    ];
    
     /**
     * Los CausasEfectos pertenecen al Arbol del Problema
     */
    
    public function arbol_problema()
    {
    	return $this->belongsTo(Arbol_Problema::class);
    }
}
