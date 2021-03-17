<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SeguirsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seguidors')->insert([      
            'seguido_id' => 2,
            'seguidor_id' => 1
        ]);
        
        DB::table('seguidors')->insert([      
            'seguido_id' => 1,
            'seguidor_id' => 2
        ]);
        
        DB::table('seguidors')->insert([      
            'seguido_id' => 3,
            'seguidor_id' => 1
        ]);
        
        DB::table('seguidors')->insert([      
            'seguido_id' => 2,
            'seguidor_id' => 3
        ]);

    }
}
