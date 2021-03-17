<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        DB::table('estados')->insert([
            'nombre' => 'Activo',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('estados')->insert([
            'nombre' => 'Inactivo',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('estados')->insert([
            'nombre' => 'Suspendido',
            'descripcion' => 'descripcion'
        ]);
        
        DB::table('estados')->insert([
            'nombre' => 'Cancelado',
            'descripcion' => 'descripcion'
        ]);
    }
}
