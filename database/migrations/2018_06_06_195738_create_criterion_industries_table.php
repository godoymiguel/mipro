<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriterionIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterion_industries', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->string('title');
            $table->enum('criterion',['SUPPLIERS','COMPETITORS','CONSUMERS','NEW','SUBSTITUTES']);
            $table->integer('value')->default(0);
            $table->enum('model',['MEM','MET','MEF','MEE'])->default('MEM');

            $table->uuid('industry_id');            
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criterion_industries');
    }
}
