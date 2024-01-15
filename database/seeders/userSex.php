<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSex extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('DELETE FROM user_sex WHERE 1;');
        DB::statement('INSERT INTO user_sex VALUES(
            1,
            "",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_sex VALUES(
            2,
            "Male",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_sex VALUES(
            3,
            "Female",
            NOW(),
            NOW()
        );');
    }
}
