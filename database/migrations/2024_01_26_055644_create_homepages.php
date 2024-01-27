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
        DB::statement('CREATE TABLE homepages(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            table_name VARCHAR(255) ,
            table_table_name VARCHAR(255) ,
            table_max_display INT,
            table_isactive BOOL DEFAULT 1,
            number_order INT NOT NULL,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_user_id ON homepages(user_id);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
