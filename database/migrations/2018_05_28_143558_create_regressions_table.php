<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regressions', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->float('coefficient_r1');
            $table->float('coefficient_r2');
            $table->float('coefficient_r31');
            $table->float('coefficient_r32');
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
        Schema::dropIfExists('regressions');
    }
}
