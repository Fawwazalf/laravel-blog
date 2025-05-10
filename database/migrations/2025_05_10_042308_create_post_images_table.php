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
        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('image_path')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
             $table->timestamp('published_at')->nullable();
            $table->enum('status', ['draft', 'scheduled', 'published'])->default('draft');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_images');
    }
};
