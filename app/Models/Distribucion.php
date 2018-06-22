<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribucion extends Model
{
  public $incrementing = false;
     
     
     /**
     * Atributos de la tabla Producto
     */
    protected $fillable = [
        'id', 'fabricante', 'mayorista', 'minorista', 'consumidor', 'esperar_cliente', 'buscar_cliente', 'estudio', 'proyecto_id'
    ];
    
     /**
     * La distribucion pertenece a proyecto
     */
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    
}
