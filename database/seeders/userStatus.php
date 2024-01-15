<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('DELETE FROM user_status WHERE 1;');
        DB::statement('INSERT INTO user_status VALUES(
            1,
            "active",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_status VALUES(
            2,
            "inactive",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_status VALUES(
            3,
            "deleted",
            NOW(),
            NOW()
        );');
        
    }
}
