<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foda extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla FODA
     */
    protected $fillable = [
        'id', 'fortaleza', 'debilidad', 'amenaza', 'oportunidad', 'estudio', 'proyecto_id',
    ];
    
     /**
     *  FODA pertenece a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
