<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interesados extends Model
{
    public $incrementing = false;
     
     /**
     * Atributos de la tabla Interesados
     */
    protected $fillable = [
        'id', 'grupo', 'interesados', 'problemas', 'recursos', 'conflictos', 'nombre', 'correo', 'telefono', 'responsabilidad', 'estudio', 'proyecto_id',
    ];
    
     /**
     * Interesados pertenecen a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
   
    public function contactos()
    {
    	return $this->hasMany(Contacto::class);
    }
    
}

