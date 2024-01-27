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
            NULL,
            1,
            "achievements",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "experience",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "education",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "about_pages",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "about_content",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "links",
            1,
            1,
            NOW(),
            NOW()
        );');
          DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "skills",
            1,
            1,
            NOW(),
            NOW()
        );');
      
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "faq",
            1,
            1,
            NOW(),
            NOW()
        );');

        // projects
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "projects",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "project_image_contents",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "project_developers",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "developers",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "blogs",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "contacts",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "contact_infos",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            1,
            "homepages",
            1,
            1,
            NOW(),
            NOW()
        );');






        
    }
}
