<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesTable extends Migration
{
    /**$
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table-> uuid('id');
			$table->primary('id');
            $table-> String('fuente');
            $table-> text('descripcion');
            $table-> enum('tipo',['HistoriaBS','UsosBS','ConsumoTF','PrincipalesCC','PrincipalesFP','TecnologiaBS','TendenciasBS']);
            $table-> enum('estudio',['MEM','MET','MEF','MEE']);
            $table-> timestamps();
            
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
        Schema::dropIfExists('antecedentes');
    }
}
