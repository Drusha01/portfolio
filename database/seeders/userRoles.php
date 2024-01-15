<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('DELETE FROM user_roles WHERE 1;');
        DB::statement('INSERT INTO user_roles VALUES(
            1,
            "user",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_roles VALUES(
            2,
            "admin",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_roles VALUES(
            3,
            "superadmin",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_roles VALUES(
            4,
            "",
            NOW(),
            NOW()
        );');
        
        
        
        
    }
}
