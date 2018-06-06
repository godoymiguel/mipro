<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediosFin extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla mediosfin
     */
    protected $fillable = [
        'id', 'actividad', 'medio_directo', 'medio_indirecto', 'fin_directo','fin_indirecto', 'estudio', 'proyecto_id',
    ];
    
    
     /**
     * Los mediosfin pertenecen al Arbol de Objetivos
     */
    public function arbolobjetivo()
    {
    	return $this->belongsTo(Arbol_Objetivo::class);
    }

}
