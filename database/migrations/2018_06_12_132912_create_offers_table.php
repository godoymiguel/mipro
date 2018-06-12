<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->enum('model',['MEM','MET','MEF','MEE'])->default('MEM');
            $table->integer('competitors');
            $table->integer('capacity');
            $table->integer('people_served');
            $table->integer('rate');
            $table->integer('offer');

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
        Schema::dropIfExists('offers');
    }
}
