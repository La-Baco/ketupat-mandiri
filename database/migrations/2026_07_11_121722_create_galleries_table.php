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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('cover_image')->nullable();

            $table->unsignedInteger('photo_count')->default(0);

            $table->unsignedBigInteger('views')->default(0);

            $table->boolean('is_featured')->default(false);

            $table->enum('status', [
                'draft',
                'published'
            ])->default('draft');

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('slug');
            $table->index('status');
            $table->index('published_at');
            $table->index('is_featured');
            $table->index('views');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};