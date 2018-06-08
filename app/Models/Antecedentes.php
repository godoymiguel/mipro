<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antecedentes extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla Antecedentes
     */
    protected $fillable = [
        'id', 'fuente', 'descripcion', 'tipo', 'estudio', 'proyecto_id',
    ];
    
     /**
     * Los Antecedentes pertenecen a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

}
