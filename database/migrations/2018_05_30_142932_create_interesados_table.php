<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interesados', function (Blueprint $table) {
            $table-> uuid('id');
			$table->primary('id');
            $table-> String('grupo');
            $table-> String('interesados');
            $table-> String('problemas');
            $table-> String('recursos');
            $table-> String('conflictos');
            $table-> String('nombre')->nullable();
            $table-> String('correo')->nullable();
            $table-> String('telefono')->nullable();
            $table-> text('responsabilidad')->nullable();
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
        Schema::dropIfExists('interesados');
    }
}
