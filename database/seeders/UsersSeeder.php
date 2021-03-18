<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  => 'Primero',
            'email'     => 'uno@gmail.com',
            'password'  => bcrypt('qweqwe_1'),
            'created_at' => Carbon::now()
        ]);

        
        DB::table('users')->insert([
            'name'  => 'Segundo',
            'email'     => 'dos@gmail.com',
            'password'  => bcrypt('qweqwe_1'),
            'created_at' => Carbon::now()
        ]);


        
        DB::table('users')->insert([
            'name'  => 'Tercero',
            'email'     => 'tres@gmail.com',
            'password'  => bcrypt('qweqwe_1'),
            'created_at' => Carbon::now()
        ]);

        
        DB::table('users')->insert([
            'name'  => 'Cuarto',
            'email'     => 'cuatro@gmail.com',
            'password'  => bcrypt('qweqwe_1'),
            'created_at' => Carbon::now()
        ]);


    }
}
