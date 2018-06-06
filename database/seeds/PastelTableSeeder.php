<?php

use Illuminate\Database\Seeder;

use App\Models\DefaultPastel;

class PastelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	# Factor Politico
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Estabilidad del gobierno',
        	'factor' => 'P',
        ]);
        
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Políticas fiscales',
        	'factor' => 'P',
        ]);
        
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Convenios internacionales',
        	'factor' => 'P',
        ]);
        
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Política de bienestar social',
        	'factor' => 'P',
        ]);
        
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Incentivos de promoción empresarial',
        	'factor' => 'P',
        ]);

        # Factor Ambiental
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Política medio ambiental',
        	'factor' => 'A',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Tratamiento de Residuos',
        	'factor' => 'A',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Consumo de energía',
        	'factor' => 'A',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Leyes de protección de los recursos naturales',
        	'factor' => 'A',
        ]);

		# Factor SocioCultural
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Convivencia social',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Hábitos de consumo',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Estilo de vida',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Valores y actitudes sociales',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Nivel de educación',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Nivel de Pobreza',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Libertad de prensa',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Disponibilidad de mano de obra calificada',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Grado de sindicalización',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Disponibilidad y costos de capacitación',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Crecimiento de la población',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Inmigración',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Emigración',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Cantidad de población joven',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Densidad poblacional',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Proporción de población urbana/rural',
        	'factor' => 'S',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Estructura familiar',
        	'factor' => 'S',
        ]);

        # Factor TECNOLÓGICO
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Politica de I+D+i',
        	'factor' => 'T',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Disponibilidad tecnológica',
        	'factor' => 'T',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Adopción de nueva tecnología',
        	'factor' => 'T',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Tecnologías sustitutivas',
        	'factor' => 'T',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Respeto por patentes y derechos',
        	'factor' => 'T',
        ]);

        # Factor ECONÓMICO
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Evolución del Producto Interno Bruto',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Tasa de inflación',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Política monetaria',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Ingreso nacional disponible',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Tasa de desempleo',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Comercio Exterior',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Tarifas de Servicios Públicos',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Tasas de interés activas competitivas',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Mercado cambiario',
        	'factor' => 'E',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Costos laborales',
        	'factor' => 'E',
        ]);

        # Factor LEGAL
        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Defensa de la libre competencia',
        	'factor' => 'L',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Legislación laboral',
        	'factor' => 'L',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Normas de Seguridad e higiene del trabajo',
        	'factor' => 'L',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Normas y estándares de calidad',
        	'factor' => 'L',
        ]);

		DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Protección al consumidor',
        	'factor' => 'L',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Legislación de comercio exterior',
        	'factor' => 'L',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Legislación sobre moneda extranjera',
        	'factor' => 'L',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Legislación de propiedad extranjera',
        	'factor' => 'L',
        ]);

        DefaultPastel::create([
        	'id' => Uuid::generate()->string,
        	'title' => 'Transferencia internacional de fondos',
        	'factor' => 'L',
        ]);
    }
}
