<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_industries', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->timestamps();
            $table->string('title');
            $table->enum('criterion',['SUPPLIERS','COMPETITORS','CONSUMERS','NEW','SUBSTITUTES']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_industries');
    }
}
