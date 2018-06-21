<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFodasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fodas', function (Blueprint $table) {
            $table-> uuid('id');
			$table-> primary('id');
            $table-> text('fortaleza')->nullable();
            $table-> text('oportunidad')->nullable();
            $table-> text('amenaza')->nullable();
            $table-> text('debilidad')->nullable();
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
        Schema::dropIfExists('fodas');
    }
}
