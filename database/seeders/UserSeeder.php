<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $last = db::table('users')
            ->select('user_id')
            ->limit(1)
            ->orderBy('user_id','desc')
            ->first();
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i=$last->user_id+1; $i < 2000100; $i++) { 
           
            $fname = '';
            $lname = '';
            $name_length = rand(3,10);
            for ($x = 0; $x < $name_length; $x++) {
                $fname =  $fname.$characters[rand(0, strlen($characters)-1)];
            }
            $name_length = rand(3,15);
            for ($x = 0; $x < $name_length; $x++) {
                $lname = $lname.$characters[rand(0, strlen($characters)-1)];
            }

            DB::statement('INSERT INTO `users` (`user_id`, `user_status_id`, `user_sex_id`, `user_gender_id`, `user_role_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_name_verified`, `user_email_verified`, `user_phone_verified`, `user_firstname`, `user_middlename`, `user_lastname`, `user_suffix`, `user_citizenship`, `user_addr_street`, `user_addr_brgy`, `user_addr_city_mun`, `user_addr_province`, `user_addr_zip_code`, `user_birthdate`, `user_profile_picture`, `user_formal_id`, `date_created`, `date_updated`) VALUES
            ('.$i.', 1, 1, 1, 2, "'.$fname.$lname.$i.'", "'.$fname.$lname.$i.'@gmail.com", NULL, "$argon2i$v=19$m=65536,t=4,p=1$TDhxQnBxRkJ5cHlTQkxHcA$giflgEB2QqDiN6zvLI6cmsz2Qpii79fyEI8oeJ/iTIg", 1, 1, 0, "'.$fname.'", "", "'.$lname.'", "", NULL, NULL, NULL, NULL, NULL, NULL, "2000-08-31", "default.png", "default.png", NOW(), NOW());
            ');
        }
      
    }
}
