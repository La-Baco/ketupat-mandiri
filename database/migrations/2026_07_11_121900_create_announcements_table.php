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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();

            $table->longText('content');

            $table->string('thumbnail')->nullable();

            $table->enum('display_type', [
                'page',
                'banner',
                'popup',
                'running_text'
            ])->default('page');

            $table->unsignedTinyInteger('priority')->default(1);

            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();

            $table->unsignedBigInteger('views')->default(0);

            $table->boolean('is_active')->default(true);

            $table->enum('status', [
                'draft',
                'published'
            ])->default('draft');

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('slug');
            $table->index('display_type');
            $table->index('priority');
            $table->index('status');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};