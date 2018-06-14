<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $incrementing = false;
     
     
     /**
     * Atributos de la tabla Producto
     */
    protected $fillable = [
        'id', 'basico', 'aumentado', 'psicologico', 'comparativa', 'competitiva', 'estudio', 'proyecto_id'
    ];
    
     /**
     * El producto pertenece a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    
         /**
     * El producto tiene muchos precios
     */
    public function precio()
    {
    	return $this->hasMany(Precio::class);
    }
    
    public function distribucion()
    {
    	return $this->hasMany(Distribucion::class);
    }
    
    public function publicidad()
    {
    	return $this->hasMany(Distribucion::class);
    }
    

}
