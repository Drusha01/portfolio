<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('DELETE FROM tables WHERE 1;');
        DB::statement('INSERT INTO tables VALUES(
            1,
            "achievements",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            2,
            "experience",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            3,
            "education",
            1,
            1,
            NOW(),
            NOW()
        );');
        
    }
}
