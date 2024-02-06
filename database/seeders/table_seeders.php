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
            1,
            "achievements",
            10,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            2,
            1,
            "experience",
            10,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            3,
            1,
            "education",
            10,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            4,
            1,
            "about_pages",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            5,
            1,
            "about_content",
            10,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            6,
            1,
            "links",
            10,
            1,
            NOW(),
            NOW()
        );');
          DB::statement('INSERT INTO tables VALUES(
            7,
            1,
            "skills",
            1,
            1,
            NOW(),
            NOW()
        );');
      
        DB::statement('INSERT INTO tables VALUES(
            8,
            1,
            "faq",
            1,
            1,
            NOW(),
            NOW()
        );');

        // projects
        DB::statement('INSERT INTO tables VALUES(
            9,
            1,
            "projects",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            10,
            1,
            "project_image_contents",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            11,
            1,
            "project_developers",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            12,
            1,
            "developers",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            13,
            1,
            "blogs",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            14,
            1,
            "contacts",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            15,
            1,
            "contact_infos",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            16,
            1,
            "homepages",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            17,
            1,
            "Users",
            1,
            1,
            NOW(),
            NOW()
        );');






        
    }
}
