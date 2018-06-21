<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criterios extends Model
{
    public $incrementing = false;

    /**
     * Los atributos BD de Criterios
     */
    protected $fillable = [
        'id', 'name', 'valor1', 'valor2', 'valor3', 'idea_id', 'estudio', 'proyecto_id',
    ];

    public function idea()
    {
    	return $this->belongsTo(Idea::class);
    }

}
