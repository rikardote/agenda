<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id');
           
            $table->string('descripcion');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE tipos ADD code INT(2) UNSIGNED ZEROFILL NOT NULL AFTER id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipos');
    }
}
