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
            1,
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
            2,
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
            3,
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
            4,
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
            5,
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
            6,
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
            7,
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
            8,
            NOW(),
            NOW()
        );');

        // about content
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            5,
            1,
            1,
            "Image",
            "image",
            "text-center",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            5,
            1,
            1,
            "Header",
            "header",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            5,
            1,
            1,
            "Content",
            "content",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            5,
            1,
            1,
            "Date created",
            "date_created",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            5,
            1,
            1,
            "Date updated",
            "date_updated",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            5,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            6,
            NOW(),
            NOW()
        );');

        // links
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            6,
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
            6,
            1,
            1,
            "Image",
            "image",
            "text-center",
            "",
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            6,
            1,
            1,
            "Link",
            "link",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
          DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            6,
            1,
            1,
            "Order",
            "number_order",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            6,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            5,
            NOW(),
            NOW()
        );');
   
        // faq
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            8,
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
            8,
            1,
            1,
            "Question",
            "question",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            8,
            1,
            1,
            "Answer",
            "answer",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            8,
            1,
            1,
            "Link",
            "link",
            "",
            "",
            4,
            NOW(),
            NOW()
        );'); 
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            8,
            1,
            1,
            "Order",
            "number_order",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            8,
            1,
            1,
            "Date Created",
            "date_created",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            8,
            1,
            1,
            "Date Updated",
            "date_updated",
            "",
            "",
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            8,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            8,
            NOW(),
            NOW()
        );');
        
    
    }
}
