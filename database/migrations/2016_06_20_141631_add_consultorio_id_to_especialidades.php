<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConsultorioIdToEspecialidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidades', function (Blueprint $table) {
            $table->integer('consultorio_id')->unsigned();
            $table->foreign('consultorio_id')->references('id')->on('consultorios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidades', function (Blueprint $table) {
            $table->dropColumn('consultorio_id');
        });
    }
}
