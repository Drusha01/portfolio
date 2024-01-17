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
        DB::statement('CREATE TABLE table_columns(
            id INT PRIMARY KEY AUTO_INCREMENT,
            table_id INT NOT NULL,
            user_id INT NOT NULL,
            active BOOL,
            name VARCHAR(255),
            column_name VARCHAR(255),
            class VARCHAR(255),
            style VARCHAR(255),
            column_order INT,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');
        DB::statement('CREATE INDEX idx_table_id ON table_columns(table_id);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_columns');
    }
};
