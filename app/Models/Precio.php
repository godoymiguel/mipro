<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla Precio
     */
    protected $fillable = [
        'id', 'competencia', 'costo', 'diferenciacion', 'desnatar', 'fijo', 'precio', 'estudio', 'proyecto_id',
    ];
    
     /**
     * El precio pertenecen a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
