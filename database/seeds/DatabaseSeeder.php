<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TiposTableSeeder::class);
         $this->call(EspecialidadesTableSeeder::class);
         $this->call(HorariosTableSeeder::class);
         
    }
}
