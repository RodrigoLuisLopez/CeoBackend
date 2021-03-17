<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class GirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('giros')->insert([
            'nombre' => 'giro_1',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('giros')->insert([
            'nombre' => 'giro_2',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('giros')->insert([
            'nombre' => 'giro_3',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('giros')->insert([
            'nombre' => 'giro_4',
            'descripcion' => 'descripcion'
        ]);
        
    }
}
