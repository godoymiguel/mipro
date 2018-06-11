<?php

use Illuminate\Database\Seeder;

use App\Models\DefaultIdea;

class DefaultIdeaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'INVERSIÓN INICIAL',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'TASA DE CRECIMIENTO DE MERCADO',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'TAMAÑO DEL MERCADO POTENCIAL',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'CANTIDAD Y RIVALIDAD DE LA COMPETENCIA',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'PODER DE PROVEEDORES',
        ]);	

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'AMENZA DE SUSTITUTOS',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'CONOCIMIENTO DEL SECTOR',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'REQUERIMIENTO DE TIEMPO',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'APOYO FAMILIAR',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'NECESIDAD DE TECNOLOGÍA',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'RESTRICCIONES LEGALES',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'DISPONIBILIDAD DE FINANCIAMIENTO',
        ]);

        DefaultIdea::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'RENTABILIDAD',
        ]);
    }
}
