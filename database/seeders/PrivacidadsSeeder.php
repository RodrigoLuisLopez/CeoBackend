<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PrivacidadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        DB::table('privacidads')->insert([
            'nombre' => 'Publico',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('privacidads')->insert([
            'nombre' => 'Solo Amigos',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('privacidads')->insert([
            'nombre' => 'Privado',
            'descripcion' => 'descripcion'
        ]);
    }
}
