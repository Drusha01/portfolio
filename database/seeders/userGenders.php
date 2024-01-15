<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userGenders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('DELETE FROM user_genders WHERE 1;');
        DB::statement('INSERT INTO user_genders VALUES(
            1,
            "",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_genders VALUES(
            2,
            "Male",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_genders VALUES(
            3,
            "Female",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_genders VALUES(
            4,
            "Transgender",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_genders VALUES(
            5,
            "Two Spirit female",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_genders VALUES(
            6,
            "Two Spirit male",
            NOW(),
            NOW()
        );');
    }
}
