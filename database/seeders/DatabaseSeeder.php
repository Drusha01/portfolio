<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            userRoles::class,
            userGenders::class,
            userSex::class,
            userStatus::class,
            adminseeders::class,
            table_seeders::class,
            column_seeders::class,
            // homepageSeeders::class,
            // UserSeeder::class,
        ]);
    }
}
