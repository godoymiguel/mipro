<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterios', function (Blueprint $table) {
			$table->uuid('id');
			$table->primary('id');
            $table->timestamps();
            $table->String('name');
            $table->Integer('valor1')->default(0);
            $table->Integer('valor2')->default(0);
            $table->Integer('valor3')->default(0);
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
        Schema::dropIfExists('criterios');
    }
}
