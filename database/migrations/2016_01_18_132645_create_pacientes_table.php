<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rfc', 13);
            $table->string('nombres', 60);
            $table->string('apellido_pat', 60);
            $table->string('apellido_mat', 60);
            $table->string('slug')->nullable();
            $table->integer('tipo_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pacientes');
    }
}
