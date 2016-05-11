<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHojasMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hojas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->integer('medico_id')->unsigned();
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
            
            $table->foreign('paciente_id')->references('id')->on('pacientes');  
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('codigo_cie_id')->references('id')->on('cies');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hojas');
    }
}
