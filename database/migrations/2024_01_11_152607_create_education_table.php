<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE TABLE education(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            logo VARCHAR(100) NOT NULL,
            title VARCHAR(255) NOT NULL,
            start_date DATE NOT NULL,
            end_date DATE,
            location VARCHAR(500) NOT NULL,
            type VARCHAR(100) NOT NULL,
            link VARCHAR(255),
            number_order INT NOT NULL,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_logo ON education(logo(10));');
        DB::statement('CREATE INDEX idx_number_order ON education(number_order);');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
