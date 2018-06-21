<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
			$table->uuid('id')->required();
			$table->primary('id');
            $table->timestamps();
			$table->String('name')->required();
            $table->Integer('valor')->nullable();            
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
        Schema::dropIfExists('ideas');
    }
}
