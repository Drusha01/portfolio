<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // table
        DB::statement('CREATE TABLE users(
            user_id INT PRIMARY KEY AUTO_INCREMENT,
            user_status_id INT NOT NULL,
            user_sex_id INT ,
            user_gender_id INT , 
            user_role_id INT NOT NULL,
            user_name VARCHAR(255) ,
            user_email VARCHAR(255),
            user_phone VARCHAR(20),
            user_password VARCHAR(255),
            user_name_verified BOOL DEFAULT NULL,
            user_email_verified BOOL DEFAULT NULL,
            user_phone_verified BOOL DEFAULT NULL,
            user_firstname VARCHAR(255) NOT NULL,
            user_middlename VARCHAR(255),
            user_lastname  VARCHAR(255) NOT NULL,
            user_suffix VARCHAR(100),
            user_citizenship VARCHAR(100),

            user_addr_street VARCHAR(255) DEFAULT NULL,
            user_addr_brgy VARCHAR(255) DEFAULT NULL,
            user_addr_city_mun VARCHAR(255) DEFAULT NULL,
            user_addr_province VARCHAR(255)DEFAULT NULL,
            user_addr_zip_code INT DEFAULT NULL,
         

            user_birthdate DATE,
            user_profile_picture VARCHAR(100) DEFAULT "default.png",
            user_formal_id VARCHAR(100) DEFAULT "default.png",

            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_status_id) REFERENCES user_status(user_status_id),
            FOREIGN KEY (user_role_id) REFERENCES user_roles(user_role_id)
        );');


        // index
        DB::statement('CREATE INDEX idx_user_email ON users(user_email(10));');
        DB::statement('CREATE INDEX idx_user_name ON users(user_name(10));');
        DB::statement('CREATE INDEX idx_user_phone ON users(user_phone(10));');
        DB::statement('CREATE INDEX idx_user_password ON users(user_password(10));');
        DB::statement('CREATE INDEX idx_full_name ON users(user_firstname(10),user_lastname(10),user_middlename(10));');
        DB::statement('CREATE INDEX idx_user_gender ON users(user_gender_id);');
        DB::statement('CREATE INDEX idx_user_sex ON users(user_sex_id);');
        DB::statement('CREATE INDEX idx_user_photo ON users(user_profile_picture(10));');
        DB::statement('CREATE INDEX idx_user_photo_id ON users(user_formal_id(10));');

        DB::statement('INSERT INTO `users` (`user_id`, `user_status_id`, `user_sex_id`, `user_gender_id`, `user_role_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_name_verified`, `user_email_verified`, `user_phone_verified`, `user_firstname`, `user_middlename`, `user_lastname`, `user_suffix`, `user_citizenship`, `user_addr_street`, `user_addr_brgy`, `user_addr_city_mun`, `user_addr_province`, `user_addr_zip_code`, `user_birthdate`, `user_profile_picture`, `user_formal_id`, `date_created`, `date_updated`) VALUES
        (1, 1, 1, 1, 2, "Drusha01", "hanz.dumapit53@gmail.com", NULL, "$argon2i$v=19$m=65536,t=4,p=1$TDhxQnBxRkJ5cHlTQkxHcA$giflgEB2QqDiN6zvLI6cmsz2Qpii79fyEI8oeJ/iTIg", 1, 1, 0, "Hanrickson", "Etrone", "Dumapit", "", NULL, NULL, NULL, NULL, NULL, NULL, "2000-08-31", "default.png", "default.png", "2024-01-13 05:42:18", "2024-01-14 16:53:59");
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
