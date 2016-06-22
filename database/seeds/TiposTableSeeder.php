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
        	'code' => '01',
        	'descripcion' => 'TRABAJADOR',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),

        ]);
        DB::table('tipos')->insert([
        	'code' => '02',
        	'descripcion' => 'TRABAJADORA',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
        	'code' => '03',
        	'descripcion' => 'ESPOSA',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '04',
            'descripcion' => 'ESPOSO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '05',
            'descripcion' => 'PAPA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '06',
            'descripcion' => 'MAMA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '07',
            'descripcion' => 'HIJO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '08',
            'descripcion' => 'HIJA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '90',
            'descripcion' => 'JUBILADO / PENSIONADO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '91',
            'descripcion' => 'JUBILADA / PENSIONADA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '92',
            'descripcion' => 'VIUDEZ',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '31',
            'descripcion' => 'CONCUBINA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '41',
            'descripcion' => 'CONCUBINO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '51',
            'descripcion' => 'ABUELO',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('tipos')->insert([
            'code' => '61',
            'descripcion' => 'ABUELA',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
