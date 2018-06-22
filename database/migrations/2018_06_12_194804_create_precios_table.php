<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table-> uuid('id');
			$table-> primary('id');
			$table-> enum('competencia',['SI','NO']);
			$table-> enum('costo',['SI','NO']);
			$table-> enum('desnatar',['SI','NO']);
			$table-> enum('diferenciacion',['SI','NO']);
			$table-> enum('fijo',['SI','NO']);
            $table-> text('precio');
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
        Schema::dropIfExists('precios');
    }
}
