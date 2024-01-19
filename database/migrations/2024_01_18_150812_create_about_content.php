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
        DB::statement('CREATE TABLE about_content(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            image VARCHAR(100) , 
            header  VARCHAR(255) NOT NULL, 
            content VARCHAR(512) NOT NULL, 
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_logo ON about_content(image(10));');
        DB::statement('CREATE INDEX idx_user_id ON about_content(user_id);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_content');
    }
};
