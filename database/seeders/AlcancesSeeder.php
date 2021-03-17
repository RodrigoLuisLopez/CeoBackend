<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AlcancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('alcances')->insert([
            'nombre' => 'Alcance_1',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('alcances')->insert([
            'nombre' => 'Alcance_2',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('alcances')->insert([
            'nombre' => 'Alcance_3',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('alcances')->insert([
            'nombre' => 'Alcance_4',
            'descripcion' => 'descripcion'
        ]);

    }
}
