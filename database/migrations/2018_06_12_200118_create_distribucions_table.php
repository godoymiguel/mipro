<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistribucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribucions', function (Blueprint $table) {
            $table-> uuid('id');
			$table-> primary('id');
            $table-> boolean('fabricante');
            $table-> boolean('mayorista');
            $table-> boolean('minorista');
            $table-> boolean('consumidor');
            $table-> boolean('esperar_cliente');
            $table-> boolean('buscar_cliente');
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
        Schema::dropIfExists('distribucions');
    }
}
