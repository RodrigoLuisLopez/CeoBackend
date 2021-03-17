<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RecomendacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recomendacions')->insert([

            'nota' => 'nota_remendacion_1',
            'recomendador_id' => 1,
            'recomendado_id' => 2,
            'alcance_id' => 2,
            'giro_id' => 1,

        ]);

        DB::table('recomendacions')->insert([

            'nota' => 'nota_remendacion_2',
            'recomendador_id' => 2,
            'recomendado_id' => 1,
            'alcance_id' => 1,
            'giro_id' => 2,

        ]);

        DB::table('recomendacions')->insert([

            'nota' => 'nota_remendacion_3',
            'recomendador_id' => 1,
            'recomendado_id' => 3,
            'alcance_id' => 2,
            'giro_id' => 1,

        ]);

        DB::table('recomendacions')->insert([

            'nota' => 'nota_remendacion_4',
            'recomendador_id' => 3,
            'recomendado_id' => 2,
            'alcance_id' => 2,
            'giro_id' => 1,

        ]);
    }
}
