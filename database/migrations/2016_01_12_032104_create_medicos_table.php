<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
           
            $table->string('nombres', 60);
            $table->string('apellido_pat', 60);
            $table->string('apellido_mat', 60);
            $table->string('cedula');
            $table->string('slug')->nullable();
            $table->integer('especialidad_id')->unsigned();
            $table->integer('horario_id')->unsigned();
            
            $table->foreign('especialidad_id')->references('id')->on('especialidades');  
            $table->foreign('horario_id')->references('id')->on('horarios');  

            $table->timestamps();
        });
        DB::statement("ALTER TABLE medicos ADD num_empleado INT(6) UNSIGNED ZEROFILL NOT NULL AFTER id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicos');
    }
}
