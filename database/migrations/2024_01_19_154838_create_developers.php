<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE TABLE developers(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            full_name VARCHAR(255) NOT NULL,
            image VARCHAR(100) NOT NULL , 
            linkedinlink  VARCHAR(255), 
            role VARCHAR(100) NOT NULL,
            description VARCHAR(255),
            number_order INT NOT NULL,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_user_id ON developers(user_id);');
        DB::statement('CREATE INDEX idx_image ON developers(image(10));');
        DB::statement('CREATE INDEX idx_fullname ON developers(full_name(10));');
        DB::statement('CREATE INDEX idx_number_order ON developers(number_order);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
