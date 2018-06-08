<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesTable extends Migration
{
    /**$
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table-> uuid('id');
			$table->primary('id');
            $table-> String('fuente');
            $table-> text('descripcion');
            $table-> enum('tipo',['Historia del bien o servicio','Uso de aplicaciones del bien o servicio','Consumo: tasas y frecuencia','Principales consumidores o clientes','Principales fabricantes o prestadores','Tecnología asociada a la fabricación del bien o servicio','Tendencias del bien o servicio']);
            $table-> enum('estudio',['MEM','MET','MEF','MEE'])->default('MEM');
            $table-> timestamps();
            
            $table->uuid('proyecto_id');            
            $table->foreign('proyecto_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes');
    }
}
