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
            "achievements",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "experience",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "education",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "about_pages",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "about_content",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "links",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "achievements",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "faq",
            1,
            1,
            NOW(),
            NOW()
        );');

        // projects
        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "projects",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "project_image_contents",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "project_developers",
            1,
            1,
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO tables VALUES(
            NULL,
            "developers",
            1,
            1,
            NOW(),
            NOW()
        );');






        
    }
}
