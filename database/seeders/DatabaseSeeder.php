<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrivacidadsSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(GirosSeeder::class);
        $this->call(AlcancesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(SeguirsSeeder::class);
        $this->call(RecomendacionSeeder::class);
    }
}
