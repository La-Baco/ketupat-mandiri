<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->foreignId('news_category_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();

            $table->longText('content');

            $table->string('thumbnail')->nullable();

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
            $table->index('views');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};