<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
     public $incrementing = false;
     
     
     /**
     * Atributos de la tabla Canvas
     */
    protected $fillable = [
        'id', 'problema', 'solucion', 'indicadores', 'efectos','project_id'
    ];
    
     /**
     * El canvas pertenece a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    
}
