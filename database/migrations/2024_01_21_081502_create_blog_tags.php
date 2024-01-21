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
        DB::statement('CREATE TABLE blog_tags(
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            blog_id INT NOT NULL,
            tag_id INT NOT NULL,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_user_id ON blog_tags(user_id);');
        DB::statement('CREATE INDEX idx_blog_id ON blog_tags(blog_id);');
        DB::statement('CREATE INDEX idx_tag_id ON blog_tags(tag_id);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_tags');
    }
};
