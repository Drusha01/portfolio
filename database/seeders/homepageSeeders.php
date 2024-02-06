<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class homepageSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('INSERT INTO homepages VALUES(
            1,
            1,
            "About Page",
            "about_pages",
            5,
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO homepages VALUES(
            2,
            1,
            "Links",
            "links",
            5,
            1,
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO homepages VALUES(
            3,
            1,
            "About Contents",
            "about_contents",
            5,
            1,
            3,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO homepages VALUES(
            4,
            1,
            "Skills",
            "skills",
            5,
            1,
            4,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO homepages VALUES(
            5,
            1,
            "Projects",
            "projects",
            5,
            1,
            5,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO homepages VALUES(
            6,
            1,
            "Blogs",
            "blogs",
            5,
            1,
            6,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO homepages VALUES(
            7,
            1,
            "Experiences",
            "experiences",
            5,
            1,
            7,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO homepages VALUES(
            8,
            1,
            "Educations",
            "educations",
            5,
            1,
            8,
            NOW(),
            NOW()
        );');

    }
}
