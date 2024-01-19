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
        
        DB::statement('CREATE TABLE project_image_contents(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            project_id INT NOT NULL,
            image VARCHAR(100) NOT NULL,
            number_order INT NOT NULL,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

            DB::statement('CREATE INDEX idx_user_id ON project_image_contents(user_id);');
            DB::statement('CREATE INDEX idx_project_id ON project_image_contents(project_id);');
            DB::statement('CREATE INDEX idx_image ON project_image_contents(image(10));');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_image_contents');
    }
};
