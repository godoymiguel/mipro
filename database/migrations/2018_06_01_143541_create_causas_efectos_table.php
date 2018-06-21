<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausasEfectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causas_efectos', function (Blueprint $table) {
			$table->uuid('id');
			$table->primary('id');
			$table->timestamps();
            $table-> String('causa_directa')->nullable();
            $table-> String('causa_indirecta')->nullable();
            $table-> String('efecto_directo')->nullable();
            $table-> String('efecto_indirecto')->nullable();
            $table-> String('causa_raiz')->nullable();
            $table->enum('estudio',['MEM','MET','MEF','MEE'])->default('MEM');
			
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
        Schema::dropIfExists('causas_efectos');
    }
}
