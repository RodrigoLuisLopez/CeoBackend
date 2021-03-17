<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Juan',
            'edad' => '22',
            'direccion' => 'Oaxaca de juarez, centro',
            'correo' => 'juan@gmail.com',
            'telefono' => '9517418563',
            'biografia' => 'esta es la biografia de juan',
            'facebook' => 'juanfaceb',
            'twitter' => 'twitterjuan',
            'instagram' => 'instagjuan',
            'estado_id' => 1,
            'privacidad_id' => 1,
        ]);
        
        DB::table('usuarios')->insert([
            'nombre' => 'Pedro',
            'edad' => '22',
            'direccion' => 'Oaxaca de juarez, centro',
            'correo' => 'pedro@gmail.com',
            'telefono' => '9515518562',
            'biografia' => 'esta es la biografia de pedro',
            'facebook' => 'pedrofaceb',
            'twitter' => 'twitterpedro',
            'instagram' => 'instagpedro',
            'estado_id' => 1,
            'privacidad_id' => 1,
        ]);
        
        DB::table('usuarios')->insert([
            'nombre' => 'pablo',
            'edad' => '22',
            'direccion' => 'Oaxaca de juarez, centro',
            'correo' => 'pablo@gmail.com',
            'telefono' => '9517418563',
            'biografia' => 'esta es la biografia de pablo',
            'facebook' => 'pablofaceb',
            'twitter' => 'twitterpablo',
            'instagram' => 'instagpablo',
            'estado_id' => 1,
            'privacidad_id' => 1,
        ]);
        
        DB::table('usuarios')->insert([
            'nombre' => 'Andres',
            'edad' => '22',
            'direccion' => 'Oaxaca de juarez, centro',
            'correo' => 'andres@gmail.com',
            'telefono' => '9517589963',
            'biografia' => 'esta es la biografia de andres',
            'facebook' => 'andresfaceb',
            'twitter' => 'twitteradres',
            'instagram' => 'instagandres',
            'estado_id' => 1,
            'privacidad_id' => 1,
        ]);
    }
}
