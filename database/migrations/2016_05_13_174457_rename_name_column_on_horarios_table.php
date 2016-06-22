<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameNameColumnOnHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('horarios', function($t) {
                        $t->renameColumn('name', 'entrada');
                        $t->string('salida');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horarios', function($t) {
                        $t->renameColumn('entrada', 'name');
                        $t->dropColumn('salida');
                });
    }
}
