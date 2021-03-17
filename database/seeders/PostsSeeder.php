<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'titulo' => 'primer_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'contenido_post contenido_post contenido_post contenido_postcontenido_post contenido_post contenido_post contenido_post',
            'usuario_id' => 2,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
        
        DB::table('posts')->insert([
            'titulo' => 'segundo_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'contenido_post contenido_post contenido_post contenido_postcontenido_post contenido_post contenido_post contenido_post',
            'usuario_id' => 2,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
        
        DB::table('posts')->insert([
            'titulo' => 'tercer_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'contenido_post contenido_post contenido_post contenido_postcontenido_post contenido_post contenido_post contenido_post',
            'usuario_id' => 2,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
        
        DB::table('posts')->insert([
            'titulo' => 'cuarto_post',
            'subtitulo' => 'subtitulo_post',
            'contenido' => 'contenido_post contenido_post contenido_post contenido_postcontenido_post contenido_post contenido_post contenido_post',
            'usuario_id' => 3,
            'privacidad_id' => 1,
            'estado_id' => 1
        ]);
    }
}
