<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            'usuario_id' => 1,
            'post_id' => 2,
        ]);

        
        DB::table('likes')->insert([
            'usuario_id' => 1,
            'post_id' => 3,
        ]);

        
        DB::table('likes')->insert([
            'usuario_id' => 3,
            'post_id' => 1,
        ]);

        
        DB::table('likes')->insert([
            'usuario_id' => 2,
            'post_id' => 1,
        ]);

    }
}
