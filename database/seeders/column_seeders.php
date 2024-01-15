<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class column_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // experience
        DB::statement('DELETE FROM table_columns WHERE 1;');
        DB::statement('INSERT INTO table_columns VALUES(
            1,
            2,
            1,
            1,
            "#",
            "",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            2,
            2,
            1,
            1,
            "Logo",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            3,
            2,
            1,
            1,
            "Title",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            4,
            2,
            1,
            1,
            "Start Date",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            5,
            2,
            1,
            1,
            "End Date",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            6,
            2,
            1,
            1,
            "Location",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            7,
            2,
            1,
            1,
            "Type",
            "",
            "",
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            8,
            2,
            1,
            1,
            "Link",
            "",
            "",
            8,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            9,
            2,
            1,
            1,
            "Order",
            "",
            "",
            9,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            10,
            2,
            1,
            1,
            "Date Created",
            "",
            "",
            10,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            11,
            2,
            1,
            1,
            "Action",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
    }
}
