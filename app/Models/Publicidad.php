<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla Publicidad
     */
    protected $fillable = [
        'id', 'marca', 'slogan', 'medios', 'promocion', 'logo', 'estudio', 'proyecto_id',
    ];
    
     /**
     * La publicidad pertenecen a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
