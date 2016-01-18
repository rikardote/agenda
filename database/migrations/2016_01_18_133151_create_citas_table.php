<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('paciente_id')->unsigned();
            $table->integer('medico_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('fecha');
            $table->string('horario');
            $table->enum('concretada', ['0', '1'])->default('0');

            $table->foreign('paciente_id')->references('id')->on('pacientes');  
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('user_id')->references('id')->on('users');    

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
        Schema::drop('citas');
    }
}
