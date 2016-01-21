<?php

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
        	'tipo' => '1',
        	'descripcion' => 'TRABAJADOR',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
        DB::table('tipos')->insert([
        	'tipo' => '2',
        	'descripcion' => 'TRABAJADORA',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
        	'tipo' => '3',
        	'descripcion' => 'ESPOSA',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '4',
            'descripcion' => 'ESPOSO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '5',
            'descripcion' => 'PAPA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '6',
            'descripcion' => 'MAMA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '7',
            'descripcion' => 'HIJO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '8',
            'descripcion' => 'HIJA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '9',
            'descripcion' => 'JUBILADO / PENSIONADO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '91',
            'descripcion' => 'JUBILADA / PENSIONADA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '92',
            'descripcion' => 'VIUDEZ',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '31',
            'descripcion' => 'CONCUBINA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '41',
            'descripcion' => 'CONCUBINO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '51',
            'descripcion' => 'ABUELO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'tipo' => '61',
            'descripcion' => 'ABUELA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
