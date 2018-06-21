<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediosFinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medios_fins', function (Blueprint $table) {
            $table-> uuid('id');
			$table->primary('id');
            $table-> String('actividad');
            $table-> String('medio_directo');
            $table-> String('medio_indirecto');
            $table-> String('fin_directo');
            $table-> String('fin_indirecto');
            $table->enum('estudio',['MEM','MET','MEF','MEE'])->default('MEM');
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
        Schema::dropIfExists('medios_fins');
    }
}
