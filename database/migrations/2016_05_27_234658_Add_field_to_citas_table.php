<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->enum('foraneo', ['0', '1'])->default('0');
            $table->enum('laboratorio', ['0', '1'])->default('0');
            $table->enum('rayosx', ['0', '1'])->default('0');
            $table->enum('interconsulta', ['0', '1'])->default('0');
            $table->enum('pase_otra_unidad', ['0', '1'])->default('0');
            $table->string('num_licencia_medica');
            $table->integer('num_de_dias');
            $table->integer('num_medicamentos');
            $table->integer('codigo_cie_id')->unsigned();
            $table->enum('primera_vez', ['0', '1'])->default('0');
            $table->enum('subsecuente', ['0', '1'])->default('0');
            $table->enum('reprogramada', ['0', '1'])->default('0');
            $table->enum('suspendida', ['0', '1'])->default('0');
            $table->enum('diferida', ['0', '1'])->default('0');
            $table->integer('num_otorgados');
            
            $table->foreign('codigo_cie_id')->references('id')->on('cies');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropColumn('foraneo');
            $table->dropColumn('laboratorio');
            $table->dropColumn('rayosx');
            $table->dropColumn('interconsulta');
            $table->dropColumn('pase_otra_unidad');
            $table->dropColumn('num_licencia_medica');
            $table->dropColumn('num_de_dias');
            $table->dropColumn('num_medicamentos');
            $table->dropColumn('codigo_cie_id');
            $table->dropColumn('primera_vez');
            $table->dropColumn('subsecuente');
            $table->dropColumn('reprogramada');
            $table->dropColumn('suspendida');
            $table->dropColumn('diferida');
            $table->dropColumn('num_otorgados');
        });
    }
}
