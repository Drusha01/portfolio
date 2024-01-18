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
            NULL,
            2,
            1,
            1,
            "#",
            "id",
            "",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Logo",
            "logo",
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
            "title",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Start Date",
            "start_date",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "End Date",
            "end_date",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Location",
            "location",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Type",
            "type",
            "",
            "",
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Link",
            "link",
            "",
            "",
            8,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Order",
            "number_order",
            "",
            "",
            9,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Date Created",
            "date_created",
            "",
            "",
            10,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Date Updated",
            "date_created",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            2,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            11,
            NOW(),
            NOW()
        );');

        // education 
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "#",
            "id",
            "",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Logo",
            "logo",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Title",
            "title",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Start Date",
            "start_date",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "End Date",
            "end_date",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Location",
            "location",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Type",
            "type",
            "",
            "",
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Link",
            "link",
            "",
            "",
            8,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Order",
            "number_order",
            "",
            "",
            9,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Date Created",
            "date_created",
            "",
            "",
            10,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Date Updated",
            "date_updated",
            "",
            "",
            10,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            3,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            11,
            NOW(),
            NOW()
        );');

        // about pages

        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Image",
            "image",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Header",
            "header",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Content",
            "content",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Button",
            "button",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Link",
            "link",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Date created",
            "date_created",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Date updated",
            "date_updated",
            "",
            "",
            11,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            4,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            11,
            NOW(),
            NOW()
        );');
        
    }
}
