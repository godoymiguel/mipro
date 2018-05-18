<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canvas', function (Blueprint $table) {
			$table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->string('problema');
			$table->string('solucion');
			$table->string('indicadores');
			$table->string('causas');
			$table->string('efectos');
            
            $table->uuid('project_id');            
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canvas');
    }
}
