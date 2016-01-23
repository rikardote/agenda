<?php

use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('especialidades')->insert([
        	'name' => 'NEUROLOGIA',
        	'slug' => 'neurologia',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
       DB::table('especialidades')->insert([
        	'name' => 'ONCOLOGIA',
        	'slug' => 'oncologia',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
       DB::table('especialidades')->insert([
        	'name' => 'PSICOLOGIA',
        	'slug' => 'psicologia',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
       DB::table('especialidades')->insert([
        	'name' => 'PSIQUIATRIA',
        	'slug' => 'psiquiatria',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
       DB::table('especialidades')->insert([
        	'name' => 'CARDIOLOGIA',
        	'slug' => 'cardiologia',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
       DB::table('especialidades')->insert([
        	'name' => 'MEDICINA INTERNA',
        	'slug' => 'medicina-interna',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
    }
}
