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
        Schema::create('potentials', function (Blueprint $table) {
            $table->id();

            $table->foreignId('potential_category_id')
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

            $table->longText('description');

            $table->string('thumbnail')->nullable();

            $table->string('address')->nullable();

            $table->string('contact_person')->nullable();

            $table->string('phone', 20)->nullable();

            $table->string('email')->nullable();

            $table->string('website')->nullable();

            $table->string('google_maps_url')->nullable();

            $table->unsignedBigInteger('views')->default(0);

            $table->boolean('is_featured')->default(false);

            $table->enum('status', [
                'draft',
                'published'
            ])->default('draft');

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->softDeletes();

            // Index
            $table->index('slug');
            $table->index('status');
            $table->index('published_at');
            $table->index('views');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potentials');
    }
};