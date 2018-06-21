<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectionInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projection_investigations', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->enum('model',['MEM','MET','MEF','MEE'])->default('MEM');
            $table->integer('year');
            $table->float('demand');
            $table->float('offer');
            $table->float('gap');

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
        Schema::dropIfExists('projection_investigations');
    }
}
