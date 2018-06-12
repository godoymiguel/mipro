<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->enum('model',['MEM','MET','MEF','MEE'])->default('MEM');
            $table->enum('population',['P1','P2']);
            $table->integer('size');
            $table->boolean('list');
            $table->integer('sample_point');
            $table->string('units');
            $table->enum('type_sampling',['PROBALIBISTICO','NO_PROBALIBISTICO']);
            $table->boolean('know_population');
            $table->integer('proportion');
            $table->integer('level');
            $table->integer('error');
            $table->integer('sample_size');

            $table->uuid('investigation_id');            
            $table->foreign('investigation_id')->references('id')->on('investigations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('populations');
    }
}
