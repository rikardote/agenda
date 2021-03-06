<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveForaneoFromCitas2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropColumn('foraneo');
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
            $table->integer('foraneo');
        });
    }
}
