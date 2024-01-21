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
        DB::statement('CREATE TABLE blogs(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            image VARCHAR(100) NOT NULL , 
            title VARCHAR(255) NOT NULL,
            content VARCHAR(1023) NOT NULL,
            link  VARCHAR(255), 
            button VARCHAR(100),
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        
        DB::statement('CREATE INDEX idx_user_id ON blogs(user_id);');
        DB::statement('CREATE INDEX idx_image ON blogs(image(10));');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
