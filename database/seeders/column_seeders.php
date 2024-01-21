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

        // project
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            9,
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
            9,
            1,
            1,
            "Title",
            "title",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            9,
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
            9,
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
            9,
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
            9,
            1,
            1,
            "Order",
            "number_order",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            9,
            1,
            1,
            "Date Created",
            "date_created",
            "",
            "",
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            9,
            1,
            1,
            "Date Updated",
            "date_updated",
            "",
            "",
            8,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            9,
            1,
            1,
            "Image Content",
            "id",
            "text-center",
            "",
            9,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            9,
            1,
            1,
            "Developers",
            "id",
            "text-center",
            "",
            9,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            9,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            10,
            NOW(),
            NOW()
        );');

        // project image content
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            10,
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
            10,
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
            10,
            1,
            1,
            "Order",
            "number_order",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            10,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            4,
            NOW(),
            NOW()
        );');

        // project developers
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            11,
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
            11,
            1,
            1,
            "Full name",
            "full_name",
            "",
            "",
            1,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            11,
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
            11,
            1,
            1,
            "Linkedin Link",
            "linkedinlink",
            "",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            11,
            1,
            1,
            "Order",
            "number_order",
            "text-center",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            11,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            1,
            NOW(),
            NOW()
        );');

        // developers
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
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
            12,
            1,
            1,
            "Fullname",
            "full_name",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "Image",
            "image",
            "text-center",
            "",
            3,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "LinkedIn",
            "linkedinlink",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "Role",
            "role",
            "r",
            "",
            5,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "Description",
            "description",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "Order",
            "number_order",
            "text-center",
            "",
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "Date Created",
            "date_created",
            "text-center",
            "",
            8,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "Date updated",
            "date_updated",
            "text-center",
            "",
            9,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            12,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            10,
            NOW(),
            NOW()
        );');
        
        // blogs
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "#",
            "id",
            "text-center",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "Image",
            "image",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
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
            13,
            1,
            1,
            "Content",
            "content",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "Button",
            "button",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "Link",
            "link",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "Tags",
            "id",
            "text-center",
            "",
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "Date Created",
            "date_created",
            "text-center",
            "",
            8,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "Date Updated",
            "date_updated",
            "text-center",
            "",
            9,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            13,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            10,
            NOW(),
            NOW()
        );');

        // contact
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            14,
            1,
            1,
            "Longitude",
            "longitude",
            "",
            "",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            14,
            1,
            1,
            "Latitude",
            "latitude",
            "",
            "",
            2,
            NOW(),
            NOW()
        );');
       
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            14,
            1,
            1,
            "Zoom",
            "zoom",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            14,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            4,
            NOW(),
            NOW()
        );');

        // contact info
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            15,
            1,
            1,
            "#",
            "id",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            15,
            1,
            1,
            "Contact Title",
            "contact_title",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            15,
            1,
            1,
            "Contact Details",
            "contact_details",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            15,
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
            15,
            1,
            1,
            "Date Created",
            "date_created",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            15,
            1,
            1,
            "Date Updated",
            "date_updated",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            15,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            7,
            NOW(),
            NOW()
        );');

        // skills
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            7,
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
            7,
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
            7,
            1,
            1,
            "Header",
            "header",
            "",
            "",
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            7,
            1,
            1,
            "Date Created",
            "date_created",
            "",
            "",
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            7,
            1,
            1,
            "Date Updated",
            "date_updated",
            "",
            "",
            5,
            NOW(),
            NOW()
        );');
         DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            7,
            1,
            1,
            "Order",
            "number_order",
            "",
            "",
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO table_columns VALUES(
            NULL,
            7,
            1,
            1,
            "Action",
            "id",
            "text-center",
            "",
            7,
            NOW(),
            NOW()
        );');
    }
}
