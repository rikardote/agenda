<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColoniaColumnFromPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes.pacientes', function (Blueprint $table) {
            $table->dropColumn('colonia_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes.pacientes', function (Blueprint $table) {
             $table->integer('colonia_id');
        });
    }
}
