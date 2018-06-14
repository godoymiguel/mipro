<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->enum('model',['MEM','MET','MEF','MEE'])->default('MEM');
            $table->integer('total_population');
            $table->string('total_detail');
            $table->integer('population');
            $table->string('population_detail');
            $table->integer('age');
            $table->string('age_detail');
            $table->integer('interested');
            $table->string('interested_detail');
            $table->integer('potential_market');
            $table->integer('buy');
            $table->string('buy_detail');
            $table->integer('available_market');
            $table->integer('entry');
            $table->string('entry_detail');
            $table->integer('qualified_market');
            $table->integer('cup');

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
        Schema::dropIfExists('demands');
    }
}
