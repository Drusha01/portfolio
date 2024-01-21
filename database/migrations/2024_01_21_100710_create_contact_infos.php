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
        DB::statement('CREATE TABLE contact_infos(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            contact_title VARCHAR(255) NOT NULL,
            contact_details VARCHAR(255) NOT NULL,
            number_order INT NOT NULL,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_user_id ON contact_infos(user_id);');
        DB::statement('CREATE INDEX idx_number_order ON contact_infos(number_order);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
