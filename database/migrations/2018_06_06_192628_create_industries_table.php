<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('suppliers')->default(0);
            $table->integer('competitors')->default(0);
            $table->integer('consumers')->default(0);
            $table->integer('new')->default(0);
            $table->integer('substitutes')->default(0);
            $table->enum('model',['MEM','MET','MEF','MEE'])->default('MEM');

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
        Schema::dropIfExists('industries');
    }
}
