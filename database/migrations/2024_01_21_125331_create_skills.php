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
        DB::statement('CREATE TABLE skills(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            image VARCHAR(100) NOT NULL , 
            header VARCHAR(255) NOT NULL,
            number_order INT NOT NULL,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_user_id ON skills(user_id);');
        DB::statement('CREATE INDEX idx_image ON skills(image(10));');
        DB::statement('CREATE INDEX idx_number_order ON skills(number_order);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
