<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminseeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('INSERT INTO `users` (`user_id`, `user_status_id`, `user_sex_id`, `user_gender_id`, `user_role_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_name_verified`, `user_email_verified`, `user_phone_verified`, `user_firstname`, `user_middlename`, `user_lastname`, `user_suffix`, `user_citizenship`, `user_addr_street`, `user_addr_brgy`, `user_addr_city_mun`, `user_addr_province`, `user_addr_zip_code`, `user_birthdate`, `user_profile_picture`, `user_formal_id`, `date_created`, `date_updated`) VALUES
        (1, 1, 1, 1, 2, "Drusha01", "hanz.dumapit53@gmail.com", NULL, "$argon2i$v=19$m=65536,t=4,p=1$TDhxQnBxRkJ5cHlTQkxHcA$giflgEB2QqDiN6zvLI6cmsz2Qpii79fyEI8oeJ/iTIg", 1, 1, 0, "Hanrickson", "Etrone", "Dumapit", "", NULL, NULL, NULL, NULL, NULL, NULL, "2000-08-31", "default.png", "default.png", "2024-01-13 05:42:18", "2024-01-14 16:53:59");
        ');
    }
}
