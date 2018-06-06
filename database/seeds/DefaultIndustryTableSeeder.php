<?php

use Illuminate\Database\Seeder;

class DefaultIndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # SUPPLIERS
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Pocos proveedores en la industria',
        	'criterion' => 'SUPPLIERS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Elevado poder de decisión en el precio',
        	'criterion' => 'SUPPLIERS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Elevado nivel de organización',
        	'criterion' => 'SUPPLIERS',
        ]);

        # COMPETITORS
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Gran nro. de competidores',
        	'criterion' => 'COMPETITORS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Guerra de precios',
        	'criterion' => 'COMPETITORS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Costos fijos altos',
        	'criterion' => 'COMPETITORS',
        ]);			
		
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Competidores diversos',
        	'criterion' => 'COMPETITORS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Restricciones legales para salir',
        	'criterion' => 'COMPETITORS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Activos liquidos p/salir',
        	'criterion' => 'COMPETITORS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Costos por parte del consumidor o cliente para cambiarse',
        	'criterion' => 'COMPETITORS',
        ]);

        # CONSUMERS
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Mercado meta reducido',
        	'criterion' => 'CONSUMERS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Elevado poder del consumidor o cliente para fijar precios',
        	'criterion' => 'CONSUMERS',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Consumidores o clientes organizados',
        	'criterion' => 'CONSUMERS',
        ]);

        # NEW
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Existen economías de escala',
        	'criterion' => 'NEW',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Bien o servicio diferenciado',
        	'criterion' => 'NEW',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Elevada inversión de capital',
        	'criterion' => 'NEW',
        ]);			
		
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Elevada inversion en publicidad',
        	'criterion' => 'NEW',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Acceso limitado a los canales de distribución',
        	'criterion' => 'NEW',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Restricciones gubernamentales para ingresar',
        	'criterion' => 'NEW',
        ]);

        # SUBSTITUTES
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Consumidor o cliente propenso a sustituir',
        	'criterion' => 'SUBSTITUTES',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Precios relativos bajos de los productos sustitutos',
        	'criterion' => 'SUBSTITUTES',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Facilidad y bajo costo para cambiar por sustituto',
        	'criterion' => 'SUBSTITUTES',
        ]);			
		
        DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Sustitutos presentan mayor diferenciación',
        	'criterion' => 'SUBSTITUTES',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Sustitutos cercanos disponibles',
        	'criterion' => 'SUBSTITUTES',
        ]);

		DefaultIndustry::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Suficientes sustitutos',
        	'criterion' => 'SUBSTITUTES',
        ]);        
    }
}
