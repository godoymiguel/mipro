<?php

use Illuminate\Database\Seeder;

//use Uuid;

use App\Rol;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Rol::create([
        	'id' => Uuid::generate()->string,
        	'value' => 'ADMIN',
        	'title' => 'Administrador',
        ]);

        Rol::create([
        	'id' => Uuid::generate()->string,
        	'value' => 'STUDENT',
        	'title' => 'Estudiante',
        ]);
    }
}
