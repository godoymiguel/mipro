<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_series', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->integer('year');
            $table->float('production');
            $table->float('import');
            $table->float('existence');
            $table->float('export');
            $table->float('apparent_consumption');
            $table->float('population');
            $table->float('precapita_consumption');
            $table->float('price');
            $table->float('real_income');
            $table->enum('model',['MEM','MET','MEF','MEE']);

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
        Schema::dropIfExists('time_series');
    }
}
